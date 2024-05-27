<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

$id = $_GET["id"];
$kgtn = mysqli_query($conn, "SELECT * FROM kegiatan WHERE id = $id");
$rows = [];
while ($row = mysqli_fetch_assoc($kgtn)) {
    $rows[] = $row;
}
$isi = $rows[0];
if(isset($_POST["update"])){
    $nama = $_POST["nama"];
        $mulai = $_POST["mulai"];
        $selesai = $_POST["selesai"];
        $durasi = $_POST["durasi"];
        $level = $_POST["level"];
        $lokasi = $_POST["lokasi"];
        $gambar = $_FILES["gambar"]["name"];
    $tgl_mulai = strtotime($mulai);
    $tgl_selesai = strtotime($selesai);
    $today = strtotime(date("Y-m-d"));
    if ($selesai < date("Y-m-d")) {
        echo "
            <script>
                alert('kegiatan sudah lewat, update data gagal');
                document.location.href = 'deskripsi.php';
            </script>    
        ";
    }elseif ($tgl_mulai < $today || $tgl_selesai < $today) { 
        echo "tanggal mulai dan tanggal selesai tidak boleh sebelum hari ini!";
    }elseif ($tgl_selesai < $tgl_mulai) { 
        echo "tanggal selesai tidak boleh sebelum tanggal mulai!";
    }else{
        if (isset($_FILES["gambar"]["name"])) {
            $uploadfile = "foto/".$_FILES["gambar"]["name"];
            $tipefile = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
            if (file_exists($uploadfile) && $uploadfile != "foto/") {
                echo "file ini sudah ada";
                exit;
            }elseif ($tipefile != "jpg" && $tipefile != "png" && $tipefile != "jpeg" && $uploadfile != "foto/") {
                echo "Hanya bisa JPG, PNG, dan JPEG";
                exit;
            }elseif ($uploadfile == "foto/") {
                //hanya untuk menghandle ketika gambar tidak diisi
            }elseif (!move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadfile)){
                echo "Gagal upload";
                exit;
            }
             
            $query = "UPDATE kegiatan SET
                id = $id,
                nama_kegiatan = '$nama',
                tanggal_mulai = '$mulai',
                tanggal_selesai = '$selesai',
                durasi = '$durasi',
                level = '$level',
                lokasi = '$lokasi',
                gambar = '$gambar'
                WHERE id = $id";

            mysqli_query($conn, $query);
            if (mysqli_affected_rows($conn) > 0) {
                echo "Data berhasil diubah";
            }else{
                echo "Tidak ada data diubah";
            }
            
        }
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <a href="deskripsi.php">Kembali</a>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="nama">nama kegiatan : </label>
    <input type="text" name="nama" max="50" id="nama" value="<?= $isi["nama_kegiatan"]?>"> <br>
    <label for="mulai">Tanggal Mulai : </label> 
    <input type="date" name="mulai" id="mulai" value="<?= $isi["tanggal_mulai"]?>"><br>
    <label for="mulai">Tanggal Selesai : </label>
    <input type="date" name="selesai" id="selesai" value="<?= $isi["tanggal_selesai"]?>"><br>
    <label for="durasi">Durasi : </label>
    <input type="text" name="durasi" id="durasi" value="<?= $isi["durasi"]?>"><br>
    Level : <input type="radio" value="Biasa" name="level" id="biasa" <?= $isi["level"]=='Biasa'?'checked':'' ?>>
    <label for="biasa">Biasa</label>
    <input type="radio" value="Sedang" name="level" id="sedang" <?= $isi["level"]=='Sedang'?'checked':'' ?>>
    <label for="sedang">Sedang</label>
    <input type="radio" value="Sangat Penting" name="level" id="penting" <?= $isi["level"]=='Sangat Penting'?'checked':'' ?>>
    <label for="penting">Sangat Penting</label><br>
    <label for="lokasi">Lokasi : </label>
    <input type="text" name="lokasi" id="lokasi" value="<?= $isi["lokasi"]?>"><br>
    <label for="gambar">gambar : </label>
    <img src="<?= $isi['gambar']; ?>">
    <input type="file" name="gambar" value="<?= $isi["gambar"]?>"><br>
    <input type="submit" name="update" value="submit">
    </form>


</body>
</html>