<!DOCTYPE html>
<?php
$servername = 'localhost';
$user_name = 'root';
$user_pwd = '';
$dbname = 'newdatabase';
$connect = mysqli_connect($servername, $user_name, $user_pwd, $dbname);
if (!$connect) {
    die("Database connection fail" . mysqli_connect_error());
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students data</title>
    <style>
        body {
            text-align: center;
            background-color: lightblue;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }
        .inner{
            position: relative;
        }
        .outer{
            position: absolute;
            top: -50px;
            right: 26px;
            translate: -50 -50;
        }
        .btn{
            background-color: lightskyblue;
            color: white;
            height: 35px;
            border-radius: 40px;
            width: 70px;
            margin: 5px;
        }
        .add{
            background-color: lightskyblue;
            color: white;
            height: 35px;
            border-radius: 40px;
            margin: 5px;
            width: 110px;
        }
    </style>
</head>

<body>
    <h1>Student data</h1>
    <div class="inner">
        <table border="5px" cellpadding='20px' cellspacing="0px">
            <tr>
                <td>Student id</td>
                <td>Full name</td>
                <td>Last name</td>
                <td>Email</td>
                <td>Gender</td>
                <td>Contact</td>
                <td>Address</td>
                <td>Action</td>
            </tr>
            <tr>
                <?php
                $query = "SELECT * FROM studentdata";
                $obj = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($obj)) {
                    $std_id = $row['std_id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $email = $row['email'];
                    $gender = $row['gender'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                ?>
                    <td><?php echo $std_id ?></td>
                    <td><?php echo $fname ?></td>
                    <td><?php echo $lname ?></td>
                    <td><?php echo $email ?></td>
                    <td><?php echo $gender ?></td>
                    <td><?php echo $contact ?></td>
                    <td><?php echo $address ?></td>
                    <td>
                        <button class="btn"><a href="edit-form.php?edit=<?php echo $std_id; ?>">Edit</a></button><br>
                        <button class="btn"><a href="delete.php?delete=<?php echo $std_id; ?>">Delete</a></button>
                    </td>
            </tr>
        <?php } ?>
        </table>
        <div class="outer">
            <a href="add.php"><button class="add">Add Student</button></a>
        </div>
    </div>
</body>

</html>