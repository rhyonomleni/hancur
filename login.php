<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "mini_project_2") or die("koneksi gagal");

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if ($username == "" or $password == "") {
       ?><html><p style="color:red">Masukkan username dan password</p></html> <?php
    }
    elseif (mysqli_num_rows($result) == 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["password"]) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: kalender.php");
            exit;
        }else{
            ?> <html><p style="color:red">username atau password salah</p></html><?php
        }
    }else{
        ?> <html><p style="color:red">username atau password salah</p></html><?php
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function cek(){
            var user=document.getElementById('username')
            var pass=document.getElementById('password')
            if ($username == "" || $password == "") {
                alert("Masukkan username dan password");
            }else if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                if ($password == $row["password"]) {
                    //set session
                    $_SESSION["login"] = true;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    header("Location: kalender.php");
                    exit;
                }else{
                    alert("username atau password salah");
                }
            }else{
                alert("username atau password salah");
            }
        }
    </script>
</head>
<body>

    <form method="POST" action="login.php" enctype="multipart/form-data">
        <label for="username">username : </label>
        <input type="text" name="username" maxlength="30" id="username"> <br>
        <label for="password">password : </label>
        <input type="password" name="password" maxlength="30" id="password"> <br>
        <input type="submit" name="login" id="login" value="submit">
    </form>
</body>
</html>