<?php
session_start();
include 'db.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $stmt=$conn->prepare("SELECT id,password from users where username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id,$hashed_password);
    if($stmt->fetch() && password_verify($password,$hashed_password))
    {
        $_SESSION["user_id"]=$id;header("Location:index.php");
    }
    else{
        echo "invalid credentials.";
    }
}
?>
<h2>Login</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>