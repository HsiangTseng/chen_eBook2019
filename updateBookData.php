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

  //INSERT Exercise DataTable
  if(isset($_POST['exercise_content']))
  {
      //-----EXERCISE FROM POST-----
      $exercise_content = $_POST['exercise_content'];
      $exercise_title = $_POST['exercise_title'];
      $A1 = $_POST['A1'];
      $A2 = $_POST['A2'];
      $A3 = $_POST['A3'];
      $A4 = $_POST['A4'];


      // INSERT BOOK DataTable

      //for each question
      foreach ($exercise_content as $key => $value) {

        //-----file block-----
        $pic_index = $key;
        $pic_index = $pic_index+1;
        $q1_name="";
        $a1_name="";
        $a2_name="";
        $a3_name="";
        $a4_name="";
        $Q_pic_name = 'E'.$pic_index.'Q1_file';
        if ($_FILES[$Q_pic_name]['error'] === UPLOAD_ERR_OK){
    	  $file = $_FILES[$Q_pic_name]['tmp_name'];
    	  $q1_ext = end(explode('.', $_FILES[$Q_pic_name]['name']));
        $q1_name = 'B'.(string)$max_number.'E'.(string)$pic_index.'Q1.'.$q1_ext;
    	  $dest = 'upload/B'.(string)$max_number.'E'.(string)$pic_index.'Q1.'.$q1_ext;
    	   move_uploaded_file($file, $dest);
    	  }
    	else {
    	}
        $A1_pic_name = 'E'.$pic_index.'A1_file';
        if ($_FILES[$A1_pic_name]['error'] === UPLOAD_ERR_OK){
        $file = $_FILES[$A1_pic_name]['tmp_name'];
        $a1_ext = end(explode('.', $_FILES[$A1_pic_name]['name']));
        $a1_name = 'B'.(string)$max_number.'E'.(string)$pic_index.'A1.'.$a1_ext;
        $dest = 'upload/B'.(string)$max_number.'E'.(string)$pic_index.'A1.'.$a1_ext;
         move_uploaded_file($file, $dest);
        }
      else {
      }
        $A2_pic_name = 'E'.$pic_index.'A2_file';
        if ($_FILES[$A2_pic_name]['error'] === UPLOAD_ERR_OK){
        $file = $_FILES[$A2_pic_name]['tmp_name'];
        $a2_ext = end(explode('.', $_FILES[$A2_pic_name]['name']));
        $a2_name = 'B'.(string)$max_number.'E'.(string)$pic_index.'A2.'.$a2_ext;
        $dest = 'upload/B'.(string)$max_number.'E'.(string)$pic_index.'A2.'.$a2_ext;
         move_uploaded_file($file, $dest);
        }
      else {
      }
        $A3_pic_name = 'E'.$pic_index.'A3_file';
        if ($_FILES[$A3_pic_name]['error'] === UPLOAD_ERR_OK){
        $file = $_FILES[$A3_pic_name]['tmp_name'];
        $a3_ext = end(explode('.', $_FILES[$A3_pic_name]['name']));
        $a3_name = 'B'.(string)$max_number.'E'.(string)$pic_index.'A3.'.$a3_ext;
        $dest = 'upload/B'.(string)$max_number.'E'.(string)$pic_index.'A3.'.$a3_ext;
         move_uploaded_file($file, $dest);
        }
      else {
      }
        $A4_pic_name = 'E'.$pic_index.'A4_file';
        if ($_FILES[$A4_pic_name]['error'] === UPLOAD_ERR_OK){
        $file = $_FILES[$A4_pic_name]['tmp_name'];
        $a4_ext = end(explode('.', $_FILES[$A4_pic_name]['name']));
        $a4_name = 'B'.(string)$max_number.'E'.(string)$pic_index.'A4.'.$a4_ext;
        $dest = 'upload/B'.(string)$max_number.'E'.(string)$pic_index.'A4.'.$a4_ext;
         move_uploaded_file($file, $dest);
        }
      else {
      }

        //-----file block-----


        $ca_index = $key;
        $ca_index = $ca_index+1;
        $CA_NAME = 'answer'.$ca_index;
        $CA=$_POST[$CA_NAME];

        $sql_m = "SELECT MAX(question_no) AS max FROM Question";
        $result_m = mysqli_fetch_object($db->query($sql_m));

        $max_question_no = $result_m->max;
        $max_question_no = $max_question_no+1;

        $sql4 = "INSERT INTO Question (book_id,question_no,QA,type,single_or_multi,CA,title,Content,picture_ext) VALUES ('$max_number','$ca_index','Q','WORD','SINGLE','$CA[0]','$exercise_title[$key]','$exercise_content[$key]','$q1_name')";
        $db->query($sql4);
        $sql4 = "INSERT INTO Question (book_id,question_no,QA,title,Content,picture_ext) VALUES ('$max_number','$ca_index','A1','$exercise_title[$key]','$A1[$key]','$a1_name')";
        $db->query($sql4);
        $sql4 = "INSERT INTO Question (book_id,question_no,QA,title,Content,picture_ext) VALUES ('$max_number','$ca_index','A2','$exercise_title[$key]','$A2[$key]','$a2_name')";
        $db->query($sql4);
        $sql4 = "INSERT INTO Question (book_id,question_no,QA,title,Content,picture_ext) VALUES ('$max_number','$ca_index','A3','$exercise_title[$key]','$A3[$key]','$a3_name')";
        $db->query($sql4);
        $sql4 = "INSERT INTO Question (book_id,question_no,QA,title,Content,picture_ext) VALUES ('$max_number','$ca_index','A4','$exercise_title[$key]','$A4[$key]','$a4_name')";
        $db->query($sql4);
      }
  }

  //INSERT Audio DataTable
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
    	   # 將檔案移至指定位置
    	   move_uploaded_file($file, $audio_dest);
         //echo $max_number.'.'.$audio_index.'.'.$audio_title[$key].'.'.$audio_output_name;

    	  }
    	else {
    	}
      $sql = "INSERT INTO Audio (book_id, audio_no, title, audio_ext) VALUES ('$max_number','$audio_index','$audio_title[$key]','$audio_output_name')";
      $db->query($sql);
    }
  }

  echo "<script>alert('編書成功'); location.href = 'BookList.php';</script>";


?>