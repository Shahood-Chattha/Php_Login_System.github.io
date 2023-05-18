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

// updating data to database
if (isset($_GET['submitup'])) {
    // Prepare the SQL statement with placeholders
    $stmt = $con->prepare("UPDATE users SET Lastname=?, Firstname=? WHERE Firstname=?");
    // Bind the variables to the placeholders
    $Pfirstnameup = $_GET['pfirstnameup'];
    $firtnameup = $_GET['lastnameup'];
    $lastnameup = $_GET['firstnameup'];
    $stmt->bind_param("sss", $firtnameup, $lastnameup, $Pfirstnameup);

    // Execute the statement
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo "Update successful";
    } else {
        echo "Update failed";
    }
    echo "<br/>";

    // Close the statement and the connection
    $stmt->close();

    // get data from chattha developer data_base
    $info = mysqli_query($con, "SELECT * FROM users");

    $User1 = mysqli_query($con, "SELECT * FROM users WHERE  Firstname='$lastnameup' LIMIT 1") or die(mysqli_error($con));
    $User1 = mysqli_fetch_array($User1);
    echo "Your first name is : " . $User1['Firstname'] . "<br/>";
    echo "Your Last name is : " . $User1['Lastname'] . "<br/>";
    echo "Your email is : " . $User1['Email'] . "<br/>";
    echo "Your Password is : " . $User1['Passwords'] . "<br/>";


} else {
    echo "no problem";
}
echo "<br/>";

// to delete column
if (isset($_GET['delete'])) {
    $pfirstnamed = $_GET['pfirstnamed'];
    $delete = mysqli_query($con, "DELETE FROM users where Firstname='$pfirstnamed' ") or die(mysqli_error($con));
    echo "Your data is successfully deleted";
}



// closing connection
mysqli_close($con);

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
        <h2>Delete your data</h2>
        <label for="pfirstnamed">Previous FirstName</label>
        <input type="text" name="pfirstnamed"><br><br>
        <input type="submit" name="delete" value="Delete">
    </form>
</body>

</html>