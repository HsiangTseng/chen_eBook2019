<?php
	session_start();
	include("connects.php");
	$Answer_get='';
	$sql_get_id = "select * from Now_stats";

	if($stmt = $db->query($sql_get_id)){
		while($result = mysqli_fetch_object($stmt)){
			$book_id = $result->book_id;
			$question_no = $result->question_no;
		}
	}



	$Answer_sql = "Select CA from Question Where book_id ='".$book_id."' and question_no ='".$question_no."'";
	$stmt1 = $db->query($Answer_sql);
	$result = mysqli_fetch_object($stmt1);
	$Answer = $result->CA;


	if(isset($_POST['submit'])){
		//更新答案
		//獲得資料庫內之答案
		//獲得此題答案
		$This_answer_get='';
		$answer_start_time = '';

		if(!empty($_POST['value'])){
			$answer_start_time = $_POST['hidden_time'];
			foreach($_POST['value'] as $value){
				if($This_answer_get != ''){
					$This_answer_get = $This_answer_get.',';
				}
				$This_answer_get = $This_answer_get.$value;
			}

		}
		if($This_answer_get != ''){
			$answer_end_time = microtime(true);
			$answer_time = round($answer_end_time - $answer_start_time);
			
			
		


		if($This_answer_get == $Answer){
			$_SESSION["show_label"]="恭喜答對";
			echo "<script>alert('".$_SESSION["show_label"]."');</script>";
		}
		else{
			$random_num = rand(1,100);
			if($random_num % 4 == 0){
                                $_SESSION["show_label"]="答錯了喔，再試著想想看";
			}
			elseif($random_num % 4 == 1){
                                $_SESSION["show_label"]="答錯了喔，再加油";
                        }
			elseif($random_num % 4 == 2){
                                $_SESSION["show_label"]="答錯了喔，再重新思考一遍";
                        }
			elseif($random_num % 4 == 3){
                                $_SESSION["show_label"]="答錯了喔，再試著想想看";
                        }
		}


		}
		header ('location: client_show.php');
	}
?>
