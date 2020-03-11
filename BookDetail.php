<!DOCTYPE html>
<?php

//IF IS THE CREATE MODE
if(!isset($_GET['action']))
{
  $main_title = $_POST['main_title'];
  $sub_title = $_POST['sub_title'];
  $edit_teacher = $_POST['edit_teacher'];
  $page = $_POST['page'];
}



//IF IS THE EDIT MODE
if(isset($_GET['action']))
{
  $book_id = $_GET['book_id'];

  //GET THE BOOK DATA
  include("connects.php");
  $sql = "SELECT * FROM Book WHERE book_id = $book_id";
  $result = mysqli_fetch_object($db->query($sql));
  $main_title = $result->main_title;
  $sub_title = $result->sub_title;
  $edit_teacher = $result->edit_teacher;
  $page = $result->pages;
}
?>
<html lang="en">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        	<link rel="icon" href="images/favicon.ico" type="image/ico" />

          <title>eBook | </title>

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
              <a href="" class="site_title"><i class="fas fa-book"></i> <span>eBook</span></a>
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

        <style>
        .bigtext{
          line-height: 5em;
        }
        </style>

        <!-- page content################################# -->
        <div class="right_col" role="main">

            <form class="form-horizontal form-label-left input_mask" method="post" action="updateBookData.php" enctype="multipart/form-data">
            <!-- Cotent -->
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>編輯封面及內文頁</strong></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <input type="hidden" name="edit_tag" id="edit_tag" value="0"/>
                      <input type="hidden" name="edit_book_id" id="edit_book_id" value="-1"/>
                      <?php
                        if(isset($_GET['action']))
                        {
                          echo "<script>document.getElementById('edit_tag').value=1;</script>";
                          echo "<script>document.getElementById('edit_book_id').value=".$_GET['book_id'].";</script>";
                        }
                      ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">主標題 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="main_title" value="<?php echo $main_title;?>" required="required" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">副標題 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="sub_title" value="<?php echo $sub_title;?>" required="required" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">編書老師 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="edit_teacher" value="<?php echo $edit_teacher;?>" required="required" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">頁數 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="page" value="<?php echo $page;?>" required="required" readonly>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <p style="text-align:center;"><strong>註1：編寫課文時，四下空白鍵＝空兩格中文字</strong></p>
                      <p style="text-align:center;"><strong>註2：單頁上限為200字，包含空格及標點符號，無法輸入表示已達200字</strong></p>
                      <!-- Content Block -->
                      <?php
                      for ($i=1 ; $i <= $page ; $i++)
                      {
                        echo '<div class="form-group">';
                          echo '<label class="control-label col-md-3 col-sm-3 col-xs-12">第'.$i.'頁</label>';
                          echo '<div class="col-md-8 col-sm-8 col-xs-12">';
                            echo '<textarea id="test" name="content[]" class="form-control" rows="5" wrap="soft" maxlength="200" required>';
                            if(isset($_GET['action']))
                            {
                              //IF IS EDIT MODE, GET THE DEFAULT CONTENT.
                              $sql = "SELECT * FROM Page WHERE book_id = $book_id AND page_no = $i";
                              $result = mysqli_fetch_object($db->query($sql));
                              echo $result->content;
                            }
                            echo '</textarea>';
                          echo '</div>';
                        echo '</div>';
                        echo '<label class="control-label col-md-3 col-sm-3 col-xs-12">上傳背景圖 :</label>';
                        echo '<input type="file" name="P'.$i.'_file"><br />';
                        if(isset($_GET['action']))
                        {
                          echo '<label class="control-label col-md-3 col-sm-3 col-xs-12">原背景圖 :</label>';
                          $old_pic_ext = $result->picture_ext;
                          if(strlen($old_pic_ext)>1)
                          {
                            echo '<img src="upload/'.$old_pic_ext.'" style="width:100px; height:100px;" ';
                          }
                          else
                          {
                            echo '無';
                          }
                        }
                        echo '<hr />';
                        echo '<hr style="border-top: 2px dashed #2D99C8;" />';
                        //echo '<div class="ln_solid"></div>';
                      }
                      ?>




                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" id="btn_submit" class="btn btn-success" onclick="return go()">完成編輯</button>
                        </div>
                      </div>
                      <script>
                      function replaceHtml(string_to_replace) {
                        return $("<div>").append(string_to_replace.replace(/&nbsp;/g, ' ').replace(/<br.*?>/g, '&#13;&#10;')).text();
                      }

                      function go(){
                        var str = $("#test").val();
                        $("#test").val(replaceHtml(str));
                      }

                      </script>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>新增教材</strong></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data" onKeyDown="if (event.keyCode == 13) {return false;}">
                      <div class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3" for="first-name">增減教材數量 : </label>
                          <button type="button" id="btn_tm_add" class="btn btn-success" onclick="addInputPic()">+</button>
                          <button type="button" id="btn_tm_sub" class="btn btn-danger" onclick="subInputPic()">-</button>
                        </div>

                        <div id="material"></div>
                        <input type="hidden" name="material_number"  id="material_number">

                        <script type="text/javascript">
                        var material_create_input_number = 0;

                        function addInputPic() {
                                  material_create_input_number++;
                                  var div_form = document.createElement("DIV");
                                  div_form.setAttribute("class","form-group");
                                  name = 'div_qpic'+material_create_input_number;
                                  div_form.setAttribute("id",name);

                                  var lb = '<label class="control-label col-md-3 col-sm-3 col-xs-12">教材'+material_create_input_number+'名稱 :</label>'+
                                           '<div class="col-md-8 col-sm-8 col-xs-10">'+
                                              '<input type="text" placeholder="教材名稱請與課文詞彙相同" class="form-control" id="tm_title'+material_create_input_number+'" name="material_name[]">'+
                                           '</div>'+
                                           '<label class="control-label col-md-3 col-sm-3 col-xs-12">上傳教材'+material_create_input_number+'圖檔 :</label>'+
                                           '<input type="file" name="A'+material_create_input_number+'_file"><br />'+
                                           '<label class="control-label col-md-3 col-sm-3 col-xs-12">上傳教材'+material_create_input_number+'影片 :</label>'+
                                           '<input type="file" name="A'+material_create_input_number+'video_file"><br />'+
                                           '<label class="control-label col-md-3 col-sm-3 col-xs-12">教材'+material_create_input_number+'說明 :</label>'+
                                           '<div class="col-md-8 col-sm-8 col-xs-10">'+
                                              '<textarea name="material_content[]" id="tm_content'+material_create_input_number+'" class="form-control" rows="5" wrap="soft" maxlength="150"></textarea>'+
                                           '</div>'+
                                           '<label id="lb_old_tm_img'+material_create_input_number+'" style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-12">原圖 :</label>'+
                                           '<img style="width:100px; height:100px; display:none;" id="tm_img_src'+material_create_input_number+'" src="" />';

                                  div_form.innerHTML = lb;
                                  document.getElementById("material").appendChild(div_form);
                                  document.getElementById("material_number").value=material_create_input_number;
                                  }

                        function subInputPic() {
                                    if(material_create_input_number>0)
                                      {
                                        _name = 'div_qpic'+material_create_input_number;
                                      document.getElementById(_name).remove();
                                      material_create_input_number--;
                                      document.getElementById("material_number").value=material_create_input_number;
                                      }
                                  }
                        function setTeachMaterialDefault(tm_index,title,content)
                        {
                          var TM_id = "tm_title"+tm_index;
                          document.getElementById(TM_id).value = title;

                          var TM_content = "tm_content"+tm_index;
                          if(content.length>0)
                          {
                            document.getElementById(TM_content).value = content;
                          }
                          else
                          {
                            document.getElementById(TM_content).value = "";
                          }


                        }
                        </script>
                        <?php
                        if(isset($_GET['action']))
                        {
                          $sql = "SELECT COUNT(title) AS old_tm_number FROM TeachMaterial WHERE book_id='$book_id'";
                          $result = mysqli_fetch_object($db->query($sql));
                          $old_tm_number = $result->old_tm_number;

                          //CREATE DEFAULT TeachMaterial
                          for($i = 1 ; $i <= $old_tm_number ; $i++)
                          {
                            echo '<script>addInputPic();</script>';

                            $sql = "SELECT * FROM TeachMaterial WHERE book_id='$book_id' AND material_no='$i'";
                            $result = mysqli_fetch_object($db->query($sql));
                            $old_tm_title = $result->title;
                            $old_tm_content = $result->content;
                            $old_tm_pic_ext = $result->img;
                            echo '<script>setTeachMaterialDefault("'.$i.'","'.$old_tm_title.'","'.$old_tm_content.'")</script>';
                            //echo $old_tm_pic_ext;
                            if(strlen($old_tm_pic_ext)>1)
                            {
                              echo '<script>
                                    document.getElementById("tm_img_src'.$i.'").src="'.$old_tm_pic_ext.'";
                                    document.getElementById("lb_old_tm_img'.$i.'").style.display="block";
                                    document.getElementById("tm_img_src'.$i.'").style.display="block";
                                    </script>';
                            }

                          }
                        }
                        ?>

                      </div>
                  </div>
                </div>
              </div>


              <?php
              // FOR GET EXERCISE DDL
              include("connects.php");
              $sql = "SELECT MAX(question_no) AS max FROM Question";
              $result = mysqli_fetch_object($db->query($sql));
              $max_question_number = $result->max;

              $question_number = array();
              $question_content = array();
              $index = 1;
              $sql = "SELECT * FROM Question WHERE QA = 'Q' ";
              if($stmt = $db->query($sql))
              {
                  while($result = mysqli_fetch_object($stmt))
                  {
                      $question_content[$index] = $result->Content;
                      $question_number[$index] = $result->question_no;
                      $index++;
                  }
              }
              function ddl_content()
              {
                global $max_question_number,$question_number, $question_content;
                for ($i = 1 ; $i <= $max_question_number ; $i++)
                {
                  echo '<option value="'.$question_number[$i].'">'.$question_content[$i].'</option>';
                }
              }

              ?>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>新增課堂練習</strong></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data" onKeyDown="if (event.keyCode == 13) {return false;}">
                      <div class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3" for="first-name">增減習題數量 : </label>
                          <button type="button"  class="btn btn-success" onclick="addInputExe()">+</button>
                          <button type="button"  class="btn btn-danger" onclick="subInputExe()">-</button>
                        </div>

                        <div id="exercise"></div>
                        <input type="hidden" name="exercise_number"  id="exercise_number">
                        <script>
                        var exercise_create_input_number = 0;
                        function addInputExe() {
                                  exercise_create_input_number++;
                                  var ediv_form = document.createElement("DIV");
                                  ediv_form.setAttribute("class","form-group");
                                  name = 'div_epic'+exercise_create_input_number;
                                  ediv_form.setAttribute("id",name);

                                  var elb =
                                          '<div class="form-group">'+
                                          '<label class="control-label col-md-3 col-sm-3 col-xs-12">第'+exercise_create_input_number+'題</label>'+
                                            '<div class="col-md-9 col-sm-9 col-xs-12">'+
                                              '<select class="select2_single form-control" id="tm_exe'+exercise_create_input_number+'" name="Question_ddl[]" tabindex="-1" required>'+
                                                '<?php ddl_content();?>'+
                                              '</select>'+
                                            '</div>'+
                                          '</div>';


                                  ediv_form.innerHTML = elb;
                                  document.getElementById("exercise").appendChild(ediv_form);
                                  document.getElementById("exercise_number").value=exercise_create_input_number;
                                  }
                        function subInputExe() {
                                    if(exercise_create_input_number>0)
                                      {
                                        _ename = 'div_epic'+exercise_create_input_number;
                                      document.getElementById(_ename).remove();
                                      exercise_create_input_number--;
                                      document.getElementById("exercise_number").value=exercise_create_input_number;
                                      }
                                  }

                        function settingSelected(list_index,selected_index){
                                    //this function for edit to select the default ddl index
                                    selected_index--;
                                    var name = "tm_exe"+list_index;
                                    document.getElementById(name).selectedIndex = selected_index;
                                  }

                        </script>


                        <?php
                        if(isset($_GET['action']))
                        {
                          $sql = "SELECT question FROM Book WHERE book_id='$book_id'";
                          $result = mysqli_fetch_object($db->query($sql));
                          $old_exercise = $result->question;
			  if(!empty($old_exercise) || !is_null($old_exercise)){
                          $old_exercise_number = substr_count($old_exercise, "-");                                                   
                            $old_exercise_number++;
                         }
			    
			  
		   	  


                          $old_exercise_array = explode("-",$old_exercise);
                          //print_r ($old_exercise_array);

                          //CREATE DEFAULT TeachMaterial
                          for($i = 1 ; $i <= $old_exercise_number ; $i++)
                          {
                            $old_exercise_array_index = $i-1;
                            echo '<script>';
                            echo 'addInputExe();';
                            echo 'settingSelected("'.$i.'","'.$old_exercise_array[$old_exercise_array_index].'")';
                            echo '</script>';
                          }
                        }
                        ?>

                      </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>新增音檔</strong></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left input_mask" method="post" action="" enctype="multipart/form-data" onKeyDown="if (event.keyCode == 13) {return false;}">
                      <div class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3" for="first-name">增減音檔 : </label>
                          <button type="button" id="btn_audio_add" class="btn btn-success" onclick="addInputAudio()">+</button>
                          <button type="button" id="btn_audio_sub" class="btn btn-danger" onclick="subInputAudio()">-</button>
                        </div>

                        <div id="audio"></div>
                        <input type="hidden" name="audio_number"  id="audio_number">

                        <script type="text/javascript">
                        var audio_create_input_number = 0;

                        function addInputAudio() {
                                  audio_create_input_number++;
                                  var adiv_form = document.createElement("DIV");
                                  adiv_form.setAttribute("class","form-group");
                                  name = 'div_apic'+audio_create_input_number;
                                  adiv_form.setAttribute("id",name);

                                  var lb = '<label class="control-label col-md-3 col-sm-3 col-xs-12">音檔'+audio_create_input_number+'標題 :</label>'+
                                           '<div class="col-md-8 col-sm-8 col-xs-10">'+
                                              '<input id="tm_audio_title'+audio_create_input_number+'" type="text" class="form-control" placeholder="教材名稱請與課文詞彙相同"  required="required" name="audio_title[]">'+
                                           '</div>'+
                                           '<label class="control-label col-md-3 col-sm-3 col-xs-12">上傳音檔'+audio_create_input_number+' :</label>'+
                                           '<input type="file" name="Audio'+audio_create_input_number+'_file"  /><br />'+
                                           '<label id="lb_old_audio'+audio_create_input_number+'" style="display:none;" class="control-label col-md-3 col-sm-3 col-xs-12">原音檔 :</label>'+
                                           '<audio style="display:none;" id="audio_id'+audio_create_input_number+'" controls>'+
                                             '<source id="audio_src'+audio_create_input_number+'" src="" type="audio/mpeg" />'+
                                           '</audio>';


                                  adiv_form.innerHTML = lb;
                                  document.getElementById("audio").appendChild(adiv_form);
                                  document.getElementById("audio_number").value=audio_create_input_number;
                                  }

                        function subInputAudio() {
                                    if(audio_create_input_number>0)
                                      {
                                        _name = 'div_apic'+audio_create_input_number;
                                      document.getElementById(_name).remove();
                                      audio_create_input_number--;
                                      document.getElementById("audio_number").value=audio_create_input_number;
                                      }
                                  }

                        </script>
                        <?php
                        if(isset($_GET['action']))
                        {
                          $audio_no = array();
                          $audio_title = array();
                          $audio_ext = array();
                          $index = 1;
                          $sql = "SELECT * FROM Audio WHERE book_id='$book_id'";
                          if($stmt = $db->query($sql))
                          {
                              while($result = mysqli_fetch_object($stmt))
                              {
                                  $audio_no[$index] = $result->audio_no;
                                  $audio_title[$index] = $result->title;
                                  $audio_ext[$index] = $result->audio_ext;
                                  $index++;
                              }
                          }
                          $audio_count = $index - 1;

                          for($i = 1 ; $i <= $audio_count ; $i++)
                          {
                            echo '<script>';
                            echo 'addInputAudio();';
                            echo 'document.getElementById("tm_audio_title'.$i.'").value="'.$audio_title[$i].'";';
                            echo 'document.getElementById("lb_old_audio'.$i.'").style.display="block";';
                            echo 'document.getElementById("audio_id'.$i.'").style.display="block";';
                            echo 'document.getElementById("audio_src'.$i.'").src="upload/'.$audio_ext[$i].'";';
                            echo '</script>';


                          }


                        }
                        ?>

                        <?php
                        //HIDE ALL BTN
                        if(isset($_GET['action']))
                        {
                          echo '<script>document.getElementById("btn_tm_add").style.display="none";</script>';
                          echo '<script>document.getElementById("btn_tm_sub").style.display="none";</script>';
                          echo '<script>document.getElementById("btn_audio_add").style.display="none";</script>';
                          echo '<script>document.getElementById("btn_audio_sub").style.display="none";</script>';
                        }
                        ?>

                      </div>
                  </div>
                </div>
              </div>

            </div>
                <!-- Cotent -->
          </form>








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
