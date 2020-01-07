<!DOCTYPE html>

<?php
/*session_start();

if($_SESSION['username'] == null)
{
        header ('location: IRS_Login.php');
        exit;
}
else if ($_SESSION['type']!='T')
{
    header ('location: IRS_Login.php');
    exit;
}*/
?>
<html lang="en">
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

            <!-- JS_SlidShow from w3schools -->
            <link href="../build/css/slideshow.css" rel="stylesheet">


            <style type="text/css">
            .book_content{
              color: black;
              font-size: 30px;
              font-family: DFKai-sb;
            }

            .blockquote2{
              display: block;
              font-size: 15px;
              line-height: 1.4;
              color: #666;
              background-color: #FFFFFF;
              padding: 15px;
              border-left: 5px solid #6CA6CD;
              border-right: 2px solid #6CA6CD;
              box-shadow: 2px 2px 15px #ccc;
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

            .pagination a:hover:not(.active) {background-color: #ddd;}
          </style>

          </head>




  <body class="nav-md">
    <div class="container body">
      <div class="main_container">



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>此處文字未定</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>課文內容 <small>此處可放入備註、作者等相關資料</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-10 col-lg-10 col-sm-7">
                      <!-- Strat Blockquote -->
                      <blockquote class="blockquote2">
                        <p class="book_content">&nbsp;&nbsp;&nbsp;&nbsp;朋友買了一件衣料，綠色的底子帶白色方格，當她拿給我們看時，一位對圍棋十分感與趣的同學說：</p>
                        <p class="book_content">&nbsp;&nbsp;&nbsp;&nbsp;「啊，好像棋盤似的。」</p>
                        <p class="book_content">&nbsp;&nbsp;&nbsp;&nbsp;「我看倒有點像稿紙。」我說。</p>
                        <p class="book_content">&nbsp;&nbsp;&nbsp;&nbsp;「真像一塊塊綠豆糕。」一位外號叫「大食客」的同學緊接著說。</p>
                      </blockquote>
                      <!-- End Blockquote -->

                    </div>

                    <!-- Start Exercise Block-->
                    <div class="col-md-2 col-lg-2 col-sm-5">
                      <h1><span class="label label-info">課堂練習</span></h1>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">棋盤</a><br>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">稿紙</a><br>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">綠豆糕</a><br>
                    </div>
                    <!-- End Exercise Block-->


                    <div class="clearfix">

                    <!-- Start pagination-->
                    <div class="pagination">
                      <a href="#">&laquo;</a>
                      <a class="active" href="#">1</a>
                      <a href="workspace1.php">2</a>
                      <a href="#">3</a>
                      <a href="#">4</a>
                      <a href="#">5</a>
                      <a href="#">6</a>
                      <a href="#">&raquo;</a>
                    </div>
                    <!-- End pagination-->

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>媒體庫 <small>此處可放入備註、作者等相關資料</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-10 col-lg-10 col-sm-7">
                    <!-- Start Slide Show -->
                      <!-- Slideshow container -->
                      <div class="slideshow-container">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides">
                          <div class="numbertext">1 / 3</div>
                          <img src="imga.jpg" style="width:100%">
                        </div>

                        <div class="mySlides">
                          <div class="numbertext">2 / 3</div>
                          <img src="imgb.jpg" style="width:100%">
                        </div>

                        <div class="mySlides">
                          <div class="numbertext">3 / 3</div>
                          <img src="imgc.webp" style="width:100%">
                        </div>

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                      </div>
                      <br>

                      <!-- The dots/circles -->
                      <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                      </div>

                      <script type="text/javascript">
                        var slideIndex = 1;
                        showSlides(slideIndex);

                        // Next/previous controls
                        function plusSlides(n) {
                          showSlides(slideIndex += n);
                        }

                        // Thumbnail image controls
                        function currentSlide(n) {
                          showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                          var i;
                          var slides = document.getElementsByClassName("mySlides");
                          var dots = document.getElementsByClassName("dot");
                          if (n > slides.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = slides.length}
                          for (i = 0; i < slides.length; i++) {
                              slides[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                              dots[i].className = dots[i].className.replace(" active", "");
                          }
                          slides[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " active";
                        }
                      </script>
                    <!-- End Slide Show -->

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>媒體庫 <small>此處可放入備註、作者等相關資料</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-10 col-lg-10 col-sm-7">
                    <!-- Start Audio -->
                    <p> 課文朗讀 ：</p>
                    <audio controls>
                      <source src="mp3-1.mp3" type="audio/mp3">
                    </audio>
                    <audio controls="">
                      <source src="mp3-2.mp3" type="audio/mp3">
                    </audio>

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
