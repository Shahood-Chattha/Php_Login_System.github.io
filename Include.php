<?php

// session
if (!isset($_SESSION)) {
    session_start();
}
echo $_SESSION['Login'] . "<br/>";

// connection
$con = mysqli_connect("localhost", "root", "", "chatttha developers");
if (!$con) {
    $msg = "could not connect to database <br/>";
    $msg = "error number " . mysqli_connect_errno();
    $msg = "error: " . mysqli_connect_error();
    die($msg);
}
echo "<br/>you are connected to the database";
echo mysqli_get_host_info($con);

echo "<br/>";

// getting data from get request
if (isset($_GET['submit'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['Lastname'];
    $email = $_GET['Email'];
    $password = $_GET['pass'];

    // insertion
    $stmt = $con->prepare("INSERT INTO users( Email, Firstname, Lastname, Passwords)
VALUES(?,?,?,?)");
    $stmt->bind_param("ssss", $email, $firstname, $lastname, $password);
    $stmt->execute();


    $pass = urldecode($_GET['pass']);
    if ($pass == "Login") {
        $_SESSION['pass_correct'] = 1;
    }
    if (isset($_SESSION['pass_correct'])) {
        echo "<br/>You are Logged in";
    } else {
        echo "<br/>Please try again <br/>";
    }
    // get data from chattha developer data_base
    $info = mysqli_query($con, "SELECT * FROM users");

    $User1 = mysqli_query($con, "SELECT * FROM users WHERE  Firstname='$firstname' AND   Lastname='$lastname' LIMIT 1");
    $User1 = mysqli_fetch_array($User1);
    echo "Your first name is : " . $User1['Firstname'] . "<br/>";
    echo "Your Last name is : " . $User1['Lastname'] . "<br/>";
    echo "Your email is : " . $User1['Email'] . "<br/>";
    echo "Your Password is : " . $User1['Passwords'] . "<br/>";

} else {
    echo "no problem";
}


$stmt->close();

// closing connection
mysqli_close($con);

// file handler
$file_adder = fopen("TEXT.txt", "w") or die("File couldn't create");
fclose($file_adder);


// upload file syntax
// $error = $_FILES['image']['error'];
// if ($error <= 0) {
//     $templ = $_FILES['image']['tmp_name'];
//     echo $_FILES['image']['type'] . "is your image type";
//     echo "<br/>";
//     move_uploaded_file($templ, "uploads/" . $_FILES['image']['name']);
//     echo "your image has been uploaded to uploads/" . $_FILES['image']['name'];
// } else {
//     echo "error is : " . $error;
// }
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
    <form action="Updateuser.php" method="get">
        <h2>Update your data</h2>
        <label for="pfirstnameup">Previous FirstName:</label>
        <input type="text" name="pfirstnameup"><br><br>
        <label for="firstnameup">FirstName:</label>
        <input type="text" name="firstnameup"><br><br>
        <label for="Lastnameup">LastName:</label>
        <input type="text" name="lastnameup"><br><br>
        <input type="submit" name="submitup"></input>
    </form>
    <form action="Updateuser.php" method="get">
        <h2>To skip</h2>
        <input type="submit" name="skip" value="Skip">
    </form>
</body>

</html>