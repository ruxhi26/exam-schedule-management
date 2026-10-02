<?php
session_start();

function require_admin() {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: /exam_schedule/login.php");
        exit();
    }
}

function require_student() {
    if (!isset($_SESSION['student_id'])) {
        header("Location: /exam_schedule/student/login.php");
        exit();
    }
}
?>