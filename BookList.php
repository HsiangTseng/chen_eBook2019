<!DOCTYPE html>
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



        <!-- page content################################# -->
        <div class="right_col" role="main">

                <!-- Content -->
                <div class="x_panel">
                  <div class="x_title">
                    <h1><strong>電子書列表</strong></h1>
                    <div class="clearfix"></div>
                  </div>

                  <!--BookList Table-->
                  <table id="b_list" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>編號</th>
                        <th>主標題</th>
                        <th>副標題</th>
                        <th>編輯老師</th>
                        <th>出題時間</th>
                        <th>閱讀</th>
                      </tr>
                    </thead>
                    <?php
                      include("connects.php");
                      $sql = "SELECT MAX(book_id) AS max FROM Book";
                      $result = mysqli_fetch_object($db->query($sql));
                      $book_numbers = $result->max;
                      //echo $book_numbers;
                      $book_id = array();
                      $main_title = array();
                      $sub_title = array();
                      $edit_teacher = array();
                      $create_date = array();
                      for ($i = 1 ; $i <= $book_numbers ; $i++)
                      {
                        $sql2 = "SELECT * FROM `Book` WHERE `book_id` = $i ";
                        $result2 = mysqli_fetch_object($db->query($sql2));
                        $book_id[$i] = $result2->book_id;
                        $main_title[$i] = $result2->main_title;
                        $sub_title[$i] = $result2->sub_title;
                        $edit_teacher[$i] = $result2->edit_teacher;
                        $create_date[$i] = $result2->create_date;
                        $book_id_to_json =json_encode((array)$book_id);
                        $main_title_to_json=json_encode((array)$main_title);
                        $sub_title_to_json=json_encode((array)$sub_title);
                        $edit_teacher_to_json=json_encode((array)$edit_teacher);
                        $create_date_to_json=json_encode((array)$create_date);
                      }
                    ?>
                    <tbody>
                      <tr>
                        <?php
                        echo '<td>'.$book_id[1].'</td>';
                        echo '<td>'.$main_title[1].'</td>';
                        echo '<td>'.$sub_title[1].'</td>';
                        echo '<td>'.$edit_teacher[1].'</td>';
                        echo '<td>'.$create_date[1].'</td>';
                        echo '<td><button type="submit" class="btn btn-success" onclick="btnclk(1)">閱讀</button></td>';
                        ?>
                      </tr>
                    </tbody>
                  </table>
                  <!--BookList Table-->

                </div>
                <!-- Content -->



        </div>
        <!-- page content################################# -->


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

            <script type="text/javascript" class="init">
                $('#b_list').dataTable( {
                  "columns": [
                    { "width": "5%" },
                    { "width": "25%" },
                    { "width": "25%" },
                    { "width": "15%" },
                    { "width": "20%" },
                    { "width": "5%" },
                  ],
                  "columnDefs": [
                    { targets: '_all',  className: 'dt-body-center'},
                    { targets: '_all',  className: 'dt-head-center'},
                  ]
                } );

                function btnclk(b_index)
                {
                  var index = b_index;
                  window.location.href = 'ReadBook.php?book_id='+index+'&page=1';
                }

                $(document).ready
                (
                    function()
                        {
                          var bookidFromPHP=<? echo $book_id_to_json ?>;
                          var maintitleFromPHP=<? echo $main_title_to_json ?>;
                          var subtitleFromPHP=<? echo $sub_title_to_json ?>;
                          var editteacherFromPHP=<? echo $edit_teacher_to_json ?>;
                          var createtimeFromPHP=<? echo $create_date_to_json ?>;

                          var t = $('#b_list').DataTable();
                          for (var i=2 ; i<= <?php echo "$book_numbers";?> ; i++)
                          {
                            t.row.add(
                            [
                            bookidFromPHP[i],
                            maintitleFromPHP[i],
                            subtitleFromPHP[i],
                            editteacherFromPHP[i],
                            createtimeFromPHP[i],
                            "<button type=\"submit\" class=\"btn btn-success\" onclick=\"btnclk("+i+")\">閱讀</button>",
                            ]).draw(false);
                          }
                        }

                );
            </script>
  </body>
</html>
