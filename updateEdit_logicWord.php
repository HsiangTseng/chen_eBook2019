<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("connects.php");

  $question_number = $_POST['question_number'];

  $Answer = $_POST['Answer'];
  $Answer = implode ("^&", $Answer);

  $Q1 = $_POST['Q1'];
  $Title = $_POST['Q1_title'];
  $CA = $_POST['CA'];
  $classification = $_POST['classification'];

  $sql = "SELECT * FROM Question WHERE question_no = '$question_number' AND QA = 'Q'";
  $result = mysqli_fetch_object($db->query($sql));
  $KeyboardNo = $result->KeyboardNo;

  /*echo 'K-'.$KeyboardNo.'<BR />';
  echo 'Q-'.$question_number.'<br />';
  echo 'T-'.$Title.'<br />';
  echo 'Q-'.$Q1.'<BR />';
  echo 'A-'.$Answer.'<br />';
  echo 'CA-'.$CA.'<BR />';
  echo 'class-'.$classification[0].'<br />';*/

	//---------------Question File------------------
	if ($_FILES['Q1_file']['error'] === UPLOAD_ERR_OK){

	$old_ext = $result->picture_ext;
	//IF HAVE OLD IMG, DELETE IT
	if(strlen($old_ext)>0)
	{
		$old_img_name = 'upload/'.$old_ext;
		unlink($old_img_name);
	}

	$file = $_FILES['Q1_file']['tmp_name'];
	$q1_ext = end(explode('.', $_FILES['Q1_file']['name']));
	$dest = 'upload/Q'.(string)$question_number.'Q1.'.$q1_ext;
	move_uploaded_file($file, $dest);
  $q1_img_output = 'Q'.(string)$question_number.'Q1.'.$q1_ext;

	//update ext
	$sqlQuestion = "UPDATE Question SET picture_ext='$q1_img_output' WHERE question_no='$question_number'";
	$db->query($sqlQuestion);

	}
	else {
	}

	if ($_FILES['audio_file']['error'] === UPLOAD_ERR_OK){
		$old_audio = $result->audio;

		//IF HAVE OLD AUDIO, DELETE
		if(strlen($old_audio)>0)
		{
			unlink($old_audio);
		}

		$file = $_FILES['audio_file']['tmp_name'];
		$audio_dest = 'upload/Q'.(string)$question_number.'.mp3';
		# 將檔案移至指定位置
		move_uploaded_file($file, $audio_dest);

		//update audio
		$sqlQuestion = "UPDATE Question SET audio='$audio_dest' WHERE question_no='$question_number'";
		$db->query($sqlQuestion);
		}
	else {
	}

	if ($_FILES['video_file']['error'] === UPLOAD_ERR_OK){
		$old_video = $result->video;

		//IF HAVE OLD VIDEO, DELETE
		if(strlen($old_video)>0)
		{
      $old_video_name = 'upload/'.$old_video;
			unlink($old_video_name);
		}

		$file = $_FILES['video_file']['tmp_name'];

		$video_ext = end(explode('.', $_FILES['video_file']['name']));
		$video_dest = 'upload/Q'.(string)$question_number.'Q1.'.$video_ext;
		# 將檔案移至指定位置
		move_uploaded_file($file, $video_dest);

    $q1_video_output = 'Q'.(string)$question_number.'Q1.'.$video_ext;

		//update audio
		$sqlQuestion = "UPDATE Question SET video='$q1_video_output' WHERE question_no='$question_number'";
		$db->query($sqlQuestion);
		}
	else {
		$video_dest = "";
	}
	//---------------Question File------------------

	$audio_ext_number = substr_count($Answer,"^&");
	$audio_ext_list = "N";
	if($audio_ext_number>0)
	{
		for($i=0;$i<$audio_ext_number;$i++)
		{
			$audio_ext_list = $audio_ext_list."-N";
		}
	}
	//echo $audio_ext_list;

  //UPDATE QUESTIONLIST DB
  $sqlQuestion = "UPDATE Question SET CA = '$CA', title='$Title', Content = '$Q1', classification='$classification[0]' WHERE question_no='$question_number'";
  $db->query($sqlQuestion);

  //UPDATE KEYBOARD DB
  $sqlKeyboard = "UPDATE Keyboard SET wordQuestion = '$Answer', audio_ext='$audio_ext_list' WHERE KeyboardNo='$KeyboardNo'";
  $db->query($sqlKeyboard);


  echo "<script>alert('編輯完成'); location.href = 'QuestionList.php';</script>";


?>
