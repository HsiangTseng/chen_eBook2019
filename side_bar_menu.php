<?php

function side_bar()
{
	$bar = '<li><a href="MakeBook.php"><i class="fas fa-book fa-2x" aria-hidden="true"></i> 新增電子書 </a></li>
    	    <li><a href="BookList.php"><i class="fas fa-list-ol fa-2x" aria-hidden="true"></i> 電子書列表 </a></li>
					<li><a href="MakeQuestion.php"><i class="fas fa-edit fa-2x" aria-hidden="true"></i> 出題 </a></li>
					<li><a href="QuestionList.php"><i class="fas fa-book fa-2x" aria-hidden="true"></i> 題庫 </a></li>';
	return $bar;
}

?>
