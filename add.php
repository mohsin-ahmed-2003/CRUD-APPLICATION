<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'newdatabase';
$connect = mysqli_connect($host, $username, $password, $db_name);
if (!$connect) {
    die('Fail to connect' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    <style>
        body {
            background-color: lightblue;
        }

        h1 {
            padding-left: 40%;
        }

        button {
            margin: 10px;
            height: 30px;
            margin-left: 45%;
        }

        table {
            margin-left: 35%;
            border-color: gray;
        }

        .inp {
            margin-top: 10px;
            margin-left: 600px;
            height: 33px;
            width: 80px;
            background-color: lightskyblue;
            border-color: gray;
            border-radius: 30px;
        }
        .lin {
            border-radius: 30px;
            height: 33px;
            width: 80px;
            border-color: gray;
            background-color: lightskyblue;
            margin-left: 600px;
        }
    </style>
</head>

<body>
    <h1>Add new Student</h1>
    <table border="3px" cellpadding="20px">
        <form method="POST" enctype="multipart/form-data"><b>
                <tr>
                    <td>Enter First Name :</td>
                    <td><input type="text" name="fname" id=""></td>
                </tr>
                <tr>
                    <td>Enter Last Name : </td>
                    <td><input type="text" name="lname" id=""></td>
                </tr>
                <tr>
                    <td>Enter Email : </td>
                    <td><input type="email" name="email" id=""></td>
                </tr>
                <tr>
                    <td>Select Gender :</td>
                    <td>
                        <select name="gender" id="">
                            <option value="male">Male</option>
                            <option value="female">Female
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Enter contact Number : </td>
                    <td><input type="number" name="contact" id=""></td>
                </tr>
                <tr>
                    <td>Enter Address : </td>
                    <td><input type="text" name="address" id=""></td>
                </tr>
    </table>
    <input class="inp" type="submit" value="Submit" name="btn">
    </form>

    <a href="index.php"><button class="lin">Back</button></a>

</body>

<?php
if (isset($_POST['btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $query = "INSERT INTO studentdata(fname,lname,email,gender,contact,address)
            VALUES('$fname','$lname','$email','$gender','$contact','$address')";
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Student data Added succesfully...')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    } else {
        echo 'Error';
    }
}


?>

</html>