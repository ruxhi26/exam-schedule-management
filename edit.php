<?php
require_once "../../includes/auth.php"; require_admin(); require_once "../../config/db.php";
$id=(int)($_GET["id"]??0); $stmt=$conn->prepare("SELECT * FROM subjects WHERE subject_id=?"); $stmt->bind_param("i",$id); $stmt->execute(); $subject=$stmt->get_result()->fetch_assoc();
if(!$subject) die("Subject not found.");
if($_SERVER["REQUEST_METHOD"]==="POST"){
 $code=trim($_POST["subject_code"]); $name=trim($_POST["subject_name"]);
 $u=$conn->prepare("UPDATE subjects SET subject_code=?, subject_name=? WHERE subject_id=?"); $u->bind_param("ssi",$code,$name,$id); $u->execute(); header("Location:index.php"); exit();
}
?>
<!DOCTYPE html><html><head><title>Edit Subject</title><link rel="stylesheet" href="../../assets/css/style.css"></head><body><div class="container"><div class="card"><h2>Edit Subject</h2>
<form method="post"><label>Subject Code</label><input name="subject_code" value="<?=htmlspecialchars($subject['subject_code'])?>" required><label>Subject Name</label><input name="subject_name" value="<?=htmlspecialchars($subject['subject_name'])?>" required><button class="btn">Update</button> <a class="btn btn-secondary" href="index.php">Cancel</a></form></div></div></body></html>