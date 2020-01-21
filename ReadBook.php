<!DOCTYPE html>

<?php
  include("connects.php");
  $book_id = $_GET['book_id'];
  $page = $_GET['page'];
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
            <link href="../build/css/ebook_custom.min.css" rel="stylesheet">

            <!-- JS_SlidShow from w3schools -->
            <link href="../build/css/slideshow.css" rel="stylesheet">


            <style type="text/css">
            .book_title{
              color: black;
              font-size: 50px;
              font-family: DFKai-sb;
              line-height: 40px;
              word-wrap: break-word;
              word-break: break-all;
            }
            .book_content{
              color: black;
              font-size: 30px;
              font-family: DFKai-sb;
              line-height: 40px;
              word-wrap: break-word;
              word-break: break-all;
            }

            .media_content{
              color: black;
              font-size: 20px;
              font-family: DFKai-sb;
              word-wrap: break-word;
              word-break: break-all;
            }

            .blockquote2{
              display: block;
              font-size: 15px;
              line-height: 1.4;
              color: #666;
              background-color: #FFFFFF;
              padding: 15px;
              border-left: 5px solid #008B45;
              border-right: 2px solid #008B45;
              box-shadow: 2px 2px 15px #ccc;
              height: 100%;
            }

            .pagination {
              display: inline-block;
            }

            .pagination a {
              color: black;
              float: left;
              padding: 8px 16px;
              text-decoration: none;
            }

            .pagination a.active {
              background-color: #6CA6CD;
              color: white;
            }

            .pic_frame{
              height: 200px;
              weight: 200px;
              position: relative;
            }

            .pic{
              max-height: 100%;
              max-width: 100%;
              width: auto;
              height: auto;
              position: absolute;
              left : 25%;
            }

            .pagination a:hover:not(.active) {background-color: #ddd;}
          </style>

          </head>




  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!--div class="page-title">
              <div class="title_left">
                <h3>此處文字未定</h3>
              </div>
            </div>

            <div class="clearfix"></div-->

            <div class="row">
              <!-- LEFT HALF BLOCK-->
              <div class="col-md-8">
                <div class="x_panel" style="height:91vh;">
                  <div class="x_title">
                    <h2><b>課文內容 &nbsp&nbsp</b></h2>
                      <!-- Start pagination-->
                        <div class="pagination" style="margin:0px auto;">
                          <?php
                          $sql_page = "SELECT MAX(page_no) AS max FROM Page WHERE book_id = $book_id";
                          $result_page = mysqli_fetch_object($db->query($sql_page));
                          $max_page = $result_page->max;
                          //PAGINATION
                          $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];//http:xxx.xxx.xxx/chen_eBook/ReadBook.php
                          $url = $url.'?book_id='.$book_id;//http:xxx.xxx.xxx/chen_eBook/ReadBook.php?book_id=1

                          for($i = 1 ; $i <= $max_page ; $i++)
                          {
                            if($i==$page)
                            {
                              echo '<a class="active" href="'.$url.'&page='.$i.'">'.$i.'</a>';
                            }
                            else
                            {
                              echo '<a class="" href="'.$url.'&page='.$i.'">'.$i.'</a>';
                            }
                          }
                           ?>
                        </div>
                      <!-- End pagination-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-lg-12 col-sm-7">
                      <!-- Strat Blockquote -->
                      <?php

                      //GET THE TITLE AND Content
                      $sql = "SELECT * FROM `Book` WHERE `book_id` = $book_id ";
                      $result = mysqli_fetch_object($db->query($sql));
                      $main_title = $result->main_title;
                      $sub_title = $result->sub_title;

                      $sql2 = "SELECT * FROM `Page` WHERE `book_id` = $book_id AND `page_no` = $page ";
                      $result2 = mysqli_fetch_object($db->query($sql2));
                      $content = $result2->content;

                      //GET THE MATERIAL DATA
                      $material_title = array();
                      $material_img = array();
                      $material_content = array();
                      $sql3 = "SELECT * FROM `TeachMaterial` WHERE `book_id` = $book_id";
                      if($stmt = $db->query($sql3))
                      {
                          $material_index = 0;
                          while($result3 = mysqli_fetch_object($stmt))
                          {
                            $material_title[$material_index]=$result3->title;
                            $material_content[$material_index]=$result3->content;
                            $material_img[$material_index]=$result3->img;
                            $material_index++;
                          }
                     }

                     //REPLACE THE WORD TO MATERIAL'URL
                     foreach ($material_title as $key => $value) {
                       //REPLACE THE WORD TO MATERIAL'URL
                       $old_word = $material_title[$key];
                       $url_word = '<a href="javascript: void(0)" onclick="Show_media('.$key.')">'.$old_word.'</a>';
                       $content = str_replace($old_word,$url_word,$content);
                     }

                     ?>


                      <blockquote class="blockquote2">
                        <p class="book_title"><?php echo $main_title;?></p>
                        <p class="book_title"><?php echo $sub_title;?></p>
                        <br />
                        <p id="content" class="book_content" style="white-space: pre-wrap;"><?php echo $content;?></p>
                      </blockquote>
                      <!-- End Blockquote -->

                    </div>

                    <!-- Start Material Block-->
                    <!--div class="col-md-2 col-lg-2 col-sm-5">
                      <h1><span class="label label-success">補充教材</span></h1>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(0);' style="font-size: 20px; font-family: DFKai-sb;">果汁</a><br>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(1);' style="font-size: 20px; font-family: DFKai-sb;">冰箱</a><br>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(2);' style="font-size: 20px; font-family: DFKai-sb;">水壺</a><br>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(3);' style="font-size: 20px; font-family: DFKai-sb;">杯子蛋糕</a><br>
                    </div-->
                    <!-- End Material Block-->


                    <!-- Start Exercise Block-->
                    <!--div class="col-md-2 col-lg-2 col-sm-5">
                      <h1><span class="label label-info">課堂練習</span></h1>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習1</a><br>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習2</a><br>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習3</a><br>
                    </div-->
                    <!-- End Exercise Block-->
                    <script>
                      function Show_media(index)
                      {
                        //conver the php array to javascript array.
                        <?php
                          $js_media_content = json_encode($material_content);
                          echo "var media_content = ".$js_media_content.";\n";

                          $js_media_picture = json_encode($material_img);
                          echo "var media_picture = ".$js_media_picture.";\n";
                        ?>
                        document.getElementById('media_content').innerHTML=media_content[index];
                        document.getElementById('media_picture').src=media_picture[index];
                      }
                    </script>


                    <div class="clearfix">



                  </div>
                </div>
              </div>
            </div>

            <!-- RIGHT HALF BLOCK-->
            <div class="col-md-4">
              <div class="x_panel" style="height:65vh;">
                <div class="x_title">
                  <h2><b>補充教材</b></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                    <!--blockquote class="blockquote2"-->
                    <P id="media_content" class="media_content">
                    </P>
                    <div class="pic_frame">
                      <img id="media_picture" src="" class="pic" />
                    </div>
                   <!--/blockquote-->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="x_panel" style="height:25vh;">
                <div class="x_title">
                  <h2><b>課堂練習</b></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                      <!--p> 課文朗讀 ：</p>
                      <audio controls>
                        <source src="mp3-1.mp3" type="audio/mp3">
                      </audio>
                      <audio controls="">
                        <source src="mp3-2.mp3" type="audio/mp3">
                      </audio-->
                      <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習1</a><br>
                      <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習2</a><br>
                      <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習3</a><br>

                  </div>
                </div>
              </div>
            </div>
          </div>


          </div>


        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!--footer>
        <!--/footer>
        <!-- /footer content -->


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
