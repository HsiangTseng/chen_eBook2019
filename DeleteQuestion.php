<?php

include("connects.php");
$number = $_GET['number'];

$sqlQuestion = "UPDATE Question SET status='0' WHERE question_no='$number'";
$db->query($sqlQuestion);
$db->close();
echo "<script>alert('題目已刪除'); location.href = 'QuestionList.php';</script>";
?>
