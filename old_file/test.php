<!DOCTYPE html>
<?php
$main_title = $_POST['main_title'];
$sub_title = $_POST['sub_title'];
$edit_teacher = $_POST['edit_teacher'];
$page = $_POST['page'];
//echo $main_title.'-'.$sub_title.'-'.$edit_teacher.'-'.$page;
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
                  /*include("side_bar_menu.php");
                  echo side_bar();*/
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

            <!-- Cotent -->
            <form class="form-horizontal form-label-left input_mask" method="post" action="updateBookData.php" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>編輯封面及內文頁</strong></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">主標題 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="main_title" value="<?php echo $main_title;?>" required="required" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">副標題 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="sub_title" value="<?php echo $sub_title;?>" required="required" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">編書老師 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="edit_teacher" value="<?php echo $edit_teacher;?>" required="required" readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">頁數 :</label>
                        <div class="col-md-8 col-sm-8 col-xs-10">
                          <input type="text" class="form-control" name="page" value="<?php echo $page;?>" required="required" readonly>
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                      <!-- Content Block -->
                      <?php
                      for ($i=1 ; $i <= $page ; $i++)
                      {
                        echo '<div class="form-group">';
                        echo '<label class="control-label col-md-3 col-sm-3 col-xs-12">第'.$i.'頁</label>';
                        echo '<div class="col-md-8 col-sm-8 col-xs-12">';
                          echo '<textarea name="content[]" class="form-control" rows="5" wrap="off" maxlength="200"></textarea>';
                        echo '</div>';
                        echo '</div>';
                        //echo '<div class="ln_solid"></div>';

                      }
                      ?>




                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" id="btn_submit" class="btn btn-success">完成編輯</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>編輯教材</strong></h1>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="form-horizontal form-label-left">
                        <div class="form-group">
                          <label class="control-label col-md-3" for="first-name">增減教材數量 : </label>
                          <button type="button" class="btn btn-success" onclick="addInputPic()">+</button>
                          <button type="button" class="btn btn-danger" onclick="subInputPic()">-</button>
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
                                              '<input type="text" class="form-control" name="material_name[]">'+
                                           '</div>'+
                                           '<label class="control-label col-md-3 col-sm-3 col-xs-12">上傳教材'+material_create_input_number+'圖檔 :</label>'+
                                           '<input type="file" name="A'+material_create_input_number+'_file" required /><br />'+
                                           '<label class="control-label col-md-3 col-sm-3 col-xs-12">教材'+material_create_input_number+'說明 :</label>'+
                                           '<div class="col-md-8 col-sm-8 col-xs-10">'+
                                              '<textarea name="material_content[]" class="form-control" rows="5" wrap="off" maxlength="200"></textarea>'+
                                           '</div>';

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

                        </script>


                      </div>
                  </div>
                </div>
              </div>

            </div>
          </form>
                <!-- Cotent -->







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
