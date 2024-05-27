<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");
$sql = "SELECT * FROM kegiatan WHERE username = '$_SESSION[username]' AND password = '$_SESSION[password]'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event.css">
    <title>Document</title>
</head>
<body>
    <a href="kalender.php">Kembali</a>
    <table border="1" cellspacing="0">
        <thead>
            <th>nama_kegiatan</th>
            <th>tanggal_mulai</th>
            <th>tanggal_selesai</th>
            <th>durasi</th>
            <th>level</th>
            <th>lokasi</th>
            <th>gambar</th>
            <th>Action</th>
        </thead>
        <?php $i = 1?>
        <?php while($row = mysqli_fetch_assoc($result)) :?>
        <tr>
            <td><?php echo $row["nama_kegiatan"]?></td>
            <td><?php echo $row["tanggal_mulai"]?></td>
            <td><?php echo $row["tanggal_selesai"]?></td>
            <td><?php echo $row["durasi"]?></td>
            <td><?php echo $row["level"]?></td>
            <td><?php echo $row["lokasi"]?></td>
            <td><img src="foto/<?php echo $row["gambar"];?>" width="50"></td>
            <td>
                <a href="update.php?id=<?= $row["id"];?>">Edit</a> | 
                <a href="delete.php?id=<?= $row["id"];?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
            <?php $_SESSION["tanggal_selesai"]=$row["tanggal_selesai"]?>
        </tr>
        <?php $i++;?>
        <?php endwhile?>
    </table>
 </body>
 </html>