<?php
require_once "../includes/auth.php"; require_admin(); require_once "../config/db.php";
$subjects = $conn->query("SELECT COUNT(*) c FROM subjects")->fetch_assoc()['c'];
$rooms = $conn->query("SELECT COUNT(*) c FROM rooms")->fetch_assoc()['c'];
$exams = $conn->query("SELECT COUNT(*) c FROM exams")->fetch_assoc()['c'];
?>
<!DOCTYPE html><html><head><title>Admin Dashboard</title><link rel="stylesheet" href="../assets/css/style.css"></head>
<body><div class="navbar"><b>Admin Dashboard</b><div><a href="../index.php">Home</a><a href="../logout.php">Logout</a></div></div>
<div class="container"><h1>Welcome, <?=htmlspecialchars($_SESSION['admin_username'])?></h1>
<div class="grid"><div class="card"><div class="stat"><?=$subjects?></div><div class="small">Subjects</div></div><div class="card"><div class="stat"><?=$rooms?></div><div class="small">Rooms</div></div><div class="card"><div class="stat"><?=$exams?></div><div class="small">Exam Schedules</div></div></div>
<div class="grid"><a class="card" href="subjects/index.php"><h3>Subject Management</h3><p>Add, view, edit and delete subjects.</p></a>
<a class="card" href="rooms/index.php"><h3>Room Management</h3><p>Manage examination rooms.</p></a>
<a class="card" href="exams/index.php"><h3>Exam Schedule Management</h3><p>Create and manage exam schedules.</p></a></div></div></body></html>