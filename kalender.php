<?php 
session_start();
if (!isset($_SESSION["login"])) {
    header(("Location: login.php"));
    exit;
}

// Tes, comment jika kode ndak berhasil dari sini
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

$sql = "SELECT * FROM kegiatan WHERE username = '$_SESSION[username]' AND password = '$_SESSION[password]'";
$result = mysqli_query($conn, $sql);
$events = [];
$eventDate = [];
$eventName = [];

$calendarHTML = '<header id="atas">Kalender Kegiatan</header>
                <a href="logout.php">Logout</a> |
                <a href="insert.php">Tambahkan kegiatan</a>
                <h1>Juni 2023</h1>
                <table border="1" cellspacing="0" cellpadding="50">';

$calendarHTML .= '<thead>
                    <tr>
                        <th class="day">Minggu</th>
                        <th class="day">Senin</th>
                        <th class="day">Selasa</th>
                        <th class="day">Rabu</th>
                        <th class="day">Kamis</th>
                        <th class="day">Jumat</th>
                        <th class="day">Sabtu</th>
                    </tr>
                    </thead>';

$calendarHTML .= '<thead>
                <th class="bulanLalu">28</th>
                <th class="bulanLalu">29</th>
                <th class="bulanLalu">30</th>
                <th class="bulanLalu">31</th>
                <th class="bulanSekarang">1</th>
                <th class="bulanSekarang">2</th>
                <th class="bulanSekarang">3</th>
                </thead>
                <tbody>';

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

for($i=28; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-05-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=01; $i <= 3; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">4</th>
                    <th class="bulanSekarang">5</th>
                    <th class="bulanSekarang">6</th>
                    <th class="bulanSekarang">7</th>
                    <th class="bulanSekarang">8</th>
                    <th class="bulanSekarang">9</th>
                    <th class="bulanSekarang">10</th>
                    </thead>
                    <tbody>';

for($i=4; $i <= 9; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=10; $i <= 10; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">11</th>
                    <th class="bulanSekarang">12</th>
                    <th class="bulanSekarang">13</th>
                    <th class="bulanSekarang">14</th>
                    <th class="bulanSekarang">15</th>
                    <th class="bulanSekarang">16</th>
                    <th class="bulanSekarang">17</th>
                    </thead>
                    <tbody>';

for($i=11; $i <= 17; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">18</th>
                    <th class="bulanSekarang">19</th>
                    <th class="bulanSekarang">20</th>
                    <th class="bulanSekarang">21</th>
                    <th class="bulanSekarang">22</th>
                    <th class="bulanSekarang">23</th>
                    <th class="bulanSekarang">24</th>
                    </thead>
                    <tbody>';

for($i=18; $i <= 24; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $_SESSION["id"] = $event['id'];
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">25</th>
                    <th class="bulanSekarang">26</th>
                    <th class="bulanSekarang">27</th>
                    <th class="bulanSekarang">28</th>
                    <th class="bulanSekarang">29</th>
                    <th class="bulanSekarang">30</th>
                    <th class="bulanDepan">1</th>
                    </thead>
                    <tbody>';
                    

for($i=25; $i <= 30; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 1; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    </table>
                    <br><br>
                    <h1>Juli 2023</h1>
                    <table border="1" cellspacing="0" cellpadding="50">
                        <thead>
                            <th class="day">Minggu</th>
                            <th class="day">Senin</th>
                            <th class="day">Selasa</th>
                            <th class="day">Rabu</th>
                            <th class="day">Kamis</th>
                            <th class="day">Jumat</th>
                            <th class="day">Sabtu</th>
                        </thead>';

$calendarHTML .= '<thead>
                    <th class="bulanLalu">25</th>
                    <th class="bulanLalu">26</th>
                    <th class="bulanLalu">27</th>
                    <th class="bulanLalu">28</th>
                    <th class="bulanLalu">29</th>
                    <th class="bulanLalu">30</th>
                    <th class="bulanSekarang">1</th>
                    </thead>
                    <tbody>';

for($i=25; $i <= 30; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-06-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 1; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= ' </tbody>
                    <thead>
                    <th class="bulanSekarang">2</th>
                    <th class="bulanSekarang">3</th>
                    <th class="bulanSekarang">4</th>
                    <th class="bulanSekarang">5</th>
                    <th class="bulanSekarang">6</th>
                    <th class="bulanSekarang">7</th>
                    <th class="bulanSekarang">8</th>
                    </thead>
                    <tbody>';

for($i=2; $i <= 8; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">9</th>
                    <th class="bulanSekarang">10</th>
                    <th class="bulanSekarang">11</th>
                    <th class="bulanSekarang">12</th>
                    <th class="bulanSekarang">13</th>
                    <th class="bulanSekarang">14</th>
                    <th class="bulanSekarang">15</th>
                    </thead>
                    <tbody>';

for($i=9; $i <= 9; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=10; $i <= 15; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">16</th>
                    <th class="bulanSekarang">17</th>
                    <th class="bulanSekarang">18</th>
                    <th class="bulanSekarang">19</th>
                    <th class="bulanSekarang">20</th>
                    <th class="bulanSekarang">21</th>
                    <th class="bulanSekarang">22</th>
                    </thead>
                    <tbody>';

for($i=16; $i <= 22; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">23</th>
                    <th class="bulanSekarang">24</th>
                    <th class="bulanSekarang">25</th>
                    <th class="bulanSekarang">26</th>
                    <th class="bulanSekarang">27</th>
                    <th class="bulanSekarang">28</th>
                    <th class="bulanSekarang">29</th>
                    </thead>
                    <tbody>';

for($i=23; $i <= 29; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">30</th>
                    <th class="bulanSekarang">31</th>
                    <th class="bulanDepan">1</th>
                    <th class="bulanDepan">2</th>
                    <th class="bulanDepan">3</th>
                    <th class="bulanDepan">4</th>
                    <th class="bulanDepan">5</th>
                    </thead>
                    <tbody>';

for($i=30; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 5; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    </table>
                    <br><br>
                    <h1>Agustus 2023</h1>
                    <table border="1" cellspacing="0" cellpadding="50">
                        <thead>
                            <th class="day">Minggu</th>
                            <th class="day">Senin</th>
                            <th class="day">Selasa</th>
                            <th class="day">Rabu</th>
                            <th class="day">Kamis</th>
                            <th class="day">Jumat</th>
                            <th class="day">Sabtu</th>
                        </thead>';

$calendarHTML .= '<thead>
                    <th class="bulanLalu">30</th>
                    <th class="bulanLalu">31</th>
                    <th class="bulanSekarang">1</th>
                    <th class="bulanSekarang">2</th>
                    <th class="bulanSekarang">3</th>
                    <th class="bulanSekarang">4</th>
                    <th class="bulanSekarang">5</th>
                    </thead>
                    </thead>
                    <tbody>';

for($i=30; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-07-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 5; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">6</th>
                    <th class="bulanSekarang">7</th>
                    <th class="bulanSekarang">8</th>
                    <th class="bulanSekarang">9</th>
                    <th class="bulanSekarang">10</th>
                    <th class="bulanSekarang">11</th>
                    <th class="bulanSekarang">12</th>
                    </thead>
                    <tbody>';

for($i=6; $i <= 9; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=10; $i <= 12; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                    <th class="bulanSekarang">13</th>
                    <th class="bulanSekarang">14</th>
                    <th class="bulanSekarang">15</th>
                    <th class="bulanSekarang">16</th>
                    <th class="bulanSekarang">17</th>
                    <th class="bulanSekarang">18</th>
                    <th class="bulanSekarang">19</th>
                    </thead>
                    <tbody>';

for($i=13; $i <= 19; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= ' </tbody>
                    <thead>
                    <th class="bulanSekarang">20</th>
                    <th class="bulanSekarang">21</th>
                    <th class="bulanSekarang">22</th>
                    <th class="bulanSekarang">23</th>
                    <th class="bulanSekarang">24</th>
                    <th class="bulanSekarang">25</th>
                    <th class="bulanSekarang">26</th>
                    </thead>
                    <tbody>';

for($i=20; $i <= 26; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

$calendarHTML .= '</tbody>
                    <thead>
                        <th class="bulanSekarang">27</th>
                        <th class="bulanSekarang">28</th>
                        <th class="bulanSekarang">29</th>
                        <th class="bulanSekarang">30</th>
                        <th class="bulanSekarang">31</th>
                        <th class="bulanDepan">1</th>
                        <th class="bulanDepan">2</th>
                    </thead>
                    <tbody>';

for($i=27; $i <= 31; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-08-".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}

for($i=1; $i <= 2; $i++) {
    $notation = true;
    for ($j=0; $j < count($eventDate); $j++) { 
        if("2023-09-0".$i == $eventDate[$j][0]){
            $calendarHTML .= '<td><a href="deskripsi.php">'.$eventName[$j][0].'</a></td>';
            $notation = true;
            break;
        }
        else{
            $notation = false;
        }
    }

    if($notation == false){
        $calendarHTML .= '<td></td>';
    }
}


$calendarHTML .= '</tbody>
                    </table>
                    <footer id="bawah">Mini Project</footer>';

echo $calendarHTML;

// Tes, comment jika kode ndak berhasil sampai sini

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>