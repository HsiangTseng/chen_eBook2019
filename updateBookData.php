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

  if(isset($_POST['Question_ddl']))
  {
    $Q_ddl = $_POST['Question_ddl'];
    $Q_ddl = implode ("-", $Q_ddl);
    //$Q_ddl will be like 1-2-5-7-8
  }
  else{
    $Q_ddl = "";
  }

  // INSERT BOOK DataTable
  if($_POST['edit_tag']==0)
  {
    $sql2 = "INSERT INTO Book (book_id, main_title, sub_title, edit_teacher, pages, question, create_date) VALUES ('$max_number', '$main_title', '$sub_title', '$edit_teacher', '$page', '$Q_ddl', '$date1')";
    $db->query($sql2);
  }
  // IF EDIT MODE , UPDATE BOOK DataTable
  else if($_POST['edit_tag']==1)
  {
    $max_number = $_POST['edit_book_id'];
    $sql2 = "UPDATE Book SET main_title='$main_title', sub_title='$sub_title', edit_teacher='$edit_teacher', question='$Q_ddl' WHERE book_id='$max_number'";
    $db->query($sql2);
  }



  //INSERT PAGE DatTable
  if($_POST['edit_tag']==0)
  {
    foreach ($content as $key => $value) {
      //IMG FILE UPLOAD_ERR_OK
      $page_index = $key;
      $page_index++;
      $page_img_name = 'P'.$page_index.'_file';
      $page_img_output_name = "";

      if ($_FILES[$page_img_name]['error'] === UPLOAD_ERR_OK){
      $file = $_FILES[$page_img_name]['tmp_name'];
      $ext[$page_index] = end(explode('.', $_FILES[$page_img_name]['name']));
      $dest = 'upload/B'.$max_number.'P'.$page_index.'.'.$ext[$page_index];
      $page_img_output_name = 'B'.$max_number.'P'.$page_index.'.'.$ext[$page_index];
      move_uploaded_file($file, $dest);
      }
      else {
      }
      $page_number = $key;
      $page_number ++;
      $sql3 = "INSERT INTO Page (book_id, page_no, content,picture_ext) VALUES ('$max_number', '$page_number', '$content[$key]','$page_img_output_name')";
      $db->query($sql3);
      //echo $content[$key];
    }
  }

  // IF EDIT MODE, UPDATE PAGE DatTable
  else if($_POST['edit_tag']==1)
  {
    foreach ($content as $key => $value) {
      //IMG FILE UPLOAD_ERR_OK
      $page_number = $key;
      $page_number ++;

      $page_index = $key;
      $page_index++;

      $page_img_name = 'P'.$page_index.'_file';
      $page_img_output_name = "";

      if ($_FILES[$page_img_name]['error'] === UPLOAD_ERR_OK)
      {
        //MAKE SURE THERE IS A IMG IN DB OR NOT
        $sql_check = "SELECT picture_ext FROM Page WHERE book_id = '$max_number' AND page_no = '$page_number'";
        $result = mysqli_fetch_object($db->query($sql_check));
        $pic_ext = $result->picture_ext;
        //IF THERE IS A IMAGE EXIST
        if(strlen($pic_ext)>1)
        {
          //DELETE OLD FILE.
          unlink('upload/'.$pic_ext);
        }

        //UPLOAD NEW FILE
        $file = $_FILES[$page_img_name]['tmp_name'];
        $ext[$page_index] = end(explode('.', $_FILES[$page_img_name]['name']));
        $dest = 'upload/B'.$max_number.'P'.$page_index.'.'.$ext[$page_index];
        $page_img_output_name = 'B'.$max_number.'P'.$page_index.'.'.$ext[$page_index];
        move_uploaded_file($file, $dest);

        //UPDATE PIC_EXT
        $sql3 = "UPDATE Page SET picture_ext = '$page_img_output_name' WHERE book_id = '$max_number' AND page_no = '$page_number'";
        $db->query($sql3);

      }
      else {
      }


      $sql3 = "UPDATE Page SET content = '$content[$key]' WHERE book_id = '$max_number' AND page_no = '$page_number'";
      $db->query($sql3);
    }
  }




  //INSERT TeachMaterial DataTable
  if($_POST['edit_tag']==0)
  {
    if(isset($_POST['material_name']))
    {
        //-----TEACH MATERIAL FROM POST-----
        $material_name = $_POST['material_name'];
        $material_content = $_POST['material_content'];
          //print_r($material_name);
          //print_r($material_content);

        foreach ($material_name as $key => $value) {
          $material_no = $key+1;

          $dest = '';
          $video_dest = '';
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

          $video_name = 'A'.$material_no.'video_file';
          if ($_FILES[$video_name]['error'] === UPLOAD_ERR_OK){
          $file = $_FILES[$video_name]['tmp_name'];
          $video_ext[$material_no] = end(explode('.', $_FILES[$video_name]['name']));
          $video_dest = 'upload/B'.$max_number.'M'.$material_no.'V.'.$video_ext[$material_no];
          move_uploaded_file($file, $video_dest);
          }
          else {
          }

          $sql3 = "INSERT INTO TeachMaterial (book_id, material_no, title, img, video, content) VALUES ('$max_number', '$material_no', '$material_name[$key]','$dest' ,'$video_dest', '$material_content[$key]')";
          $db->query($sql3);
        }
    }
  }
  // IF EDIT MODE, UPDATE TeachMaterial DatTable
  else if ($_POST['edit_tag']==1)
  {
    if(isset($_POST['material_name']))
    {
      //-----TEACH MATERIAL FROM POST-----
      $material_name = $_POST['material_name'];
      $material_content = $_POST['material_content'];

      foreach ($material_name as $key => $value) {
        $material_no = $key+1;

        $dest = '';
        $video_dest = '';
        //IMG FILE UPLOAD_ERR_OK
        $name = 'A'.$material_no.'_file';
        $n = 'A'.$material_no;

        //EDIT IMAGE
        if ($_FILES[$name]['error'] === UPLOAD_ERR_OK)
        {
          //MAKE SURE THERE IS A IMG IN DB OR NOT
          $sql_check = "SELECT img FROM TeachMaterial WHERE book_id = '$max_number' AND material_no = '$material_no'";
          $result = mysqli_fetch_object($db->query($sql_check));
          $pic_ext = $result->img;
          //IF THERE IS A IMAGE EXIST
          if(strlen($pic_ext)>1)
          {
            //DELETE OLD FILE.
            unlink($pic_ext);
          }

          //UPLOAD NEW FILE
          $file = $_FILES[$name]['tmp_name'];
          $ext[$material_no] = end(explode('.', $_FILES[$name]['name']));
          $dest = 'upload/B'.$max_number.'M'.$material_no.'.'.$ext[$material_no];
          move_uploaded_file($file, $dest);

          //UPDATE PIC_EXT
          $sql3 = "UPDATE TeachMaterial SET img = '$dest' WHERE book_id = '$max_number' AND material_no = '$material_no'";
          $db->query($sql3);

        }
        else {
        }

        //EDIT VIDEO
        $video_name = 'A'.$material_no.'video_file';
        if ($_FILES[$video_name]['error'] === UPLOAD_ERR_OK)
        {
          //MAKE SURE THERE IS A VIDEO IN DB OR NOT
          $sql_check = "SELECT video FROM TeachMaterial WHERE book_id = '$max_number' AND material_no = '$material_no'";
          $result = mysqli_fetch_object($db->query($sql_check));
          $video_ext = $result->video;
          //IF THERE IS A IMAGE EXIST
          if(strlen($video_ext)>1)
          {
            //DELETE OLD FILE.
            unlink($video_ext);
          }

          //UPLOAD NEW FILE
          $file = $_FILES[$video_name]['tmp_name'];
          $video_ext[$material_no] = end(explode('.', $_FILES[$video_name]['name']));
          $video_dest = 'upload/B'.$max_number.'M'.$material_no.'V.'.$video_ext[$material_no];
          move_uploaded_file($file, $video_dest);

          //UPDATE PIC_EXT
          $sql3 = "UPDATE TeachMaterial SET video = '$video_dest' WHERE book_id = '$max_number' AND material_no = '$material_no'";
          $db->query($sql3);

        }
        else {
        }

        $sql3 = "UPDATE TeachMaterial SET title = '$material_name[$key]',content = '$material_content[$key]' WHERE book_id = '$max_number' AND material_no = '$material_no'";
        $db->query($sql3);
      }
    }

  }




  //INSERT Audio DataTable
  if($_POST['edit_tag']==0)
  {
    if(isset($_POST['audio_title']))
    {
      $audio_title = $_POST['audio_title'];
      //for each question
      foreach ($audio_title as $key => $value) {
        $audio_index = $key;
        $audio_index ++;
        $audio_output_name="";
        $audio_name = 'Audio'.$audio_index.'_file';
        if ($_FILES[$audio_name]['error'] === UPLOAD_ERR_OK){
      	  $file = $_FILES[$audio_name]['tmp_name'];
      	  $audio_ext = end(explode('.', $_FILES[$audio_name]['name']));
      	  $audio_dest = 'upload/B'.(string)$max_number.'Audio'.$audio_index.'.'.$audio_ext;
          $audio_output_name = 'B'.(string)$max_number.'Audio'.$audio_index.'.'.$audio_ext;
      	  move_uploaded_file($file, $audio_dest);
      	  }
      	else {
      	}
        $sql = "INSERT INTO Audio (book_id, audio_no, title, audio_ext) VALUES ('$max_number','$audio_index','$audio_title[$key]','$audio_output_name')";
        $db->query($sql);
      }
    }
  }

  //IF EDIT MODE
  else if ($_POST['edit_tag']==1)
  {
    if(isset($_POST['audio_title']))
    {
      $audio_title = $_POST['audio_title'];
      //for each question
      foreach ($audio_title as $key => $value) {
        $audio_index = $key;
        $audio_index ++;
        $audio_output_name="";
        $audio_name = 'Audio'.$audio_index.'_file';

        if ($_FILES[$audio_name]['error'] === UPLOAD_ERR_OK){
          //MAKE SURE THERE IS A VIDEO IN DB OR NOT
          $sql_check = "SELECT audio_ext FROM Audio WHERE book_id = '$max_number' AND audio_no = '$audio_index'";
          $result = mysqli_fetch_object($db->query($sql_check));
          $audio_ext = $result->audio_ext;
          //echo $audio_ext;
          if(strlen($audio_ext)>1)
          {
            //DELETE OLD FILE.
            //echo 'uplink..'.$audio_ext;
            unlink('upload/'.$audio_ext);
          }

          //UPLOAD NEW FILE
      	  $file = $_FILES[$audio_name]['tmp_name'];
      	  $audio_ext = end(explode('.', $_FILES[$audio_name]['name']));
      	  $audio_dest = 'upload/B'.(string)$max_number.'Audio'.$audio_index.'.'.$audio_ext;
          $audio_output_name = 'B'.(string)$max_number.'Audio'.$audio_index.'.'.$audio_ext;
      	  move_uploaded_file($file, $audio_dest);

          $sql = "UPDATE Audio SET audio_ext = '$audio_output_name' WHERE book_id = '$max_number' AND audio_no = '$audio_index'";
          $db->query($sql);
      	  }
      	else {
      	}
        $sql = "UPDATE Audio SET title = '$audio_title[$key]' WHERE book_id = '$max_number' AND audio_no = '$audio_index'";
        $db->query($sql);
      }
    }
  }


  echo "<script>alert('編書成功'); location.href = 'BookList.php';</script>";


?>
