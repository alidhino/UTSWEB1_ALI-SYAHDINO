<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Array produk
$kode_barang = ["K001", "K002", "K003", "K004", "K005"];
$nama_barang = ["Cilok", "Teh Pucuk", "Sosis", "Sate", "Keripik"];
$harga_barang = [3000, 5000, 8000, 12000, 7000];

// Array kosong untuk hasil penjualan
$beli = [];
$jumlah = [];
$total = [];

// Membuat pembelian random (Commit 6)
for ($i = 0; $i < count($kode_barang); $i++) {
    $jumlah_beli = rand(1, 5); // pembelian acak
    $beli[] = $jumlah_beli;
    $total[] = $harga_barang[$i] * $jumlah_beli;
}

// Hitung total semua (Commit 7)
$grandtotal = array_sum($total);

// Hitung diskon (Commit 9)
if ($grandtotal < 50000) {
    $diskon = 0.05;
} elseif ($grandtotal >= 50000 && $grandtotal <= 100000) {
    $diskon = 0.10;
} else {
    $diskon = 0.10;
}
$nilai_diskon = $grandtotal * $diskon;
$total_bayar = $grandtotal - $nilai_diskon;
?>


<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - POLGAN MART</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 30px auto;
            background: white;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        .logout {
            margin: 20px auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="logout">
        <p>Selamat datang, <b><?= $_SESSION['username'] ?></b>!</p>
        <a href="logout.php"><button>Logout</button></a>
    </div>

    <table>
        <tr>
            <th colspan="6">-- POLGAN MART --</th>
        </tr>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>

        <?php
        // Tampilkan data dengan foreach
        for ($i = 0; $i < count($kode_barang); $i++) {
            echo "<tr>
                    <td>{$kode_barang[$i]}</td>
                    <td>{$nama_barang[$i]}</td>
                    <td>Rp " . number_format($harga_barang[$i], 0, ',', '.') . "</td>
                    <td>{$beli[$i]}</td>
                    <td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>
                 </tr>";
        }
        ?>

        <tr>
            <td colspan="4" align="right"><b>Total Belanja</b></td>
            <td><b>Rp <?= number_format($grandtotal, 0, ',', '.') ?></b></td>
        </tr>
        <tr>
            <td colspan="4" align="right"><b>Diskon (<?= $diskon * 100 ?>%)</b></td>
            <td><b>Rp <?= number_format($nilai_diskon, 0, ',', '.') ?></b></td>
        </tr>
        <tr>
            <td colspan="4" align="right"><b>Total Bayar</b></td>
            <td><b>Rp <?= number_format($total_bayar, 0, ',', '.') ?></b></td>
        </tr>
    </table>
</body>

</html>
