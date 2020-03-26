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
            p1{
              color: black;
              font-size: 28px;
              font-family: DFKai-sb;
              line-height: 40px;
              word-wrap: break-word;
              word-break: break-all;
              background-color: #FFFFFF;
            }
            .media_content{
              color: black;
              font-size: 20px;
              font-family: DFKai-sb;
              word-wrap: break-word;
              word-break: break-all;
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
            <?php
            //GET THE TITLE AND Content
            $sql = "SELECT * FROM `Book` WHERE `book_id` = $book_id ";
            $result = mysqli_fetch_object($db->query($sql));
            $main_title = $result->main_title;
            $sub_title = $result->sub_title;
            ?>
            <div class="row">
              <!-- LEFT HALF BLOCK-->
              <div class="col-md-8" id="div_content">
                <div class="x_panel" style="height:91vh;">
                  <div class="x_title">
                    <h2 id="title-bar"><b><? echo $main_title.'-'.$sub_title.'&nbsp&nbsp&nbsp&nbsp'?></b></h2>
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

                           <?php

                           //GET THE TITLE AND Content
                           $sql = "SELECT * FROM `Book` WHERE `book_id` = $book_id ";
                           $result = mysqli_fetch_object($db->query($sql));
                           $main_title = $result->main_title;
                           $sub_title = $result->sub_title;

                           $sql2 = "SELECT * FROM `Page` WHERE `book_id` = $book_id AND `page_no` = $page ";
                           $result2 = mysqli_fetch_object($db->query($sql2));
                           $content = $result2->content;
                           $background_image = "";
                           $background_image = $result2->picture_ext;

                           //GET THE MATERIAL DATA
                           $material_title = array();
                           $material_img = array();
                           $material_video = array();
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
                                 $material_video[$material_index]=$result3->video;
                                 $material_index++;
                               }
                           }

                          //GET THE AUDIO DataTable
                          $audio_title = array();
                          $audio_ext = array();
                          $sql4 = "SELECT * FROM `Audio` WHERE `book_id` = $book_id";
                          if($stmt = $db->query($sql4))
                          {
                              $audio_index = 0;
                              while($result4 = mysqli_fetch_object($stmt))
                              {
                                $audio_title[$audio_index]=$result4->title;
                                $audio_ext[$audio_index]=$result4->audio_ext;

                                $audio_index++;
                              }
                          }



                           ?>
                        </div>

                       <script type="text/javascript">

                         function hide()
                         {
                           document.getElementById("div_media").style.display = "none";
                           document.getElementById("div_practice").style.display = "none";
                           document.getElementById("div_content").classList.add('col-md-12');
                           document.getElementById("div_content").classList.remove('col-md-8');
                         }
                         function show()
                         {
                           document.getElementById("div_media").style.display = "block";
                           document.getElementById("div_practice").style.display = "block";
                           document.getElementById("div_content").classList.add('col-md-8');
                           document.getElementById("div_content").classList.remove('col-md-12');
                         }
                         function font_big()
                         {
                           var bookcontent = document.getElementById("content");
                           var control_style = window.getComputedStyle(bookcontent,null).getPropertyValue('font-size');
                           var fontSize = parseFloat(control_style);
                           bookcontent.style.fontSize = (fontSize + 3) + 'px';
                         }

                         function font_small()
                         {
                           var bookcontent = document.getElementById("content");
                           var control_style = window.getComputedStyle(bookcontent,null).getPropertyValue('font-size');
                           var fontSize = parseFloat(control_style);
                           bookcontent.style.fontSize = (fontSize - 3) + 'px';
                         }
                         function font_opacity_off()
                         {
                           document.getElementById("content").style.opacity = "0";
                         }
                         function font_opacity_on()
                         {
                           document.getElementById("content").style.opacity = "1";
                         }
                         function ReplaceMeterialJS()
                         {
                           var book_id = <?php echo $book_id;?>;
                           var page_no = <?php echo $page;?>;
                           $.ajax
                                (
                                   {
                                   type: "POST",
                                   url: "ReplaceBookContent.php",
                                   dataType:"text",
                                   data: { replaceType:'M',book_id:book_id, page_no:page_no  },
                                   success:function(msg)
                                     {
                                       document.getElementById('content').innerHTML=msg;
                                     }
                                   }
                                )
                         }
                         function ReplaceAudioJS()
                         {
                           var book_id = <?php echo $book_id;?>;
                           var page_no = <?php echo $page;?>;
                           var now_content = document.getElementById('content').innerHTML;
                           $.ajax
                                (
                                   {
                                   type: "POST",
                                   url: "ReplaceBookContent.php",
                                   dataType:"text",
                                   data: { replaceType:'A',book_id:book_id, page_no:page_no  },
                                   success:function(msg)
                                     {
                                       document.getElementById('content').innerHTML=msg;
                                     }
                                   }
                                )
                         }


                       </script>
                      <!-- End pagination-->
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content"  >
                    <div class="col-md-12 col-lg-12 col-sm-7" style="background-image: url('<? echo 'upload/'.$background_image;?>'); height:80vh; background-size: contain; background-repeat:no-repeat;">

                      <!-- Strat Blockquote -->
                      <p1 id="content" class="book_content" style="white-space: pre-wrap;"><?php echo $content;?></p1>
                      <!-- End Blockquote -->

                    </div>

                    <script>
                      function Show_media(index)
                      {
                        //conver the php array to javascript array.
                        <?php
                          $js_media_content = json_encode($material_content);
                          echo "var media_content = ".$js_media_content.";\n";

                          $js_media_picture = json_encode($material_img);
                          echo "var media_picture = ".$js_media_picture.";\n";

                          $js_media_video = json_encode($material_video);
                          echo "var media_video = ".$js_media_video.";\n";
                        ?>

                        document.getElementById('media_content').innerHTML=media_content[index];
                        document.getElementById('media_picture').src=media_picture[index];

                        document.getElementById("material_block").style.display = "block";
                        document.getElementById("audio_block").style.display = "none";
                        if(media_video[index].length>3){
                          document.getElementById("video_frame").style.display = "block";
                          var video = document.getElementById('material_video_id');
                          document.getElementById('media_video_source').src=media_video[index];
                          video.load();
                        }
                        else {
                          document.getElementById("video_frame").style.display = "none";
                        }

                        if(media_picture[index].length>3){
                          document.getElementById('pic_frame_div_id').style.display = "block";
                        }
                        else {
                          document.getElementById('pic_frame_div_id').style.display = "none";
                        }
                      }

                      function Show_Audio(index)
                      {
                        <?php
                        $js_audio_title = json_encode($audio_title);
                        echo "var audio_title = ".$js_audio_title.";\n";

                        $js_audio_ext = json_encode($audio_ext);
                        echo "var audio_ext = ".$js_audio_ext.";\n";
                        ?>
                        document.getElementById('pic_frame_div_id').style.display = "none";
                        document.getElementById("video_frame").style.display = "none";
                        document.getElementById("material_block").style.display = "none";
                        document.getElementById("audio_block").style.display = "block";

                        document.getElementById('audio_title').innerHTML=audio_title[index];
                        document.getElementById('audio_src').src="upload/"+audio_ext[index];
                        var audio = document.getElementById('audio_id');
                        audio.load();
                      }

                      function Open_Material()
                      {
                          document.getElementById("audio_block").style.display = "none";
                          document.getElementById("material_block").style.display = "block";
                      }
                      function Open_Audio()
                      {
                        document.getElementById("audio_block").style.display = "block";
                        document.getElementById("material_block").style.display = "none";
                      }
                    </script>

                    <input type="button" class="btn-info" onclick="font_opacity_off()" value="隱藏" style="float: left; font-size:20px;">
                    <input type="button" class="btn-info" onclick="font_opacity_on()" value="顯示" style="float: left; font-size:20px;">
                    <input type="button" class="btn-info" onclick="font_big()" value="字大" style="float: left; font-size:20px;">
                    <input type="button" class="btn-info" onclick="font_small()" value="字小" style="float: left; font-size:20px;">
                    <input type="button" class="btn-info" onclick="ReplaceMeterialJS()" value="教材" style="float: left; font-size:20px;">
                    <input type="button" class="btn-info" onclick="ReplaceAudioJS()" value="音檔" style="float: left; font-size:20px;">
                    <div class="clearfix">



                  </div>
                </div>
              </div>
            </div>

            <!-- RIGHT HALF BLOCK-->
            <div class="col-md-4" id="div_media">
              <div class="x_panel" style="height:65vh;">
                <div class="x_title">
                  <h2><b>補充教材</b></h2>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div id="material_block" class="col-md-12 col-lg-12 col-sm-12">
                    <P id="media_content" class="media_content">
                    </P>
                    <div class="pic_frame" id="pic_frame_div_id">
                      <img id="media_picture" src="" class="pic" />
                    </div>
                    <div id="video_frame" style="display:none;">
                      <video id="material_video_id" width="320" height="240" controls>
                        <source id="media_video_source" src="" type="video/mp4" />
                      </video>
                    </div>
                  </div>
                  <div id="audio_block" class="col-md-12 col-lg-12 col-sm-12" style="display:none;">
                      <div class="form-group">
                        <p id="audio_title">Ttile</p>
                        <audio id="audio_id" controls>
                          <source id="audio_src" src="" type="audio/mpeg" />
                        </audio>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4" id="div_practice">
              <div class="x_panel" style="height:25vh;overflow:auto;">
                <div class="x_title">
                  <h2><b>課堂練習</b></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-12 col-lg-12 col-sm-12">
                      <?php
                        $sql4 = "SELECT question FROM `Book` WHERE `book_id` = $book_id ";
                        $result4 = mysqli_fetch_object($db->query($sql4));
                        $question_str = $result4->question;
                        $question_array = explode("-",$question_str);
                        if($question_array[0]!="")
                        {
                          foreach ($question_array as $key => $value) {
                            $url = 'http://'.$_SERVER['HTTP_HOST'].'/chen_eBook/Exercise.php';//http://XXX.XXX.XXX.XXX/chen_eBook/Exercise.php
                            $url = $url.'?book_id='.$book_id.'&question_no='.$question_array[$key];

                            $sql5 = "SELECT title FROM `Question` WHERE `question_no` = $question_array[$key] ";
                            $result5 = mysqli_fetch_object($db->query($sql5));
                            $q_title = $result5->title;
                            echo '<i class="fas fa-pencil-alt fa-2x"></i><a href="'.$url.'" style="font-size: 20px; font-family: DFKai-sb;">'.$q_title.'</a><br>';
                          }
                        }


                      ?>
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
