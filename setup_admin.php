<?php
require_once "config/db.php";
$username="admin"; $password="admin123"; $hash=password_hash($password,PASSWORD_DEFAULT);
$stmt=$conn->prepare("INSERT INTO admins(username,password) VALUES(?,?) ON DUPLICATE KEY UPDATE password=VALUES(password)");
$stmt->bind_param("ss",$username,$hash); $stmt->execute();
echo "Admin account ready. Username: admin | Password: admin123. Delete this file after setup.";
?>