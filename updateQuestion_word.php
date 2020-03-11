<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("connects.php");

  $title = $_POST['Q1_title'];
	$q1 = $_POST['Q1'];
	$a1 = $_POST['A1'];
	$a2 = $_POST['A2'];
	$a3 = $_POST['A3'];
	$a4 = $_POST['A4'];
	$CA = $_POST['answer'];
  $single_or_multi = $_POST['single_or_multi'];
	$classification = $_POST['classification'];
  $CA = implode (",", $CA);

  $sql = "SELECT MAX(question_no) AS max FROM Question";
  $result = mysqli_fetch_object($db->query($sql));
  $max_number = $result->max;
  $max_number = $max_number+1;

  //edit block
  if(isset($_POST['edit_tag'])&&isset($_POST['question_number']))
  {
  	$tag = $_POST['edit_tag'];
  	$question_number = $_POST['question_number'];
  	$max_number = $question_number;
  }

  //-----DeBUG BLOCK-----
  /*
  echo $max_number.'<br />';
  echo $title.'<br />';
  echo $q1.'<br />';
  echo $a1.'<br />';
  echo $a2.'<br />';
  echo $a3.'<br />';
  echo $a4.'<br />';
  echo $single_or_multi.'<br />';
  print_r($classification);
  print_r($CA);
  */




  //----------PICTURE BLOCK----------
  if ($_FILES['Q1_file']['error'] === UPLOAD_ERR_OK){
    $qi_dest = "";
    $file = $_FILES['Q1_file']['tmp_name'];
    $q1_ext = end(explode('.', $_FILES['Q1_file']['name']));
    $dest = 'upload/Q'.(string)$max_number.'Q1.'.$q1_ext;
    move_uploaded_file($file, $dest);
    $q1_dest = 'Q'.(string)$max_number.'Q1.'.$q1_ext;
  }
	else {
    $q1_dest = "";
	}

  if ($_FILES['Q1_video_file']['error'] === UPLOAD_ERR_OK){
    $qi_video_dest = "";
    $file = $_FILES['Q1_video_file']['tmp_name'];
    $q1_video_ext = end(explode('.', $_FILES['Q1_video_file']['name']));
    $dest_video = 'upload/Q'.(string)$max_number.'Q1.'.$q1_video_ext;
    move_uploaded_file($file, $dest_video);
    $q1_video_dest = 'Q'.(string)$max_number.'Q1.'.$q1_video_ext;
  }
        else {
    $q1_video_dest = "";
        }


  if ($_FILES['a1_file']['error'] === UPLOAD_ERR_OK){
    $a1_dest = "";
  	$file = $_FILES['a1_file']['tmp_name'];
  	$a1_ext = end(explode('.', $_FILES['a1_file']['name']));
  	$dest = 'upload/Q'.(string)$max_number.'A1.'.$a1_ext;
  	move_uploaded_file($file, $dest);
    $a1_dest = 'Q'.(string)$max_number.'A1.'.$a1_ext;
	}
  else {
    $a1_dest = "";
  }

  if ($_FILES['a2_file']['error'] === UPLOAD_ERR_OK){
    $a2_dest = "";
    $file = $_FILES['a2_file']['tmp_name'];
	  $a2_ext = end(explode('.', $_FILES['a2_file']['name']));
	  $dest = 'upload/Q'.(string)$max_number.'A2.'.$a2_ext;
	  move_uploaded_file($file, $dest);
    $a2_dest = 'Q'.(string)$max_number.'A2.'.$a2_ext;
	}
  else {
    $a2_dest = "";
  }

  if ($_FILES['a3_file']['error'] === UPLOAD_ERR_OK){
    $a3_dest = "";
  	$file = $_FILES['a3_file']['tmp_name'];
  	$a3_ext = end(explode('.', $_FILES['a3_file']['name']));
  	$dest = 'upload/Q'.(string)$max_number.'A3.'.$a3_ext;
  	move_uploaded_file($file, $dest);
    $a3_dest = 'Q'.(string)$max_number.'A3.'.$a3_ext;
	}
  else {
    $a3_dest = "";
  }

  if ($_FILES['a4_file']['error'] === UPLOAD_ERR_OK){
    $a4_dest = "";
  	$file = $_FILES['a4_file']['tmp_name'];
  	$a4_ext = end(explode('.', $_FILES['a4_file']['name']));
  	$dest = 'upload/Q'.(string)$max_number.'A4.'.$a4_ext;
  	move_uploaded_file($file, $dest);
    $a4_dest = 'Q'.(string)$max_number.'A4.'.$a4_ext;
	}
  else {
    $a4_dest = "";
  }
  //----------PICTURE BLOCK----------

	//---------WMF Covert to JPG--------------
	include("convert_wmf.php");
  if(isset($q1_ext))
  {
    if($q1_ext=="wmf")
  	{
  		$name = 'Q'.(string)$max_number.'Q1';
  		convert_wmf($name);
  		$q1_ext="jpg";
      $q1_dest = 'Q'.(string)$max_number.'Q1.'.$q1_ext;
  	}
  }

  if(isset($a1_ext))
  {
    if($a1_ext=="wmf")
  	{
  		$name = 'Q'.(string)$max_number.'A1';
  		convert_wmf($name);
  		$a1_ext="jpg";
      $a1_dest = 'Q'.(string)$max_number.'A1.'.$a1_ext;
  	}
  }

  if(isset($a2_ext))
  {
    if($a2_ext=="wmf")
  	{
  		$name = 'Q'.(string)$max_number.'A2';
  		convert_wmf($name);
  		$a2_ext="jpg";
      $a2_dest = 'Q'.(string)$max_number.'A2.'.$a2_ext;
  	}
  }

  if(isset($a3_ext))
  {
    if($a3_ext=="wmf")
  	{
  		$name = 'Q'.(string)$max_number.'A3';
  		convert_wmf($name);
  		$a3_ext="jpg";
      $a3_dest = 'Q'.(string)$max_number.'A3.'.$a3_ext;
  	}
  }

  if(isset($q4_ext))
  {
    if($a4_ext=="wmf")
  	{
  		$name = 'Q'.(string)$max_number.'A4';
  		convert_wmf($name);
  		$a4_ext="jpg";
      $a4_dest = 'Q'.(string)$max_number.'A4.'.$a4_ext;
  	}
  }

	//---------WMF Covert to JPG--------------



  //----------AUDIO BLOCK----------
	if ($_FILES['audio_file']['error'] === UPLOAD_ERR_OK){
  	  $file = $_FILES['audio_file']['tmp_name'];
  	  $audio_dest = 'upload/Q'.(string)$max_number.'.mp3';
  	  # 將檔案移至指定位置
  	  move_uploaded_file($file, $audio_dest);
	  }
	else {
		$audio_dest = '';
	}

	if ($_FILES['audio_A1']['error'] === UPLOAD_ERR_OK){
  	  $file = $_FILES['audio_A1']['tmp_name'];
  	  $audio_A1 = 'upload/Q'.(string)$max_number.'A1.mp3';
	    # 將檔案移至指定位置
	    move_uploaded_file($file, $audio_A1);
	  }
	else {
		$audio_A1 = '';
	}

	if ($_FILES['audio_A2']['error'] === UPLOAD_ERR_OK){
	   $file = $_FILES['audio_A2']['tmp_name'];
	   $audio_A2 = 'upload/Q'.(string)$max_number.'A2.mp3';
	   # 將檔案移至指定位置
	   move_uploaded_file($file, $audio_A2);
	  }
	else {
		 $audio_A2 = '';
	}

	if ($_FILES['audio_A3']['error'] === UPLOAD_ERR_OK){
	   $file = $_FILES['audio_A3']['tmp_name'];
	   $audio_A3 = 'upload/Q'.(string)$max_number.'A3.mp3';
	   # 將檔案移至指定位置
	   move_uploaded_file($file, $audio_A3);
	  }
	else {
		 $audio_A3 = '';
	}

	if ($_FILES['audio_A4']['error'] === UPLOAD_ERR_OK){
	   $file = $_FILES['audio_A4']['tmp_name'];
	   $audio_A4 = 'upload/Q'.(string)$max_number.'A4.mp3';
	   # 將檔案移至指定位置
	   move_uploaded_file($file, $audio_A4);
	  }
	else {
		$audio_A4 = '';
	}
  //----------AUDIO BLOCK----------


	// if edit
	if(isset($_POST['edit_tag'])&&isset($_POST['question_number']))
	{
		$sql2 = "UPDATE QuestionList SET CA='$CA', Content='$q1' WHERE No = '$question_number' AND QA='Q' ";
		$db->query($sql2);

		$sql2 = "UPDATE QuestionList SET Content='$a1' WHERE No = '$question_number' AND QA='A1' ";
		$db->query($sql2);

		$sql2 = "UPDATE QuestionList SET Content='$a2' WHERE No = '$question_number' AND QA='A2' ";
		$db->query($sql2);

		$sql2 = "UPDATE QuestionList SET Content='$a3' WHERE No = '$question_number' AND QA='A3' ";
		$db->query($sql2);

		$sql2 = "UPDATE QuestionList SET Content='$a4' WHERE No = '$question_number' AND QA='A4' ";
		$db->query($sql2);
		$db->close();
		echo "<script>alert('編輯成功'); location.href = 'QuestionList.php';</script>";

	}

	else // if not edit , means insert.
	{
		$sql2 = "INSERT INTO Question (question_no, QA, type, single_or_multi, CA, title, Content, picture_ext, audio, classification, video) VALUES ('$max_number', 'Q', 'WORD', '$single_or_multi', '$CA', '$title', '$q1', '$q1_dest', '$audio_dest', '$classification[0]', '$q1_video_dest')";
		$db->query($sql2);

		$sql2 = "INSERT INTO Question (question_no, QA, Content, picture_ext, audio, classification) VALUES ('$max_number', 'A1', '$a1', '$a1_dest', '$audio_A1', '0')";
		$db->query($sql2);

		$sql2 = "INSERT INTO Question (question_no, QA, Content, picture_ext, audio, classification) VALUES ('$max_number', 'A2', '$a2', '$a2_dest', '$audio_A2', '0')";
		$db->query($sql2);

		$sql2 = "INSERT INTO Question (question_no, QA, Content, picture_ext, audio, classification) VALUES ('$max_number', 'A3', '$a3', '$a3_dest', '$audio_A3', '0')";
		$db->query($sql2);

		$sql2 = "INSERT INTO Question (question_no, QA, Content, picture_ext, audio, classification) VALUES ('$max_number', 'A4', '$a4', '$a4_dest', '$audio_A4', '0')";
		$db->query($sql2);
		$db->close();
		echo "<script>alert('出題成功'); location.href = 'MakeQuestion.php';</script>";
	}

?>
