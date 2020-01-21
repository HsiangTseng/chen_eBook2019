<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
include("connects.php");

//-----BOOK DATA FROM POST-----
$main_title = $_POST['main_title'];
$sub_title = $_POST['sub_title'];
$edit_teacher = $_POST['edit_teacher'];
$page = $_POST['page'];
$content = $_POST['content'];

//print_r($content);

  //print_r ($content);
  //echo $main_title.'-'.$sub_title.'-'.$edit_teacher.'-'.$page;




  //-----SQL-----
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

  //INSERT TeachMaterial DataTable
  if(isset($_POST['material_name']))
  {
      //-----TEACH MATERIAL FROM POST-----
      $material_name = $_POST['material_name'];
      $material_content = $_POST['material_content'];
        //print_r($material_name);
        //print_r($material_content);

      foreach ($material_name as $key => $value) {
        $material_no = $key+1;
        //IMG FILE UPLOAD_ERR_OK
        $name = 'A'.$material_no.'_file';
        $n = 'A'.$material_no;
        if ($_FILES[$name]['error'] === UPLOAD_ERR_OK){
        $file = $_FILES[$name]['tmp_name'];
        $ext[$material_no] = end(explode('.', $_FILES[$name]['name']));
        $dest = 'upload/B'.$max_number.'M'.$material_no.'.'.$ext[$material_no];
        move_uploaded_file($file, $dest);
        }
        else {
        }

        $sql3 = "INSERT INTO TeachMaterial (book_id, material_no, title, img, content) VALUES ('$max_number', '$material_no', '$material_name[$key]','$dest' ,'$material_content[$key]')";
        $db->query($sql3);
      }
  }
  echo "<script>alert('編書成功'); location.href = 'BookList.php';</script>";


?>
