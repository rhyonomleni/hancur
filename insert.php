<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");
if (isset($_POST["kirim"])) {
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $nama = $_POST["nama"];
    $mulai = $_POST["mulai"];
    $selesai = $_POST["selesai"];
    $durasi = $_POST["durasi"];
    $level = $_POST["level"];
    $lokasi = $_POST["lokasi"];
    $gambar = $_FILES["gambar"]["name"];
    $sql = "INSERT INTO kegiatan (username, password, nama_kegiatan, tanggal_mulai, tanggal_selesai, durasi, level, lokasi, gambar) VALUES 
    ('$username','$password','$nama','$mulai','$selesai','$durasi','$level','$lokasi','$gambar')";

    $tgl_mulai = strtotime($mulai);
    $tgl_selesai = strtotime($selesai);
    $today = strtotime(date("Y-m-d"));
    if ($tgl_mulai > $today && $tgl_selesai > $today) {
        if ($tgl_mulai <= $tgl_selesai) {
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
                }else {
                    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"],$uploadfile)) {
                        echo "Gagal upload";
                        exit;
                    }
                }
            }
            
            if(mysqli_query($conn, $sql)) {
                echo "Berhasil mengisi data.";
            }else{
                echo "Gagal mengisi data";
            }
        }else{
            echo"tanggal selesai tidak boleh sebelum tanggal mulai";
        }
    }else{
        echo"tanggal mulai dan selesai tidak boleh sebelum hari ini";
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
    <script>
        function cek() {
            
        }
    </script>
    
</head>
<body>
    <a href="kalender.php">Kembali</a>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="nama">nama kegiatan : </label>
    <input type="text" name="nama" max="50" id="nama" required> <br>
    <label for="mulai">Tanggal Mulai : </label> 
    <input type="date" name="mulai" id="mulai" required><br>
    <label for="mulai">Tanggal Selesai : </label>
    <input type="date" name="selesai" id="selesai" required><br>
    <label for="durasi">Durasi : </label>
    <input type="text" name="durasi" id="durasi" required><br>
    Level : <input type="radio" value="Biasa" name="level" id="biasa" required>
    <label for="biasa">Biasa</label>
    <input type="radio" value="Sedang" name="level" id="sedang" required>
    <label for="sedang">Sedang</label>
    <input type="radio" value="Sangat Penting" name="level" id="penting" required>
    <label for="penting">Sangat Penting</label><br>
    <label for="lokasi">Lokasi : </label>
    <input type="text" name="lokasi" id="lokasi" required><br>
    <label for="gambar">gambar : </label>
    <input type="file" name="gambar"><br>
    <input type="submit" name="kirim" value="submit">
    </form>
</body>
</html>

<?php 

?>