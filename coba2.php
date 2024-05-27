<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

echo $_SESSION["id"];

$sql = "SELECT * FROM kegiatan WHERE id = '$_SESSION[id]'";
$result = mysqli_query($conn, $sql);
$events = [];

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        // echo "$row[nama_kegiatan]"." Pada tanggal "."$row[tanggal_mulai]<br>";
        // $array[] = $row["id"];
        $event = [
            'nama' => $row['nama_kegiatan'],
            'mulai' => $row['tanggal_mulai'],
            'selesai' => $row['tanggal_selesai'],
            'durasi' => $row['durasi'],
            'level' => $row['level'],
            'lokasi' => $row['lokasi']
            // 'gambar' => $row['gamabar']
        ];

        $events[] = $event;
    }

    // $row = mysqli_fetch_assoc($result);
    // echo "$row[nama_kegiatan]"." Pada tanggal "."$row[tanggal_mulai]<br>";
}
else{
    echo "Tabel Kosong";
}

echo json_encode($events);

?>