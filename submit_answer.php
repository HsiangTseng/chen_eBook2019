<?php
	session_start();
	include("connects.php");
	$Answer_get='';
	$sql_get_id = "select * from Now_stats";

	if($stmt = $db->query($sql_get_id)){
		while($result = mysqli_fetch_object($stmt)){
			$question_no = $result->question_no;
			$UUID = $result->UUID;
		}
	}

	$WhosAnswer = "A1234";
	//$WhosAnswer = $_SESSION['username'];


	$Answer_sql = "Select CA from Question Where question_no ='".$question_no."'";
	$stmt1 = $db->query($Answer_sql);
	$result = mysqli_fetch_object($stmt1);
	$Answer = $result->CA;


	if(isset($_POST['submit'])){	
		//更新答案
		//獲得資料庫內之答案
		$Answer_sql = "Select * from PracticeResult Where UUID ='".$UUID."' and WhosAnswer='".$WhosAnswer."'";
                $stmt2 = $db->query($Answer_sql);
                $result = mysqli_fetch_object($stmt2);
                $Answer_get = $result->Answer;
                $Answer_time_get = $result->AnswerTime;



		//獲得此題答案
		$This_answer_get='';
		$answer_start_time = '';
		
		if(!empty($_POST['hidden'])){
                        $answer_start_time = $_POST['hidden_time'];
                        $This_answer_get = $_POST['hidden'];
                        foreach($_POST['hidden'] as $value){
				if($This_answer_get != ''){
	                                $This_answer_get = $This_answer_get.',';
				}
				$This_answer_get = $This_answer_get.$value;
                        }
                }
		
		elseif(!empty($_POST['value'])){
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
			$answer_time = round($answer_end_time - $answer_start_time,2);

			if($This_answer_get == $Answer){
				if(isset($_SESSION["Record_Answer"])){
					$_SESSION["Record_Answer"] = $_SESSION["Record_Answer"]."^%";
					$_SESSION["Record_Answer"] = $_SESSION["Record_Answer"].$This_answer_get;
                                        $This_answer_get = $_SESSION["Record_Answer"];
                                        unset($_SESSION["Record_Answer"]);
                                }

                                if($Answer_get != ''){
                                        $Answer_get = $Answer_get.'-';
                                        $Answer_get = $Answer_get.$This_answer_get;
                                }
                                else{
                                        $Answer_get = $This_answer_get;
                                }

				if($Answer_time_get != ''){
                                        $Answer_time_get = $Answer_time_get.'-';
                                        $Answer_time_get = $Answer_time_get.$answer_time;
                                }
                                else{
                                        $Answer_time_get = $answer_time;
                                }
				if(!isset($_SESSION["if_answer"])){
	                                $upd_sql = "update PracticeResult SET Answer='".$Answer_get."' ,AnswerTime='".$Answer_time_get."' where WhosAnswer = '".$WhosAnswer."' and UUID ='".$UUID."'";
        	                        $db->query($upd_sql);
					$_SESSION["if_answer"]="yes";
				}


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


				if(isset($_SESSION["Record_Answer"])){
					$_SESSION["Record_Answer"] = $_SESSION["Record_Answer"].'^%';
					$_SESSION["Record_Answer"] = $_SESSION["Record_Answer"].$This_answer_get;
				}
				else{
					$_SESSION["Record_Answer"] = $This_answer_get;
				}
			}
		}
		header ('location: client_show.php');
	}
?>
