<?php
date_default_timezone_set('Asia/Kolkata');
include 'dbh.inc.php';
include 'comments.inc.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php
echo "<form method='POST' action='".getLogin($conn)."'>
    <input type='text' name='uid'>
    <input type='password' name='pwd'>
    <button type='submit' name='loginSubmit'>Login</button>
</form>";
echo "<form method='POST' action='".userLogout()."'>
    <button type='submit' name='logoutSubmit'>Logout</button>
</form>";

if (isset($_SESSION["id"])) {
echo "You are logged in!";
} else {
    echo "You are not logged in!";
}

?>
<br><br>


<?php
if (isset($_SESSION['id'])) {
    echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit'>Comment</button>
</form>";
    } else {
        echo "You need to be logged in to comment!";
    }


    getComments($conn);
?>
</body>
</html>