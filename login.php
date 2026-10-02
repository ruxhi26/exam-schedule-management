<?php
session_start();
require_once "config/db.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $stmt = $conn->prepare("SELECT admin_id, username, password FROM admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    if ($admin && password_verify($password, $admin["password"])) {
        $_SESSION["admin_id"] = $admin["admin_id"];
        $_SESSION["admin_username"] = $admin["username"];
        header("Location: admin/dashboard.php");
        exit();
    }
    $error = "Invalid username or password.";
}
?>
<!DOCTYPE html><html><head><title>Admin Login</title><link rel="stylesheet" href="assets/css/style.css"></head>
<body><div class="container"><div class="card" style="max-width:450px;margin:80px auto">
<h2>Exam Schedule Management System</h2><h3>Admin Login</h3>
<?php if($error): ?><div class="alert"><?=htmlspecialchars($error)?></div><?php endif; ?>
<form method="post"><label>Username</label><input name="username" required>
<label>Password</label><input type="password" name="password" required>
<button class="btn" type="submit">Login</button></form>
<p class="small">Default demo account: admin / admin123</p>
<p><a href="student/login.php">Student Login</a></p></div></div></body></html>