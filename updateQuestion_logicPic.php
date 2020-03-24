<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
		include("connects.php");
    include("convert_wmf.php");

    $Q1 = $_POST['Q1'];
    $CA = $_POST['CA'];
		$Title = $_POST['Q1_title'];
    $number = $_POST['picture_number'];
		$classification = $_POST['classification'];

		$sql = "SELECT MAX(question_no) AS max FROM Question";
		$result = mysqli_fetch_object($db->query($sql));
		$max_number = $result->max;
		$max_number = $max_number+1;
		//get the new question's number

		$audio_ext_list="N";
		if($number>=1)
		{
			for($i=1;$i<$number;$i++)
			{
				$audio_ext_list = $audio_ext_list.'-N';
			}
		}
		/*echo 'Q-'.$max_number.'<br />';
		echo 'T-'.$Title.'<br />';
		echo 'Q-'.$Q1.'<BR />';
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

		//echo $number;
		$sql = "SELECT MAX(KeyboardNo) AS max FROM Keyboard";
    $result = mysqli_fetch_object($db->query($sql));
    $KeyboardNumber = $result->max;
    $KeyboardNumber = $KeyboardNumber+1;
    //get the new question's number

		$ext = array();

    for ($i=1; $i<=$number ; $i++ )
    {
    	$name = 'A'.$i.'_file';
    	$n = 'A'.$i;
	    if ($_FILES[$name]['error'] === UPLOAD_ERR_OK){
		  $file = $_FILES[$name]['tmp_name'];
		  $ext[$i] = end(explode('.', $_FILES[$name]['name']));
		  $dest = 'upload/K'.(string)$KeyboardNumber.$n.'.'.$ext[$i];
		   move_uploaded_file($file, $dest);
		  }
			else {
			}

      //---------WMF Covert to JPG--------------
      if($ext[$i]=="wmf")
      {
          $name = 'K'.(string)$KeyboardNumber.$n;
          convert_wmf($name);
          $ext[$i]="jpg";
      }
      //---------WMF Covert to JPG--------------
    }

    $ext_string = $ext[1];
    for($i=2;$i<=$number;$i++)
    {
    	$ext_string = $ext_string.'-'.$ext[$i];
    }


    $sql2 = "INSERT INTO Keyboard (KeyboardNo, type, ext, audio_ext) VALUES ('$KeyboardNumber', 'Logic', '$ext_string', '$audio_ext_list')";
    $db->query($sql2);

    $sqlQuestion = "INSERT INTO Question (question_no, QA, CA, title, Content, type, single_or_multi, KeyboardNo, classification, picture_ext, audio, video) VALUES ('$max_number', 'Q', '$CA', '$Title', '$Q1', 'LPICTURE', 'MULTI', '$KeyboardNumber', '$classification[0]', '$q1_img_output', '$audio_dest', '$q1_video_output')";
    $db->query($sqlQuestion);

    echo "<script>alert('出題成功'); location.href = 'MakeQuestion.php';</script>";




?>
