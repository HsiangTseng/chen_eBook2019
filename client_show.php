<!DOCTYPE html>
<?php 
	session_start();
	$start_time = microtime(true);
	$_SESSION["show_label"] = null;
?>

<?php
	include("connects.php");
	$sql = "SELECT * FROM `Now_stats`";
	$now_book_id = 0;
	$now_question_no = 0;
	$old_book_id = 0;
	$old_question_no = 0;
	if($stmt = $db->query($sql)){
		$result = mysqli_fetch_object($stmt);
			$now_book_id = $result->book_id;
			$now_question_no = $result->question_no;
			
			$old_book_id = $result->old_book_id;
			$old_question_no = $result->old_question_no;
		
	}
?>

<html lang="en" style="height:100%">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/favicon.ico" type="image/ico" />

		<title>Chen's IRS | </title>

		<!-- Bootstrap -->
		<link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="../vendors/font-awesome/css/fontawesome-all.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- iCheck -->
		<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<!-- bootstrap-progressbar -->
		<link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
		<!-- JQVMap -->
		<link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
		<!-- bootstrap-daterangepicker -->
		<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

		<!-- Custom Theme Style -->
		<link href="../build/css/custom.min.css" rel="stylesheet">						
	</head>

	<body class="nav-md"  style="height:100%">	
		<style>		
			html, body {
				height: 100%;
				background-color:rgba(255,255,255,0.4);
			}
			.test {
				text-align:center;
				vertical-align:middle;
			}
			.rwdtxt {
				font-size: 10px;
			}
			@media (min-width: 400px) and (max-width: 900px) {
				.rwdtxt {
					font-size: 20px;
				}
			}
			@media (min-width: 900px) {
				.rwdtxt {
					font-size: 30px;
				}
			}
			.rwdonlytxt {
				font-size: 60px;
			}
			@media (min-width: 400px) and (max-width: 900px) {
				.rwdonlytxt {
					font-size: 80px;
				}
			}
			@media (min-width: 900px) and (max-width: 1000px) {
				.rwdonlytxt {
					font-size: 100px;
				}
			}
			@media (min-width: 1000px) {
				.rwdonlytxt {
					font-size: 120px;
				}
			}
			.div25{
				height:25%;
			}
			.div50{
				height:50%;
			}
			.test input[type=radio] + label{
				border: 2px solid gray;
				border-radius:10px;
			}
			.test input[type=checkbox] + label{
				border: 2px solid gray;
				border-radius:10px;
			}
			.test input[type=checkbox]:checked + label{									
				border: 3px solid red;
				border-radius:10px;
			}		
			input[type=checkbox]{
				display:none
			}
			.test input[type=radio]:checked + label{									
				border: 3px solid red;
				border-radius:10px;
			}		
			input[type=radio]{
				display:none
			}
			.logic_graph{
				background-color:rgba(200,200,200,0.4);	
			}
			audio{
				display:block;
				margin:0 auto;
				clear: both;
				width:80%;
			}
			.square-button {
				max-width: 100%;
				min-height: 80%;
				max-height:100%;
				display:block;
				margin:auto;
				position: relative;
				background-color:rgba(255,255,255,0.4);
				border-radius:10px;
				vertical-align: middle;
			}
			.show-img {
				border: 1px solid black;
				border-radius:10px;
				max-width:90%;
				max-height: 90%;
				position: absolute;
				display:block;
				margin:auto;
				top: 50%;
				left: 50%;
				transform: translate(-50%,-50%);
			}

			.small-img {
				max-width:85%;
				min-height:80%;
				max-height:85%;
				position: absolute;
				display:block; 
				margin:auto;
				top: 45%;
				left: 50%;
				transform: translate(-50%,-50%);
			}
			.show-text{
				position: absolute;
				display:block; 
				margin:auto;
				top: 95%;
				left: 50%;
				transform: translate(-50%,-50%);
			}
			

		</style>
		<div class="container body"  style="height:100%">
			<div class="main_container"  style="height:100%">
			<!-- page content################################# -->
				<div class="x_panel test" role="main"  style="height:100%">
					<form method="post" action="submit_answer.php" style="height:100%">
						<div class="col-md-12 col-sm-12 col-xs-12 rwdtxt" style="height:10%; position:fixed; top:0; z-index:1;">
                                                        <label id="label_show">
								<?php 
									if($_SESSION["show_label"] != null){
										echo $_SESSION["show_label"];
									}

								?>
							</label>
                                                </div>
						<?php
							echo "<input type='hidden' id='hidden_time' name='hidden_time' value='".microtime(true)."'/>";
						?>
						<input type="hidden" id="hidden_value" name="hidden" value=""/>																
						<script>
							var last_book_id = <?php echo "$old_book_id";?>;
							var last_question_no = <?php echo "$old_question_no";?>;							

							var now_book_id =  <?php echo "$now_book_id";?>;							
							var now_question_no =  <?php echo "$now_question_no";?>;
							
							function set_question(){
								if(last_book_id != now_book_id){
									//跳至下一題									
									if(last_question_no != now_question_no){
										$.ajax(
										{
											type:"POST",
											url:"mobile_reset.php"															
										}
										).done(function(msg){});
										window.location.reload();			
									}
																				
								}
								else{
									if(last_question_no != now_question_no){
										 $.ajax(
	                                                                        {
	                                                                                type:"POST",
	                                                                                url:"mobile_reset.php"	
                	                                                        }
        	                                                                ).done(function(msg){});
                        	                                                window.location.reload();
									}
								}
								$.ajax(
								{
									type:"POST",
									url:"mobile_reset.php",
									success:function(data){
										last_question_no = data;
									}
								});
							}
							setInterval(set_question,300);
						</script>
						<?php
							include("connects.php");
							include("getdata.php");
						?>
						<div class="col-md-12 col-sm-12 col-xs-12 rwdtxt" style="height:10%; position:fixed; bottom:0; z-index:1;">
							<input type="submit" value="確定" name="submit" style="width:25%; height:100%;">							
						</div>
					</form>
					<script>
						
					</script>

					

					<!-- question form-->
					
					<!-- 邏輯順序題的回答 -->
					<script>
						var audios = document.getElementsByTagName("audio");
						var arrshow = [];
						var arrvalue = [];
						function show_order(value,id,placeholder){
							if (document.getElementById(id).checked){
								arrshow.push(placeholder);
								arrvalue.push(value);
							}
							else{
								for (var i = 0; i < arrshow.length; i++) {
									if (arrshow[i] == placeholder) {
										arrshow.splice(i, 1);
										arrvalue.splice(i, 1);
									}
								}	
							}
							document.getElementById("hidden_value").value=arrvalue;
							document.getElementById("input").value=arrshow.join(" ");							
						}
						
						function picture_order(value,id,placeholder){
						if (document.getElementById(id).checked){
							var div_form = document.createElement("label");
							div_form.setAttribute("class","col-md-2 col-xs-2 col-sm-2");
							div_form.setAttribute("style","height:100%;")
							newid = 'show' + id;
							div_form.setAttribute("id",newid);
							var lb = '<img class="show-img" src=' + placeholder + '>';
							div_form.innerHTML = lb;	
							document.getElementById("input").appendChild(div_form);							
							arrvalue.push(value);							
						}
						else{
							newid = 'show' + id;
							document.getElementById(newid).remove();
							for (var i = 0; i < arrvalue.length; i++) {
								if (arrvalue[i] == value) {
									arrvalue.splice(i, 1);
								}
							}							
						}
						document.getElementById("hidden_value").value=arrvalue;
						}
						function pauseAll() {
        						var self = this;
						        [].forEach.call(audios, function (i) {
								 i !== self && i.pause();
						        })
      						}
						[].forEach.call(audios, function (i) {
						        i.addEventListener("play", pauseAll.bind(i));
					        })
					</script>	
					
					

				</div>			
			</div>
		</div>			


		<!-- jQuery -->
		<script src="../vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="../vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="../vendors/nprogress/nprogress.js"></script>
		<!-- Chart.js -->
		<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
		<!-- gauge.js -->
		<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- iCheck -->
		<script src="../vendors/iCheck/icheck.min.js"></script>
		<!-- Skycons -->
		<script src="../vendors/skycons/skycons.js"></script>
		<!-- Flot -->
		<script src="../vendors/Flot/jquery.flot.js"></script>
		<script src="../vendors/Flot/jquery.flot.pie.js"></script>
		<script src="../vendors/Flot/jquery.flot.time.js"></script>
		<script src="../vendors/Flot/jquery.flot.stack.js"></script>
		<script src="../vendors/Flot/jquery.flot.resize.js"></script>
		<!-- Flot plugins -->
		<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
		<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
		<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
		<!-- DateJS -->
		<script src="../vendors/DateJS/build/date.js"></script>
		<!-- JQVMap -->
		<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
		<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
		<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="../vendors/moment/min/moment.min.js"></script>
		<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="../build/js/custom.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/dojo/1.13.0/dojo/dojo.js"></script>
	</body>
</html>
