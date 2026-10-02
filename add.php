<?php
require_once "../../includes/auth.php"; require_admin(); require_once "../../config/db.php";
$msg="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
 $code=trim($_POST["subject_code"]); $name=trim($_POST["subject_name"]);
 $stmt=$conn->prepare("INSERT INTO subjects(subject_code,subject_name) VALUES(?,?)"); $stmt->bind_param("ss",$code,$name);
 if($stmt->execute()) header("Location:index.php"); else $msg="Could not add subject.";
}
?>
<!DOCTYPE html><html><head><title>Add Subject</title><link rel="stylesheet" href="../../assets/css/style.css"></head><body>
<div class="container"><div class="card"><h2>Add Subject</h2><?php if($msg):?><div class="alert"><?=$msg?></div><?php endif;?>
<form method="post"><label>Subject Code</label><input name="subject_code" required><label>Subject Name</label><input name="subject_name" required><button class="btn btn-success">Save</button> <a class="btn btn-secondary" href="index.php">Cancel</a></form></div></div></body></html>