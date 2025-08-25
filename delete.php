<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>        
    body {
        background-color: lightblue;
    }
</style>
<body>
    
</body>
</html>
<?php
$servername = 'localhost';
$user_name = 'root';
$user_pwd = '';
$dbname = 'newdatabase';
$connect = mysqli_connect($servername,$user_name,$user_pwd,$dbname);
if(!$connect){
    die("Database connection fail". mysqli_connect_error());
}
else{
    echo 'ok';
}

if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $query = "delete from studentdata where std_id= '$delete'";
    if(mysqli_query($connect, $query)){
        echo "<script>alert('Student data is deleted...')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
}
?>

