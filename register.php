<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST['username'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $stmt=$conn->prepare("INSERT INTO users(username,password)values(?,?)");
    $stmt->bind_param("ss",$username,$password);
    if($stmt->execute())
    {
        header("Location: login.php");
        exit();
    }else{
        echo "error". $stmt->error;
    }
}
?>
<h2>Register</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>