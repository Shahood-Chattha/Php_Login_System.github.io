<?php
$con = mysqli_connect("localhost", "root", "", "chatttha developers");
if (!$con) {
    $msg = "could not connect to database <br/>";
    $msg = "error number " . mysqli_connect_errno();
    $msg = "error: " . mysqli_connect_error();
    die($msg);
}
echo "<br/>you are connected to the database";
echo mysqli_get_host_info($con);

mysqli_close($con);
?>