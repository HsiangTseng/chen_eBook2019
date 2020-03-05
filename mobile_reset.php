<?php
	include("connects.php");
	$sql = "SELECT * FROM `Now_stats`";
	$now_book_id = 0;
	$now_question_no = 0;
	$old_book_id = 0;
	$old_question_no = 0;
	if($stmt = $db->query($sql)){
		while($result = mysqli_fetch_object($stmt)){
			$now_book_id = $result->book_id;
			$now_question_no = $result->question_no;
			$old_book_id = $result->old_book_id;
			$old_question_no = $result->old_question_no;
		}
		
	}

	if($now_question_no != $old_question_no){
		if(isset($_SESSION["if_answer"])){
			unset($_SESSION["if_answer"]);
		}
	}


	$data["old_question_no"] = $old_question_no;
	$data["old_book_id"] = $old_book_id;
			
	echo json_encode($data);
	
	$last = "UPDATE `Now_stats` SET old_book_id = ".$now_book_id." , old_question_no = ".$now_question_no."";
	$db->query($last);
	$db->close();

?>
