<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("connects.php");

  $question_number = $_POST['question_number'];


  $Q1 = $_POST['Q1'];
  $CA = $_POST['CA'];
  $Title = $_POST['Q1_title'];
  $classification = $_POST['classification'];
  $picture_number = $_POST['picture_number'];

  $sql = "SELECT * FROM Question WHERE question_no = '$question_number' AND QA = 'Q'";
  $result = mysqli_fetch_object($db->query($sql));
  $KeyboardNo = $result->KeyboardNo;

  //UPDATE QUESTIONLIST DB
  $sqlQuestion = "UPDATE Question SET CA = '$CA', Content = '$Q1', title='$Title', classification='$classification[0]' WHERE question_no='$question_number'";
  $db->query($sqlQuestion);

	//---------------Question File------------------
	$sql = "SELECT * FROM Question WHERE question_no = '$question_number' AND QA = 'Q'";
  $result = mysqli_fetch_object($db->query($sql));
  $KeyboardNo = $result->KeyboardNo;


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


  $sql = "SELECT * FROM Keyboard WHERE KeyboardNo = '$KeyboardNo'";
  $result = mysqli_fetch_object($db->query($sql));
  $old_ext = $result->ext;
  $old_ext = explode("-", $old_ext);
  $old_count = count($old_ext);
  include("convert_wmf.php");
  for($i = 1 ; $i <= $picture_number ; $i++)
  {
    $name = 'A'.$i.'_file';
    $n = 'A'.$i;
    if ($_FILES[$name]['error'] === UPLOAD_ERR_OK){
    //CHECK IF THERE ARE OLD IMG
    $array_index = $i-1;

    //IF OLD IMG EXIST
    if(isset($old_ext[$array_index]))
    {
      // HAVE OLD FILE, DELETE
      $old_file_name = 'upload/K'.$KeyboardNo.'A'.$i.'.'.$old_ext[$array_index];
      unlink($old_file_name);

      //UPLOAD
      $file = $_FILES[$name]['tmp_name'];
      $new_ext = end(explode('.', $_FILES[$name]['name']));
      $dest = 'upload/K'.(string)$KeyboardNo.$n.'.'.$new_ext;
      move_uploaded_file($file, $dest);

      if($new_ext=="wmf")
    	{
    		$name = 'K'.(string)$KeyboardNo.$n;
    		convert_wmf($name);
    		$new_ext="jpg";
        unlink('upload/K'.(string)$KeyboardNo.$n.'.wmf');
    	}

      //CHANGE THE EXT ARRAY
      $old_ext[$array_index] = $new_ext;
    }
    else
    {
      //UPLOAD
      $file = $_FILES[$name]['tmp_name'];
      $new_ext = end(explode('.', $_FILES[$name]['name']));
      $dest = 'upload/K'.(string)$KeyboardNo.$n.'.'.$new_ext;
      move_uploaded_file($file, $dest);

      if($new_ext=="wmf")
    	{
    		$name = 'K'.(string)$KeyboardNo.$n;
    		convert_wmf($name);
    		$new_ext="jpg";
        unlink('upload/K'.(string)$KeyboardNo.$n.'.wmf');
    	}

      //PUSH IN EXT ARRAY
      array_push($old_ext, $new_ext);
    }

    }
  }

  //IF OLD FILE MORE THAN NEW FILE
  if($old_count>$picture_number)
  {
    $delete_number = $old_count-$picture_number;
    //echo $delete_number;
    for($j = $delete_number ; $j>0 ;$j--)
    { //print_r($old_ext);
      $file_index = $j+$picture_number;
      $array_index = $picture_number-1+$j;
      $old_file_name = 'upload/K'.$KeyboardNo.'A'.$file_index.'.'.$old_ext[$array_index];
      //echo $old_file_name.'<br />';
      unlink($old_file_name);
      unset($old_ext[$array_index]);
    }
  }

	$final_ext = implode("-",$old_ext);

	//----------------------Audio Block-------------------
	$audio_ext = $result->audio_ext;
  $audio_ext = explode("-", $audio_ext);
	for($i=1;$i<=$picture_number;$i++)
	{
			$audio_name = 'Audio'.$i.'_file';
			$audio_array_index = $i-1;
			if ($_FILES[$audio_name]['error'] === UPLOAD_ERR_OK){
					//IF OLD AUDIO EXIST
					if(isset($audio_ext[$audio_array_index]))
					{
						if($audio_ext[$audio_array_index]!="N")
						{
								// HAVE OLD FILE, DELETE
								$old_file_name = 'upload/K'.$KeyboardNo.'A'.$i.'.'.$audio_ext[$audio_array_index];
								unlink($old_file_name);

								//UPLOAD
								$file = $_FILES[$audio_name]['tmp_name'];
								$new_ext = end(explode('.', $_FILES[$audio_name]['name']));
								$dest = 'upload/K'.(string)$KeyboardNo.'A'.$i.'.'.$new_ext;
								move_uploaded_file($file, $dest);

								//CHANGE THE EXT ARRAY
								$audio_ext[$audio_array_index] = $new_ext;
							}
							else if ($audio_ext[$audio_array_index]=="N")
							{
								//UPLOAD
								$file = $_FILES[$audio_name]['tmp_name'];
								$new_ext = end(explode('.', $_FILES[$audio_name]['name']));
								$dest = 'upload/K'.(string)$KeyboardNo.'A'.$i.'.'.$new_ext;
								move_uploaded_file($file, $dest);

								//PUSH IN EXT ARRAY
								$audio_ext[$audio_array_index] = $new_ext;
							}
					}
					else if (!isset($audio_ext[$audio_array_index]))
					{
						//UPLOAD
						$file = $_FILES[$audio_name]['tmp_name'];
						$new_ext = end(explode('.', $_FILES[$audio_name]['name']));
						$dest = 'upload/K'.(string)$KeyboardNo.'A'.$i.'.'.$new_ext;
						move_uploaded_file($file, $dest);

						//PUSH IN EXT ARRAY
						$audio_ext[$audio_array_index] = $new_ext;
					}

			}
			else {//no upload
				if(!isset($audio_ext[$audio_array_index]))
				{
					$audio_ext[$audio_array_index] = "N";
				}
			}

	}

	//IF OLD FILE MORE THAN NEW FILE
	if($old_count>$picture_number)
	{
		$delete_number = $old_count-$picture_number;
		//echo $delete_number;
		for($j = $delete_number ; $j>0 ;$j--)
		{ //print_r($old_ext);
			$file_index = $j+$picture_number;
			$array_index = $picture_number-1+$j;
			$old_file_name = 'upload/K'.$KeyboardNo.'A'.$file_index.'.'.$audio_ext[$array_index];
			if($audio_ext[$array_index]!="N")
			{
				unlink($old_file_name);
			}
			unset($audio_ext[$array_index]);
		}
	}

	$final_audio_ext = implode("-",$audio_ext);


	//----------------------Audio Block-------------------


  //UPDATE KEYBOARD DB
  $sqlKeyboard = "UPDATE Keyboard SET ext = '$final_ext', audio_ext='$final_audio_ext' WHERE KeyboardNo='$KeyboardNo'";
  $db->query($sqlKeyboard);
  echo "<script>alert('編輯完成'); location.href = 'QuestionList.php';</script>";

?>
