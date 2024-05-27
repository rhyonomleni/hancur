<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

$sql = "SELECT * FROM kegiatan WHERE username = '$_SESSION[username]' AND password = '$_SESSION[password]'";
$result = mysqli_query($conn, $sql);
$events = [];
$eventDate = [];
$eventName = [];

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $tmpDate = [$row['tanggal_mulai']];
        $tmpName = [$row['nama_kegiatan']];
        
        $eventDate[] = $tmpDate;
        $eventName[] = $tmpName;

        $event = [
            'id' => $row['id'],
            'nama' => $row['nama_kegiatan'],
            'mulai' => $row['tanggal_mulai'],
            'selesai' => $row['tanggal_selesai'],
            'durasi' => $row['durasi'],
            'level' => $row['level'],
            'lokasi' => $row['lokasi']
        ];

        $events[] = $event;

    }
}
else{
    echo "Tabel Kosong";
}
echo json_encode($events)."<br><br>";
echo json_encode($events[0])."<br><br>";
echo json_encode($eventDate)."<br><br>";
echo json_encode($eventName)."<br><br>";
echo json_encode($eventDate[0][0])."<br><br>";
echo count($eventDate)."<br><br>";

for($i=01; $i <= 9; $i++) {
    echo "2023-02-0".$i.'<br>';
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-0".$i == $eventDate[$j][0]){
            echo "eventnya ada!<br>";
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        echo "eventnya tidak ada!<br>";
    }
}

for($i=10; $i <= 28; $i++) {
    echo "2023-02-".$i.'<br>';
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-02-".$i == $eventDate[$j][0]){
            echo "eventnya ada!<br>";
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        echo "eventnya tidak ada!<br>";
    }
}

// if("2023-02-01" == $eventDate[0][0]){
//     echo "eventnya ada!<br>";
// }
// else{
//     echo "eventnya tidak ada!<br>";
// }

// if("2023-02-15" == $eventDate[0][0]){
//     echo "eventnya ada!<br>";
// }
// else{
//     echo "eventnya tidak ada!<br>";
// }
// echo($_GET["login"]);

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
    <a href="coba2.php">pindah</a>
</body>
</html>