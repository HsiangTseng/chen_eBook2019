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

<?php
  $media_word = ["用水果擠榨出來的汁液，或以水果汁液做成的飲料。如檸檬汁、葡萄汁等。",
  "冰箱（又稱電冰箱，香港稱冰箱中國大陸稱冰櫃，家用稱冰箱，日本和韓國的漢字皆稱其為冷藏庫，朝鮮在文化語譯法為冷凍機）是以低溫保存食物等物品的機械設備。 工業用冰箱適用於工業環境，如餐廳、食品加工和超級市場。",
  "水壺，是一種盛水的容器。有很多種材質，可以指燒水用的金屬壺，也可以指便于攜帶的飲用水壺，主要分為五大類：1、塑料的（主要材料）2、不銹鋼的3、鋁合金的4、陶瓷的5、其它材質。",
  "指的是一種在小紙杯或者鋁杯中烘烤的蛋糕，和蘋果派並列為美國最具代表性的甜點之一，由於杯子蛋糕上的花紋圖案可以千變萬化、而且做法極其簡單，因此在全世界各地都廣為流行。"];
  $media_picture = ["juice.webp","refrigerator.jpg","kettle.jpg","cupcake.jpeg"];
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
              <div class="col-md-9">
                <div class="x_panel" style="height:91vh;">
                  <div class="x_title">
                    <h2><b>課文內容</b></h2>
                      <!-- Start pagination-->
                        <div class="pagination" style="margin:0px auto;">
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
                      <!--small>此處可放入備註、作者等相關資料</small-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-10 col-lg-10 col-sm-7">
                      <!-- Strat Blockquote -->
                      <blockquote class="blockquote2">
                        <p class="book_title">
                          主題：家庭生活
                        </p>

                        <p class="book_title">
                          第一單元：假日的樂趣
                        </p>
                        <br />
                        <p class="book_content">
                          高高的桌上有個盒子，我跑去問：「媽媽，你買什麼?」<br />
                          媽媽打開盒子說：「一個人可以吃一個杯子蛋糕。」<br />
                          爸爸想要喝水，他說：「你可以幫忙倒水嗎?」<br />
                          我跑去幫忙拿水壺，因為水壺放很高，我請姐姐幫忙。<br />
                          媽媽想要喝果汁，她打開冰箱，弟弟跑來說：「我也想要喝果汁。」<br />
                          媽媽打開瓶子倒果汁，弟弟說：「謝謝你!」<br />
                          弟弟吃一口蛋糕，大家笑了，因為他的嘴巴都是奶油。<br />
                          我喜歡假日，因為可以和家人在一起。<br />


</p>
                      </blockquote>
                      <!-- End Blockquote -->

                    </div>

                    <!-- Start Material Block-->
                    <div class="col-md-2 col-lg-2 col-sm-5">
                      <h1><span class="label label-success">補充教材</span></h1>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(0);' style="font-size: 20px; font-family: DFKai-sb;">果汁</a><br>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(1);' style="font-size: 20px; font-family: DFKai-sb;">冰箱</a><br>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(2);' style="font-size: 20px; font-family: DFKai-sb;">水壺</a><br>
                          <i class="fas fa-book fa-2x"></i><a href="#" onclick='Show_media(3);' style="font-size: 20px; font-family: DFKai-sb;">杯子蛋糕</a><br>
                    </div>
                    <!-- End Material Block-->


                    <!-- Start Exercise Block-->
                    <div class="col-md-2 col-lg-2 col-sm-5">
                      <h1><span class="label label-info">課堂練習</span></h1>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習1</a><br>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習2</a><br>
                          <i class="fas fa-pencil-alt fa-2x"></i><a href="#" style="font-size: 20px; font-family: DFKai-sb;">短句練習3</a><br>
                    </div>
                    <!-- End Exercise Block-->
                    <script>
                      function Show_media(index)
                      {
                        //conver the php array to javascript array.
                        <?php
                          $js_media_content = json_encode($media_word);
                          echo "var media_content = ".$js_media_content.";\n";

                          $js_media_picture = json_encode($media_picture);
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
            <div class="col-md-3">
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
            <div class="col-md-3">
              <div class="x_panel" style="height:25vh;">
                <div class="x_title">
                  <h2>媒體庫 </h2>
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
