<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("connects.php");
  $question_number = $_POST['question_number'];
	$title = $_POST['Q1_title'];
	$q1 = $_POST['Q1'];
	$a1 = $_POST['A1'];
	$a2 = $_POST['A2'];
	$a3 = $_POST['A3'];
	$a4 = $_POST['A4'];
	$CA = $_POST['answer'];
  $CA = implode (",", $CA);
	$classification = $_POST['classification'];
  $single_or_multi = $_POST['single_or_multi'];

	echo $title;

  echo $question_number.'<br />'.$q1.'<br />'.$a1.'<br />'.$a2.'<br />'.$a3.'<br />'.$a4.'<br />';
  print_r($CA);
  print_r($classification);
  echo $single_or_multi;


  //UPDATE Q1 DB
  $sql = "UPDATE Question SET CA='$CA', single_or_multi='$single_or_multi',title='$title', Content='$q1', classification=$classification[0] WHERE question_no='$question_number' AND QA='Q' ";
  $db->query($sql);

  //UPDATE A1 DB
  $sql = "UPDATE Question SET Content='$a1' WHERE question_no='$question_number' AND QA='A1' ";
  $db->query($sql);

  //UPDATE A2 DB
  $sql = "UPDATE Question SET Content='$a2' WHERE question_no='$question_number' AND QA='A2' ";
  $db->query($sql);

  //UPDATE A3 DB
  $sql = "UPDATE Question SET Content='$a3' WHERE question_no='$question_number' AND QA='A3' ";
  $db->query($sql);

  //UPDATE A4 DB
  $sql = "UPDATE Question SET Content='$a4' WHERE question_no='$question_number' AND QA='A4' ";
  $db->query($sql);

  include("convert_wmf.php");

  //Q1 PICTURE
  if ($_FILES['Q1_file']['error'] === UPLOAD_ERR_OK){

    //CHECK IF HAVE OLD IMG
    $sql = "SELECT picture_ext FROM Question WHERE question_no = '$question_number' AND QA='Q'";
    $result = mysqli_fetch_object($db->query($sql));
    $q1_old_ext = $result->picture_ext;
    // IF HAVE OLD IMG, DELETE
    if(strlen($q1_old_ext)>0)
    {
      $q1_old_name = 'upload/'.$q1_old_ext;
      unlink($q1_old_name);
    }

    $file = $_FILES['Q1_file']['tmp_name'];
    $q1_ext = end(explode('.', $_FILES['Q1_file']['name']));
    $dest = 'upload/Q'.(string)$question_number.'Q1.'.$q1_ext;
    move_uploaded_file($file, $dest);

    if($q1_ext=="wmf")
  	{
  		$name = 'Q'.(string)$question_number.'Q1';
  		convert_wmf($name);
  		$q1_ext="jpg";
      unlink('upload/Q'.$question_number.'Q1.wmf');
  	}

		$q1_output = 'Q'.(string)$question_number.'Q1.'.$q1_ext;

    //UPDATE EXT
    $sql = "UPDATE Question SET picture_ext='$q1_output' WHERE question_no='$question_number' AND QA='Q' ";
    $db->query($sql);
  }


  //A1 PICTURE
  if ($_FILES['A1_file']['error'] === UPLOAD_ERR_OK){

    //CHECK IF HAVE OLD IMG
    $sql = "SELECT picture_ext FROM Question WHERE question_no = '$question_number' AND QA='A1'";
    $result = mysqli_fetch_object($db->query($sql));
    $a1_old_ext = $result->picture_ext;
    // IF HAVE OLD IMG, DELETE
    if(strlen($a1_old_ext)>0)
    {
      $a1_old_name = 'upload/'.$a1_old_ext;
      unlink($a1_old_name);
    }

    $file = $_FILES['A1_file']['tmp_name'];
    $a1_ext = end(explode('.', $_FILES['A1_file']['name']));
    $dest = 'upload/Q'.(string)$question_number.'A1.'.$a1_ext;
    move_uploaded_file($file, $dest);

    if($a1_ext=="wmf")
  	{
  		$name = 'Q'.(string)$question_number.'A1';
  		convert_wmf($name);
  		$a1_ext="jpg";
      unlink('upload/Q'.$question_number.'A1.wmf');
  	}

		$a1_output = 'Q'.(string)$question_number.'A1.'.$a1_ext;

    //UPDATE EXT
    $sql = "UPDATE Question SET picture_ext='$a1_output' WHERE question_no='$question_number' AND QA='A1' ";
    $db->query($sql);
  }

  //A2 PICTURE
  if ($_FILES['A2_file']['error'] === UPLOAD_ERR_OK){

    //CHECK IF HAVE OLD IMG
    $sql = "SELECT picture_ext FROM Question WHERE question_no = '$question_number' AND QA='A2'";
    $result = mysqli_fetch_object($db->query($sql));
    $a2_old_ext = $result->picture_ext;
    // IF HAVE OLD IMG, DELETE
    if(strlen($a2_old_ext)>0)
    {
      $a2_old_name = 'upload/'.$a2_old_ext;
      unlink($a2_old_name);
    }

    $file = $_FILES['A2_file']['tmp_name'];
    $a2_ext = end(explode('.', $_FILES['A2_file']['name']));
    $dest = 'upload/Q'.(string)$question_number.'A2.'.$a2_ext;
    move_uploaded_file($file, $dest);

    if($a2_ext=="wmf")
  	{
  		$name = 'Q'.(string)$question_number.'A2';
  		convert_wmf($name);
  		$a2_ext="jpg";
      unlink('upload/Q'.$question_number.'A2.wmf');
  	}

		$q2_output = 'Q'.(string)$question_number.'A2.'.$a2_ext;

    //UPDATE EXT
    $sql = "UPDATE Question SET picture_ext='$q2_output' WHERE question_no='$question_number' AND QA='A2' ";
    $db->query($sql);
  }

  //A3 PICTURE
  if ($_FILES['A3_file']['error'] === UPLOAD_ERR_OK){

    //CHECK IF HAVE OLD IMG
    $sql = "SELECT picture_ext FROM Question WHERE question_no = '$question_number' AND QA='A3'";
    $result = mysqli_fetch_object($db->query($sql));
    $a3_old_ext = $result->picture_ext;
    // IF HAVE OLD IMG, DELETE
    if(strlen($a3_old_ext)>0)
    {
      $a3_old_name = 'upload/'.$a3_old_ext;
      unlink($a3_old_name);
    }

    $file = $_FILES['A3_file']['tmp_name'];
    $a3_ext = end(explode('.', $_FILES['A3_file']['name']));
    $dest = 'upload/Q'.(string)$question_number.'A3.'.$a3_ext;
    move_uploaded_file($file, $dest);

    if($a3_ext=="wmf")
  	{
  		$name = 'Q'.(string)$question_number.'A3';
  		convert_wmf($name);
  		$a3_ext="jpg";
      unlink('upload/Q'.$question_number.'A3.wmf');
  	}

		$a3_output = 'Q'.(string)$question_number.'A3.'.$a3_ext;

    //UPDATE EXT
    $sql = "UPDATE Question SET picture_ext='$a3_output' WHERE question_no='$question_number' AND QA='A3' ";
    $db->query($sql);
  }

  //A4 PICTURE
  if ($_FILES['A4_file']['error'] === UPLOAD_ERR_OK){

    //CHECK IF HAVE OLD IMG
    $sql = "SELECT picture_ext FROM Question WHERE question_no = '$question_number' AND QA='A4'";
    $result = mysqli_fetch_object($db->query($sql));
    $a4_old_ext = $result->picture_ext;
    // IF HAVE OLD IMG, DELETE
    if(strlen($a4_old_ext)>0)
    {
      $a4_old_name = 'upload/'.$a4_old_ext;
      unlink($a4_old_name);
    }

    $file = $_FILES['A4_file']['tmp_name'];
    $a4_ext = end(explode('.', $_FILES['A4_file']['name']));
    $dest = 'upload/Q'.(string)$question_number.'A4.'.$a4_ext;
    move_uploaded_file($file, $dest);

    if($a4_ext=="wmf")
  	{
  		$name = 'Q'.(string)$question_number.'A4';
  		convert_wmf($name);
  		$a4_ext="jpg";
      unlink('upload/Q'.$question_number.'A4.wmf');
  	}

		$a4_output='Q'.(string)$question_number.'A4.'.$a4_ext;

    //UPDATE EXT
    $sql = "UPDATE Question SET picture_ext='$a4_output' WHERE question_no='$question_number' AND QA='A4' ";
    $db->query($sql);
  }


  //-----------------AUDIO BLOCK-------------------
  if ($_FILES['audio_file']['error'] === UPLOAD_ERR_OK){

    //CHECK IF HAVE OLD AUDIO
    $sql = "SELECT audio FROM Question WHERE question_no = '$question_number' AND QA='Q'";
    $result = mysqli_fetch_object($db->query($sql));
    $q1_old_audio = $result->audio;

    if(strlen($q1_old_audio)>0)
    {
      unlink($q1_old_audio);
    }

	  $file = $_FILES['audio_file']['tmp_name'];
	  $audio_dest = 'upload/Q'.(string)$question_number.'.mp3';
	  move_uploaded_file($file, $audio_dest);

    //UPDATE AUDIO
    $sql = "UPDATE Question SET audio='$audio_dest' WHERE question_no='$question_number' AND QA='Q' ";
    $db->query($sql);
	 }

    if ($_FILES['audio_A1']['error'] === UPLOAD_ERR_OK){

      //CHECK IF HAVE OLD AUDIO
      $sql = "SELECT audio FROM Question WHERE question_no = '$question_number' AND QA='A1'";
      $result = mysqli_fetch_object($db->query($sql));
      $a1_old_audio = $result->audio;

      if(strlen($a1_old_audio)>0)
      {
        unlink($a1_old_audio);
      }

  	  $file = $_FILES['audio_A1']['tmp_name'];
  	  $audio_dest = 'upload/Q'.(string)$question_number.'A1.mp3';
  	  move_uploaded_file($file, $audio_dest);

      //UPDATE AUDIO
      $sql = "UPDATE Question SET audio='$audio_dest' WHERE question_no='$question_number' AND QA='A1' ";
      $db->query($sql);
  	 }

     if ($_FILES['audio_A2']['error'] === UPLOAD_ERR_OK){

       //CHECK IF HAVE OLD AUDIO
       $sql = "SELECT audio FROM Question WHERE question_no = '$question_number' AND QA='A2'";
       $result = mysqli_fetch_object($db->query($sql));
       $a2_old_audio = $result->audio;

       if(strlen($a2_old_audio)>0)
       {
         unlink($a2_old_audio);
       }

   	   $file = $_FILES['audio_A2']['tmp_name'];
   	   $audio_dest = 'upload/Q'.(string)$question_number.'A2.mp3';
   	   move_uploaded_file($file, $audio_dest);

       //UPDATE AUDIO
       $sql = "UPDATE Question SET audio='$audio_dest' WHERE question_no='$question_number' AND QA='A2' ";
       $db->query($sql);
   	 }

     if ($_FILES['audio_A3']['error'] === UPLOAD_ERR_OK){

       //CHECK IF HAVE OLD AUDIO
       $sql = "SELECT audio FROM Question WHERE question_no = '$question_number' AND QA='A3'";
       $result = mysqli_fetch_object($db->query($sql));
       $a3_old_audio = $result->audio;

       if(strlen($a3_old_audio)>0)
       {
         unlink($a3_old_audio);
       }

   	   $file = $_FILES['audio_A3']['tmp_name'];
   	   $audio_dest = 'upload/Q'.(string)$question_number.'A3.mp3';
   	   move_uploaded_file($file, $audio_dest);

       //UPDATE AUDIO
       $sql = "UPDATE Question SET audio='$audio_dest' WHERE question_no='$question_number' AND QA='A3' ";
       $db->query($sql);
   	 }

     if ($_FILES['audio_A4']['error'] === UPLOAD_ERR_OK){

       //CHECK IF HAVE OLD AUDIO
       $sql = "SELECT audio FROM Question WHERE question_no = '$question_number' AND QA='A4'";
       $result = mysqli_fetch_object($db->query($sql));
       $a4_old_audio = $result->audio;

       if(strlen($a4_old_audio)>0)
       {
         unlink($a4_old_audio);
       }

   	   $file = $_FILES['audio_A4']['tmp_name'];
   	   $audio_dest = 'upload/Q'.(string)$question_number.'A4.mp3';
   	   move_uploaded_file($file, $audio_dest);

       //UPDATE AUDIO
       $sql = "UPDATE Question SET audio='$audio_dest' WHERE question_no='$question_number' AND QA='A4' ";
       $db->query($sql);
   	 }
/*
		 echo "<script>alert('編輯完成'); location.href = 'QuestionList.php';</script>";
*/

?>
