<!DOCTYPE html>
<?php
$servername = 'localhost';
$user_name = 'root';
$user_pwd = '';
$dbname = 'newdatabase';
$connect = mysqli_connect($servername,$user_name,$user_pwd,$dbname);
if(!$connect){
    die("Database connection fail". mysqli_connect_error());
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Students data</title>
    <style>
        body{
            text-align: center;
            background-color: lightblue;
        }
        table{ margin-left: auto; margin-right: auto;}
        .btn{ 
            margin-top: 15px; 
            height: 30px;
            border-color: gray;
            height: 33px;
            border-radius: 20px;
            background-color: lightskyblue;
            width: 80px;
        }
        .inp{
            margin-top: 10px;
            height: 33px;
            background-color: lightskyblue;
            width: 80px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['edit'])){

            $edit = $_GET['edit'];

            $obj = "SELECT * FROM studentdata WHERE std_id= '$edit'";
            
            $query = mysqli_query($connect, $obj);
            while($row = mysqli_fetch_array($query))
        {
            $std_id = $row['std_id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $gender = $row['gender'];
            $contact = $row['contact'];
            $address = $row['address'];
    ?>
    <h1>Edit Student Data</h1>
    <table border="3px" cellpadding="20px">
        <form method="POST" enctype="multipart/form-data"><b>
                <tr><td>Enter First Name :</td><td><input type="text" name="fname" id="" value="<?php echo $fname ?>"></td> </tr>
                <tr><td>Enter Last Name : </td><td><input type="text" name="lname" id="" value="<?php echo $lname ?>"></td> </tr>
                <tr><td>Enter Email : </td><td><input type="email" name="email" id="" value="<?php echo $email ?>"></td> </tr>
                <tr><td>Select Gender :</td><td>
                <select name="gender" id="">
                    <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                    <option value="male">Male</option>
                    <option value="female">Female
                    </option>
                </select></td> </tr>
                <tr><td>Enter contact Number : </td><td><input type="number" name="contact" value="<?php echo $contact ?>" id=""></td> </tr>
                <tr><td>Enter Address : </td><td><input type="text" name="address" id="" value="<?php echo $address ?>"></td> </tr>
    </table>
    <input class='inp' type="submit" value="update" name="update"><br>
            </form>

<a href="index.php"><button class="btn">Back</button></a>

<?php }} ?>   
<?php
if(isset($_POST['update'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $upd = "UPDATE studentdata SET fname='$fname', lname='$lname', email='$email', gender='$gender', contact='$contact', address='$address' WHERE std_id='$std_id'";
    if(mysqli_query($connect, $upd)){
        echo "<script>alert('Student data Updated succesfully')</script>";
        echo "<script>window.open('index.php', '__self')</script>";
    }else{
        echo "<script>alert('Fail to update, Please try again')</script>";
    }
}
?>
</body>
</html>