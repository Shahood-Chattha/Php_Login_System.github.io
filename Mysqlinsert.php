<?php
// connection to local host
$con = mysqli_connect("localhost", "root", "", "chatttha developers");
if (!$con) {
    $msg = "could not connect to database <br/>";
    $msg = "error number " . mysqli_connect_errno();
    $msg = "error: " . mysqli_connect_error();
    die($msg);
}
echo "<br/>you are connected to the database";
echo mysqli_get_host_info($con);


// insertion
mysqli_query($con, "INSERT INTO users(Email, Firstname, Lastname, Passwords)
VALUES('example@email.com','fname','lname','Password 123')");

// escaping
function clean($connection, $input)
{
    return mysqli_real_escape_string($connection, $input);
}
echo "<br/>";
$string = 'this is a "problem" ';
echo clean($con, $string);
// unescaping
echo "<br/>";
echo stripcslashes($string);

mysqli_close($con);

?>