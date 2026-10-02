<?php
require_once "../../includes/auth.php"; require_admin(); require_once "../../config/db.php";
$id=(int)($_GET["id"]??0); $stmt=$conn->prepare("DELETE FROM subjects WHERE subject_id=?"); $stmt->bind_param("i",$id); $stmt->execute(); header("Location:index.php"); exit();
?>