<?php
    /* 
 * You are free for make it better @author everyone that love shared
 
 */
require_once './_config.php';
include './_header.php';
/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] : 10;


try {
  $keyword = trim($_GET["keyword"]);
  if ($keyword <> "" ) {
    $sql = "SELECT * FROM main_words WHERE 1 AND "
            . " (word_name LIKE :keyword) ORDER BY word_name ";
    $check_ = $DB->prepare($sql);
    
    $check_->bindValue(":keyword", $keyword."%");
    
  } else {
    $sql = "SELECT * FROM main_words WHERE 1 ORDER BY word_name ";
    $check_ = $DB->prepare($sql);
  }
  
  $check_->execute();
  $total_count = count($check_->fetchAll());

  $last = ceil($total_count / $page_limit);

  if ($pagenum < 1) {
    $pagenum = 1;
  } elseif ($pagenum > $last) {
    $pagenum = $last;
  }

  $lower_limit = ($pagenum - 1) * $page_limit;
  $lower_limit = ($lower_limit < 0) ? 0 : $lower_limit;


  $sql2 = $sql . " limit " . ($lower_limit) . " ,  " . ($page_limit) . " ";
  
  $check_ = $DB->prepare($sql2);
  
  if ($keyword <> "" ) {
    $check_->bindValue(":keyword", $keyword."%");
   }
   
  $check_->execute();
  $results = $check_->fetchAll();
} catch (Exception $ex) {
  echo $ex->getMessage();
}
/*******PAGINATION CODE ENDS*****************/
?>



<!-- Panel -->
<section class="panel color4-alt" id="view_word">

    <div class="panel panel-primary">
      <div class="intro color4">
	  <a href="index.php" class="button small primary color4"><?php echo $text[$lang]['bt_home']?></a><br>
			    <?php if (count($results) > 0) { ?>
				<h4><?php echo $text[$lang]['bt_search']?></h4>
																		<?php if ($ERROR_MSG <> "") { ?>
    <div id="wrapper<?php echo $ERROR_TYPE ?>">
     <!-- <button data-dismiss="alert" class="close" type="button">×</button>-->
      <p><?php echo $ERROR_MSG; ?></p>
    </div>
<?php } ?>

		<div class="field half">
			<form action="_search.php" method="get" >

          <span class="pull-left">
		  <!--Botoes pesquisar e adiconar-->
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="<?php echo $text[$lang]['lb_tips']; ?>" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>
            <button class="button small"><?php echo $text[$lang]['bt_search']?></button>
			<a href="_edit_word.php" class="button small"><?php echo $text[$lang]['bt_add_new_word']?></a><br><br>
			<p><?php echo $text[$lang]['lb_records']?> : <?php echo $total_count; ?><br>
			<div class="copyright">&copy;lebestation</div>
			<a href="http://bhns.com.br">BHNS</a>
            </form>

 	    </div>
		</div>


		 <div class="class=inner columns divided">

			<div class="span-3-25">
			<table  class="alt">
												<thead>
													<tr>
													  <th><?php echo $text[$lang]['lb_word']?></th>
				                                      <th><?php echo $text[$lang]['lb_category']?></th>
                                                      <th><?php echo $text[$lang]['lb_translate']?></th>
				                                      <th><?php echo $text[$lang]['lb_picture']?></th>
													</tr>
												</thead>
												<tbody>
 <?php foreach ($results as $res) { ?>
                <tr>
				  <td><h4> <?php echo $res["word_name"]; ?></h4></td>
				  <td><?php echo $res["category_word"]; ?></td>
                  <td><?php echo $res["type_name"]; ?></td>
                  <!--<td><?php echo $res["email_address"]; ?></td>-->
				  <td>
                <?php $pic = ($res["word_pic"] <> "" ) ? $res["word_pic"] : "no_pic.png" ?>
                    <a href="word_pics/<?php echo $pic ?>" target="_blank"><img src="word_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a> </td>

                </tr>
				 <tr>
				 <td><a href="_words.php?cid=<?php echo $res["word_id"]; ?>" class="button small"><?php echo $text[$lang]['bt_view']?></a></td>
				  <td><a href="_edit_word.php?m=update&cid=<?php echo $res["word_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" class="button small"><?php echo $text[$lang]['bt_edit']?></a></td>
				   <td><a href="_edit_word.php?m=update&cid=<?php echo $res["word_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" class="button small"><?php echo $text[$lang]['bt_copy']?></a></td>
				  <td><a href="_main_.php?mode=delete&cid=<?php echo $res["word_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')" class="button small"><?php echo $text[$lang]['bt_delete']?></a> </td>
				  </tr>

				 <?php } ?>
												</tbody>
												<tfoot>


													<!--<tr>
														<td colspan="2"></td>
														<td>100.00</td>-->
													</tr>
												</tfoot>
											</table>
	                                </div>
									
						




			</div>
			
						
						
						
						<div class="intro color4">
										<ul class="contact-icons color1">
											<li class="icon fa-twitter"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-facebook"><a href="#">facebook.com/untitled</a></li>
											<li class="icon fa-snapchat-ghost"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-instagram"><a href="#">@untitled-tld</a></li>
											<li class="icon fa-medium"><a href="#">medium.com/untitled</a></li>
										</ul>
									</div>
									

    </div>
  
</section>

          <?php } else { ?>

		   <div class="span-2-75">
			<p>	  No words found</p>
          <span class="pull-left">

		  <!--Botoes pesquisar e adiconar-->
		  <form action="_search.php" method="get" >
            <label class="col-lg-12 control-label" for="keyword" style="padding-right: 0;">
              <input type="text" value="<?php echo $_GET["keyword"]; ?>" placeholder="Search by word name" id="" class="form-control" name="keyword" style="height: 41px;">
            </label>
            </span>        
			<button class="button small">Search</button>
			<a href="_edit_word.php" class="button small">Add New Word</a>
			<a href="index.php" class="button small primary color4">Home</a>
			 </form>
									
        </div>

<?php } ?>






      <?php
      include './_footer.php';
      ?>