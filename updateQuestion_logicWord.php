<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("connects.php");


	$Answer = $_POST['Answer'];
  $Answer = implode ("^&", $Answer);

  $Q1 = $_POST['Q1'];
  $CA = $_POST['CA'];
	$classification = $_POST['classification'];
	$Title = $_POST['Q1_title'];

  $sql = "SELECT MAX(KeyboardNo) AS max FROM Keyboard";
  $result = mysqli_fetch_object($db->query($sql));
  $KeyboardNumber = $result->max;
  $KeyboardNumber = $KeyboardNumber+1;
  //get the new question's number


	$sql = "SELECT MAX(question_no) AS max FROM Question";
	$result = mysqli_fetch_object($db->query($sql));
	$max_number = $result->max;
	$max_number = $max_number+1;



	$answer_count = substr_count($Answer,"^&");

	$audio_ext_list = "N";
	if($answer_count>=1)
	{
		for($i=0;$i<$answer_count;$i++)
		$audio_ext_list = $audio_ext_list.'-N';
	}
	/*echo 'K-'.$KeyboardNumber.'<BR />';
	echo 'Q-'.$max_number.'<br />';
	echo 'T-'.$Title.'<br />';
	echo 'Q-'.$Q1.'<BR />';
	echo 'A-'.$Answer.'<br />';
	echo 'CA-'.$CA.'<BR />';
	echo 'class-'.$classification[0].'<br />';
	echo $audio_ext_list;*/

	//---------------Question File------------------
	if ($_FILES['Q1_file']['error'] === UPLOAD_ERR_OK){
	$file = $_FILES['Q1_file']['tmp_name'];
	$q1_ext = end(explode('.', $_FILES['Q1_file']['name']));
	$dest = 'upload/Q'.(string)$max_number.'Q1.'.$q1_ext;
	move_uploaded_file($file, $dest);
	$q1_img_output = 'Q'.(string)$max_number.'Q1.'.$q1_ext;
	}
	else {
		$q1_img_output = '';
	}

	if ($_FILES['audio_file']['error'] === UPLOAD_ERR_OK){

		$file = $_FILES['audio_file']['tmp_name'];
		//$a1_ext = end(explode('.', $_FILES['audio_file']['name']));
		$audio_dest = 'upload/Q'.(string)$max_number.'.mp3';
		 move_uploaded_file($file, $audio_dest);
		}
	else {
		$audio_dest = '';
	}

	if ($_FILES['video_file']['error'] === UPLOAD_ERR_OK){
	  $file = $_FILES['video_file']['tmp_name'];

	  $video_ext = end(explode('.', $_FILES['video_file']['name']));
	  $video_dest = 'upload/Q'.(string)$max_number.'Q1.'.$video_ext;
	  move_uploaded_file($file, $video_dest);
		$q1_video_output = 'Q'.(string)$max_number.'Q1.'.$video_ext;
	  }
	else {
		$q1_video_output = "";
	}
	//---------------Question File------------------

	$sqlKeyboard = "INSERT INTO Keyboard (KeyboardNo, type, wordQuestion, audio_ext) VALUES ('$KeyboardNumber', 'Logic', '$Answer', '$audio_ext_list')";
	$db->query($sqlKeyboard);

	$sqlQuestion = "INSERT INTO Question (question_no, QA, CA, title, Content, type, single_or_multi, KeyboardNo, classification, picture_ext, audio, video) VALUES ('$max_number', 'Q', '$CA', '$Title', '$Q1', 'LWORD', 'MULTI', '$KeyboardNumber', '$classification[0]', '$q1_img_output', '$audio_dest', '$q1_video_output')";
	$db->query($sqlQuestion);
	$db->close();

	echo "<script>alert('出題成功'); location.href = 'MakeQuestion.php';</script>";


?>
