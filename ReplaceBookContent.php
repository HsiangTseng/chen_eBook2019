<?php
    include("connects.php");

    $replaceType = $_POST['replaceType'];
    $book_id = $_POST['book_id'];
    $page_no = $_POST['page_no'];

    $sql2 = "SELECT * FROM `Page` WHERE `book_id` = $book_id AND `page_no` = $page_no ";
    $result2 = mysqli_fetch_object($db->query($sql2));
    $content = $result2->content;


    //GET THE MATERIAL DATA
    $material_title = array();
    $sql3 = "SELECT * FROM `TeachMaterial` WHERE `book_id` = $book_id";
    if($stmt = $db->query($sql3))
    {
        $material_index = 0;
        while($result3 = mysqli_fetch_object($stmt))
        {
          $material_title[$material_index]=$result3->title;
          $material_index++;
        }
    }

    $audio_title = array();
    $sql4 = "SELECT * FROM `Audio` WHERE `book_id` = $book_id";
    if($stmt = $db->query($sql4))
    {
       $audio_index = 0;
       while($result4 = mysqli_fetch_object($stmt))
       {
         $audio_title[$audio_index]=$result4->title;
         $audio_index++;
       }
    }




    if($replaceType=='M')
    {
      $output_content=$content;
      //REPLACE THE WORD TO MATERIAL'URL
      foreach ($material_title as $key => $value) {
        //REPLACE THE WORD TO MATERIAL'URL
        $old_word = $material_title[$key];
        $url_word = '<a href="javascript: void(0)" style="color:red;" onclick="Show_media('.$key.')">'.$old_word.'</a>';
        $output_content = str_replace($old_word,$url_word,$output_content);
      }
    }

    if($replaceType=='A')
    {
      $output_content=$content;
      //REPLACE THE WORD TO MATERIAL'URL
      foreach ($audio_title as $key => $value) {
        //REPLACE THE WORD TO MATERIAL'URL
        $old_word = $audio_title[$key];
        $url_word = '<a href="javascript: void(0)" style="color:red;" onclick="Show_Audio('.$key.')">'.$old_word.'</a>';
        $output_content = str_replace($old_word,$url_word,$output_content);
      }
    }

    echo $output_content;


?>
