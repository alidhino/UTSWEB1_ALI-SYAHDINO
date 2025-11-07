<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Data produk (array statis)
$kode_barang = ["K001", "K002", "K003", "K004", "K005"];
$nama_barang = ["Cilok", "Teh Pucuk", "Sosis", "Sate", "Keripik"];
$harga_barang = [3000, 5000, 8000, 12000, 7000];

// Tambahan dari commit 5
$beli = [];
$total = [];

// Buat pembelian acak untuk setiap barang
for ($i = 0; $i < count($kode_barang); $i++) {
    $jumlah_beli = rand(1, 5); // random 1–5
    $beli[] = $jumlah_beli;
    $total[] = $harga_barang[$i] * $jumlah_beli;
}
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
            width: 60%;
            margin: 50px auto;
            background: #fff;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div style="text-align:center; margin-top:20px;">
        <p>Selamat datang, <b><?= $_SESSION['username'] ?></b></p>
        <a href="logout.php"><button>Logout</button></a>
    </div>

    <table>
        <tr>
            <th colspan="5">-- POLGAN MART --</th>
        </tr>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
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
    </table>
    <?php
    $grandtotal = array_sum($total);
    ?>

    <tr>
        <td colspan="4" align="right"><b>Total Belanja</b></td>
        <td><b>Rp <?= number_format($grandtotal, 0, ',', '.') ?></b></td>
    </tr>

</body>

</html>
