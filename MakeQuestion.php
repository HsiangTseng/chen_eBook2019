<!DOCTYPE html>

<html lang="en">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        	<link rel="icon" href="images/favicon.ico" type="image/ico" />

            <title>Chen's eBook | </title>

            <!-- Bootstrap -->
            <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <!-- link href="../vendors/font-awesome/css/fontawesome-all.css" rel="stylesheet" -->
            <!-- Font Awesome -->
            <!-- link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" -->

            <link href="..//vendors/fontawesome-free-5.8.2-web/css/all.css" rel="stylesheet">
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
            <!-- DataTable -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

            <!-- Custom Theme Style -->
            <link href="../build/css/custom.min.css" rel="stylesheet">
          </head>




  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="" class="site_title"><i class="fas fa-book"></i> <span>Chen's IRS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <!-- img src="images/img.jpg" alt="..." class="img-circle profile_img"-->
              </div>
              <div class="profile_info">
                <span>Welcome,NCYU</span>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <?php
                  include("side_bar_menu.php");
                  echo side_bar();
                  ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->



        <!-- page content################################# -->
        <div class="right_col" role="main">


            <!-- Question -->
            <div class="x_panel">
                <!-- title bar-->
                <div class="x_title">
                  <h1><b>出題</b></h1>
                  <div class="clearfix"></div>
                </div>
                <!-- title bar-->

                <!-- MakeOut Form -->
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="singel-word-tab" role="tab" data-toggle="tab" aria-expanded="true">文字題</a></li>
                        <li role="presentation" class=""><a href="#tab_content7" role="tab" id="logic-word-tab" data-toggle="tab" aria-expanded="false">文字順序</a></li>
                        <li role="presentation" class=""><a href="#tab_content8" role="tab" id="logic-picture-tab" data-toggle="tab" aria-expanded="false">圖片順序</a></li>
                      </ul>
                </div>



                <!-- WORD TAB-->
                <div id="myTabContent" class="tab-content">

                    <!-- MAKE QUESTION w/ SINGLE ANSWER FORM IN WORD TAB -->
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="singel-word-tab">
                            <form name="myForm" class="form-horizontal form-label-left" method="post" action="updateQuestion_word.php" enctype="multipart/form-data" onKeyDown="if (event.keyCode == 13) {return false;}">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目流水號 : </label>
                                <label class="control-label">
                                    <?php
                                        include("connects.php");

                                        $sql = "SELECT MAX(question_no) AS max FROM Question";
                                        $result = mysqli_fetch_object($db->query($sql));
                                        $max_number = $result->max;
                                        echo $max_number+1;
                                    ?>
                                </label>
                            </div>


                            <div  class="form-group">
                                <label class="control-label col-md-3" for="first-name">答題型別 :<span class="required"></span></label>
                                <div style="display: none;">
                                    <input type="radio" id="single_word_radio" class="radio-inline flat" name="single_or_multi" value="SINGLE" required>
                                    <input type="radio" id="multi_word_radio" class="radio-inline flat" name="single_or_multi" value="MULTI">
                                </div>
                                <button class="btn btn-success" onclick="single_word(); return false;">單選</button>
                                <button class="btn btn-success" onclick="multi_word(); return false;">多選</button>
                            </div>

                            <script type="text/javascript">
                                function single_word()
                                {
                                    document.getElementById("single_word_radio").checked=true;
                                    document.getElementById("multi_word_radio").checked=false;

                                    var div_form = document.createElement("DIV");
                                    div_form.setAttribute("class","form-group");
                                    var word = '<label class="control-label col-md-3" for="first-name">正解 :<span class="required"></span></label>';
                                    var A = '<input type="radio" id="cb1" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A1" required><label>A選項</label>';
                                    var B = '<input type="radio" id="cb2" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A2"><label>B選項</label>';
                                    var C = '<input type="radio" id="cb3" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A3"><label>C選項</label>';
                                    var D = '<input type="radio" id="cb4" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A4"><label>D選項</label>';
                                    div_form.innerHTML = word+A+B+C+D;

                                    var list = document.getElementById("word_ca");
                                    while(list.hasChildNodes()){
                                        list.removeChild(list.firstChild);
                                    }
                                    document.getElementById("word_ca").appendChild(div_form);
                                    check_at_least_one_CA();
                                }

                                function multi_word()
                                {
                                    document.getElementById("single_word_radio").checked=false;
                                    document.getElementById("multi_word_radio").checked=true;

                                    var div_form = document.createElement("DIV");
                                    div_form.setAttribute("class","form-group");
                                    var word = '<label class="control-label col-md-3" for="first-name">正解 :<span class="required"></span></label>';
                                    var A = '<input type="checkbox" id="cb1" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A1"><label>A選項</label>';
                                    var B = '<input type="checkbox" id="cb2" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A2"><label>B選項</label>';
                                    var C = '<input type="checkbox" id="cb3" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A3"><label>C選項</label>';
                                    var D = '<input type="checkbox" id="cb4" class="radio-inline flat" name="answer[]" onclick="check_at_least_one_CA()" value="A4"><label>D選項</label>';
                                    div_form.innerHTML = word+A+B+C+D;

                                     var list = document.getElementById("word_ca");
                                    while(list.hasChildNodes()){
                                        list.removeChild(list.firstChild);
                                    }
                                    document.getElementById("word_ca").appendChild(div_form);
                                    check_at_least_one_CA();
                                  }

                                function check_at_least_one_CA()//this function make sure user choose at least 1 Correct Answer
                                {
                                  var cb_count = 0;
                                  var check_box_id1 = document.getElementById("cb1");
                                  if(check_box_id1.checked)
                                  {
                                    cb_count++;
                                  }
                                  var check_box_id2 = document.getElementById("cb2");
                                  if(check_box_id2.checked)
                                  {
                                    cb_count++;
                                  }
                                  var check_box_id3 = document.getElementById("cb3");
                                  if(check_box_id3.checked)
                                  {
                                    cb_count++;
                                  }
                                  var check_box_id4 = document.getElementById("cb4");
                                  if(check_box_id4.checked)
                                  {
                                    cb_count++;
                                  }
                                  //alert(cb_count);
                                  if(cb_count > 0){
                                    document.getElementById("single_word_submit").disabled = false;
                                  }
                                  else {
                                    document.getElementById("single_word_submit").disabled = true;
                                  }
                                }

                            </script>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">測驗型別 :<span class="required"></span></label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="1" required><label>詞彙理解</label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="2" required><label>詞彙表達</label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="3" required><label>語法表現</label>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目標題 :<span class="required"></span></label>
                                <div class="col-md-3">
                                    <input type="text"  name="Q1_title" required="required" placeholder="顯示於電子書中的題目標題，請儘量簡短" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目 :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="Q1" required="required" placeholder="完整題目內文" class="form-control col-md-7 col-xs-12">
                                </div>

                                <label class="control-label col-md-1" for="last-name">附加音檔: <span></span></label>
                                <div class="col-md-3">
                                    <input type="file" name="audio_file" accept="audio/*,.m4a"/>
                                </div>
                            </div>
                            <div class="form-group  sameline">
                                <label class="control-label col-md-3" for="last-name">題目附圖 : <span></span></label>
                                <input type="file" name="Q1_file" accept="image/*,.wmf"/>
                            </div>
			    <div class="form-group  sameline">
                                <label class="control-label col-md-3" for="last-name">題目附影片 : <span></span></label>
                                <input type="file" name="Q1_video_file" accept="video/*,.m4a"/>
                            </div>
                            <HR>
                            <HR>


                            <div class="form-group">
                                <label class="control-label col-md-3" for="last-name">選項(A) :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="A1" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-1" for="last-name">附加音檔: <span></span></label>
                                <div class="col-md-3">
                                    <input type="file" name="audio_A1" accept="audio/*,.m4a"/>
                                </div>
                            </div>
                            <div class="form-group sameline">
                                <label class="control-label col-md-3" for="last-name">選項(A)附圖 : <span></span></label>
                                <input type="file" name="a1_file" accept="image/*,.wmf"/>
                            </div>
                            <HR />


                            <div class="form-group">
                                <label class="control-label col-md-3" for="last-name">選項(B) :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="A2" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-1" for="last-name">附加音檔: <span></span></label>
                                <div class="col-md-3">
                                    <input type="file" name="audio_A2" accept="audio/*,.m4a"/>
                                </div>
                            </div>
                            <div class="form-group sameline">
                                <label class="control-label col-md-3" for="last-name">選項(B)附圖 : <span></span></label>
                                <input type="file" name="a2_file" accept="image/*,.wmf"/>
                            </div>
                            <HR />

                            <div class="form-group">
                                <label class="control-label col-md-3" for="last-name">選項(C) :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="A3" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-1" for="last-name">附加音檔: <span></span></label>
                                <div class="col-md-3">
                                    <input type="file" name="audio_A3" accept="audio/*,.m4a"/>
                                </div>
                            </div>
                            <div class="form-group sameline">
                                <label class="control-label col-md-3" for="last-name">選項(C)附圖 : <span></span></label>
                                <input type="file" name="a3_file" accept="image/*,.wmf"/>
                            </div>
                            <HR />


                            <div class="form-group">
                                <label class="control-label col-md-3" for="last-name">選項(D) :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="A4" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-1" for="last-name">附加音檔: <span></span></label>
                                <div class="col-md-3">
                                    <input type="file" name="audio_A4" accept="audio/*,.m4a"/>
                                </div>
                            </div>
                            <div class="form-group sameline">
                                <label class="control-label col-md-3" for="last-name">選項(D)附圖 : <span></span></label>
                                <input type="file" name="a4_file" accept="image/*,.wmf"/>
                            </div>
                            <HR />


                            <div id="word_ca"></div>






                            <clearfix>
                              <div class="form-group">
                                  <label class="control-label col-md-6"><font color="red">註1：若"送出"按鈕無法點選，代表尚未選擇答題類型(單選/多選)或未選擇正解</font></label>
                              </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">重填</button>
                                <button type="submit" id="single_word_submit" class="btn btn-success" disabled >送出</button>
                            </div>
                        </form>
                    </div>

                    <!-- MAKE QUESTION w/ SINGLE ANSWER FORM IN WORD TAB -->






                    <!-- MAKE QUESTION w/ LOGIC ANSWER FORM IN WORD TAB -->



                    <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="logic-word-tab">

                            <div class="form-horizontal form-label-left">
                              <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">增減選項 : </label>
                                <button class="btn btn-success" onclick="addInput()">+</button>
                                <button class="btn btn-danger" onclick="subInput()">-</button>
                              </div>
                            </div>

                            <form class="form-horizontal form-label-left" method="post" action="updateQuestion_logicWord.php" enctype="multipart/form-data" onKeyDown="if (event.keyCode == 13) {return false;}">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目流水號 : </label>
                                <label class="control-label">
                                    <?php
                                        include("connects.php");

                                        $sql = "SELECT MAX(question_no) AS max FROM Question";
                                        $result = mysqli_fetch_object($db->query($sql));
                                        $max_number = $result->max;
                                        echo $max_number+1;
                                    ?>
                                </label>
                            </div>

                          <div id="message"></div>

                          <script type="text/javascript">


                          var create_input_number = 0;

                          function addInput() {
                                    create_input_number++;
                                    var div_form = document.createElement("DIV");
                                    div_form.setAttribute("class","form-group");
                                    name = 'div_q'+create_input_number;
                                    div_form.setAttribute("id",name);


                                    var lb = '<label class="control-label col-md-3" for="first-name">選項' + create_input_number +' :<span class="required"></span></label>';
                                    var md5 = '<div class="col-md-5">';
                                    var input_q =  '<input type="text"  name="Answer[]" required="required" class="form-control col-md-7 col-xs-12">';
                                    div_form.innerHTML = lb+md5+input_q;
                                    document.getElementById("message").appendChild(div_form);
                                    }

                          function subInput() {
                                      if(create_input_number>1)
                                        {
                                          _name = 'div_q'+create_input_number;
                                        document.getElementById(_name).remove();
                                        create_input_number--;
                                        }
                                    }

                          addInput();
                          </script>
                            <HR>
                            <HR>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">測驗型別 :<span class="required"></span></label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="1" required><label>詞彙理解</label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="2" required><label>詞彙表達</label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="3" required><label>語法表現</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目標題 :<span class="required"></span></label>
                                <div class="col-md-3">
                                    <input type="text"  name="Q1_title" required="required" placeholder="顯示於電子書中的題目標題，請儘量簡短" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目 :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="Q1" required="required" placeholder="完整題目內文" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">正確順序 :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="CA" placeholder="EX : 正確語序若為選項1-3-2-4，請填 A1,A3,A2,A4" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <clearfix>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">重填</button>
                                <button type="submit" class="btn btn-success">送出</button>
                            </div>
                        </form>
                    </div>

                    <!-- MAKE QUESTION w/ LOGIC ANSWER FORM IN WORD TAB -->

                    <!-- MAKE QUESTION w/ LOGIC ANSWER FORM IN PICTURE TAB -->


                    <div role="tabpanel" class="tab-pane fade" id="tab_content8" aria-labelledby="logic-picture-tab">
                            <div class="form-horizontal form-label-left">
                              <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">增減選項 : </label>
                                <button class="btn btn-success" onclick="addInputPic()">+</button>
                                <button class="btn btn-danger" onclick="subInputPic()">-</button>
                              </div>
                            </div>

                            <form class="form-horizontal form-label-left" method="post" action="updateQuestion_logicPic.php" enctype="multipart/form-data" onKeyDown="if (event.keyCode == 13) {return false;}">
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目流水號 : </label>
                                <label class="control-label">
                                    <?php
                                        include("connects.php");

                                        $sql = "SELECT MAX(question_no) AS max FROM Question";
                                        $result = mysqli_fetch_object($db->query($sql));
                                        $max_number = $result->max;
                                        echo $max_number+1;
                                    ?>
                                </label>
                            </div>


                          <div id="messagePic"></div>


                            <HR>
                            <HR>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">測驗型別 :<span class="required"></span></label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="1" required><label>詞彙理解</label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="2" required><label>詞彙表達</label>
                                <input type="radio" class="radio-inline flat" name="classification[]" value="3" required><label>語法表現</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目標題 :<span class="required"></span></label>
                                <div class="col-md-3">
                                    <input type="text"  name="Q1_title" required="required" placeholder="顯示於電子書中的題目標題，請儘量簡短" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">題目 :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="Q1" required="required" placeholder="完整題目內文" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3" for="first-name">正確順序 :<span class="required"></span></label>
                                <div class="col-md-5">
                                    <input type="text"  name="CA" placeholder="正解順序 例如: A1-A3-A2-A4" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <input type="hidden" name="picture_number"  id="picture_number">

                            <script type="text/javascript"></script>
                            <clearfix>
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">重填</button>
                                <button type="submit" class="btn btn-success">送出</button>
                            </div>
                        </form>
                    </div>

                          <script type="text/javascript">
                          var pic_create_input_number = 0;

                          function addInputPic() {
                                    pic_create_input_number++;
                                    var div_form = document.createElement("DIV");
                                    div_form.setAttribute("class","form-group");
                                    name = 'div_qpic'+pic_create_input_number;
                                    div_form.setAttribute("id",name);


                                    var lb = '<label class="control-label col-md-3" for="first-name">圖片' + pic_create_input_number +' :<span class="required"></span></label>';
                                    var md5 = '<div class="col-md-3">';
                                    var input_q =  '<input type="file" name="A'+pic_create_input_number+'_file" required />';
                                    div_form.innerHTML = lb+md5+input_q;
                                    document.getElementById("messagePic").appendChild(div_form);
                                    document.getElementById("picture_number").value=pic_create_input_number;
                                    }

                          function subInputPic() {
                                      if(pic_create_input_number>1)
                                        {
                                          _name = 'div_qpic'+pic_create_input_number;
                                        document.getElementById(_name).remove();
                                        pic_create_input_number--;
                                        document.getElementById("picture_number").value=pic_create_input_number;
                                        }
                                    }

                          addInputPic();

                          </script>

                    <!-- MAKE QUESTION w/ LOGIC ANSWER FORM IN PICTURE TAB -->

                </div>
                <!-- WORD TAB-->


                <!-- MakeOut Form -->

            </div>
            <!-- Question -->







        <!-- page content################################# -->

        <!-- footer content -->
        <!--footer>
        <!--/footer>
        <!-- /footer content -->


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
            <!-- DataTable -->
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="../build/js/custom.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/dojo/1.13.0/dojo/dojo.js"></script>
  </body>
</html>
