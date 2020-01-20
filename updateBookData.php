<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include("connects.php");
$main_title = $_POST['main_title'];
$sub_title = $_POST['sub_title'];
$edit_teacher = $_POST['edit_teacher'];
$page = $_POST['page'];
$content = $_POST['content'];
/*echo $page1;
print_r ($content);
echo $main_title.'-'.$sub_title.'-'.$edit_teacher.'-'.$page;*/
//GET MAX

$sql = "SELECT MAX(book_id) AS max FROM Book";
  $result = mysqli_fetch_object($db->query($sql));
  $max_number = $result->max;
  $max_number = $max_number+1;
  //echo $max_number;

  $date1 = date("Y-m-d");

  // INSERT BOOK DataTable
  $sql2 = "INSERT INTO Book (book_id, main_title, sub_title, edit_teacher, pages, create_date) VALUES ('$max_number', '$main_title', '$sub_title', '$edit_teacher', '$page', '$date1')";
  $db->query($sql2);

  //INSERT PAGE DatTable
  foreach ($content as $key => $value) {
    $page_number = $key;
    $page_number ++;
    $sql3 = "INSERT INTO Page (book_id, page_no, content) VALUES ('$max_number', '$page_number', '$content[$key]')";
    $db->query($sql3);
  }

?>
