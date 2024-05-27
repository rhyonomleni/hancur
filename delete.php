<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

$id = $_GET["id"];
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$selesai = $_SESSION["tanggal_selesai"];
$delete = "DELETE FROM kegiatan WHERE id = $id";
print_r($selesai);

$hapus=$conn->query("SELECT * FROM kegiatan WHERE id=$id");
$data = $hapus->fetch_assoc();
$foto = $data['gambar'];
if (file_exists("foto/$foto")) {
    unlink("foto/$foto");
}

if ($selesai <= date("Y-m-d")) {
    echo "
        <script>
            alert('kegiatan sudah lewat, data gagal dihapus');
            document.location.href = 'deskripsi.php';
        </script>    
    ";
}else{
    mysqli_query($conn, $delete);
}

if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'deskripsi.php';
        </script>    
    ";
 } else{
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'deskripsi.php';
        </script>    
    ";
 }
?>