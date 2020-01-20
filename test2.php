<?php
include("connects.php");

$material_name = $_POST['material_name'];
$material_content = $_POST['material_content'];
print_r($material_name);
print_r($material_content);

$sql = "SELECT MAX(book_id) AS max FROM Book";
  $result = mysqli_fetch_object($db->query($sql));
  $max_number = $result->max;
  $max_number = $max_number+1;
  //echo $max_number;

  //INSERT TeachMaterial DataTable
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
?>
