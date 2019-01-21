<?php
    /* 
 * You are free for make it better @author everyone that love shared
 
 */
require_once './_config.php';
include './_header.php';
error_reporting(E_ERROR);



/*******PAGINATION CODE STARTS*****************/
if (!(isset($_GET['pagenum']))) {
  $pagenum = 1;
} else {
  $pagenum = $_GET['pagenum'];
}
$page_limit = ($_GET["show"] <> "" && is_numeric($_GET["show"]) ) ? $_GET["show"] :2;


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
	  
			<br>
	  <a href="index.php" class="button small primary color4"><?php echo $text[$lang]['bt_home']; ?></a><br>
			    <?php if (count($results) > 0) { ?>
				<h4><?php echo $text[$lang]['title_home']; ?></h4>
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
            <button class="button small"><?php echo $text[$lang]['bt_search']; ?></button>
			<a href="_edit_word.php" class="button small"><?php echo $text[$lang]['bt_add_new_word']; ?></a><br>
			<p><?php echo $text[$lang]['lb_records']; ?> : <?php echo $total_count; ?></p>  
			<div class="copyright">&copy;lebestation</div>
			<a href="http://bhns.com.br">BHNS</a>
			<!-- <?php echo $last_consult_sql; ?><br> 
			 <?php echo $sql ; ?><br> -->
            </form>

 	    </div>
		</div>


		 <div class="class=inner columns divided">

			<div class="span-3-25"><br>   <br>   
				<h2 class="major"><?php echo $text[$lang]['bt_class']; ?></h2>
                <p><?php echo $text[$lang]['text_home']; ?></p>				
		        <button title="<?php echo $text[$lang]['lb_number_1']; ?>" alt="<?php echo $text[$lang]['lb_number_1']; ?>"class="button small"><?php echo $text[$lang_]['lb_number_1']; ?></button>
			
			
			
			
			
			<!--<table  class="alt">
												<thead>
													<tr>
													   <th>Praticar</th>
				                                      <th>Category</th>
                                                      <th>Translate</th>
				                                      <th>Picture</th>
													</tr>
												</thead>
												<tbody>

                <tr>
				  <td><h4> <?php echo $res["word_name"]; ?></h4></td>
				  <td><?php echo $res["category_word"]; ?></td>
                  <td><?php echo $res["type_name"]; ?></td>
              <?php echo $res["email_address"]; ?></td>
				  <td>
                <?php $pic = ($res["word_pic"] <> "" ) ? $res["word_pic"] : "no_pic.png" ?>
                    <a href="word_pics/<?php echo $pic ?>" target="_blank"><img src="word_pics/<?php echo $pic ?>" alt="" width="50" height="50" ></a> </td>

                </tr>
				 <tr>
				 <td><a href="_words.php?cid=<?php echo $res["word_id"]; ?>" class="button small">View</a></td>
				  <td><a href="_edit_word.php?m=update&cid=<?php echo $res["word_id"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" class="button small">Edit</a></td>
				  <td><a href="_main_.php?mode=delete&cid=<?php echo $res["word_id"]; ?>&keyword=<?php echo $_GET["keyword"]; ?>&pagenum=<?php echo $_GET["pagenum"]; ?>" onclick="return confirm('Are you sure?')" class="button small">Delete</a> </td>
				  </tr>

												</tbody>
												<tfoot>


													<tr>
														<td colspan="2"></td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>-->
	                                </div>
									
						




			</div>
			
						
						
						
						<div class="intro color4">
						       <div class="span-1-5">
										<ul class="icons">
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
											<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
										</ul>
									</div>
									<p><?php echo $text[$lang]['filename'] . $_SERVER['PHP_SELF']; ?></p>
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