<?php
// sesssion
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['Login'] = "Login Page";
}



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
    <form action="include.php" method="get">
        <label for="firstname">FirstName:</label>
        <input type="text" name="firstname"><br><br>
        <label for="Lastname">LastName:</label>
        <input type="text" name="Lastname"><br><br>
        <label for="Email">Email:</label>
        <input type="text" name="Email"><br><br>
        <label for="pass">Enter password:</label>
        <input type="password" name="pass"><br><br>
        <input type="submit" name="submit"></input>
    </form>
    <br>
    <!-- uploading file -->
    <!-- <form action="include.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="upload file">
    </form> -->
</body>

</html>