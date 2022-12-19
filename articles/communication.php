<?php
	include '../include/connectdb.php';
	include '../include/functions.php';
	include '../include/header.php';
?>

<div class="container container-blogpost">
	<div class="row">
<!---------------------------------------breadcrumb------------------------>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="../main.php">Главная</a></li>
			    <li class="breadcrumb-item active">Связь, телекоммуникации</li>
			  </ol>
			</nav>		    
<!------------------------------ blogpost --------------------------->
		<div class="col-lg-8 blogpost">
	<?php 
		//$page = isset($_GET['page']) ? $_GET['page']: 1;
		if(!isset($_GET['page'])) $page = 1; else $page = htmlspecialchars($_GET['page']);
		if(ctype_digit($page) == false) $page = 1;
		$limitc = 5;
		$offsetc = $limitc * ($page - 1);
		$posts_communications = get_posts_communications($limitc, $offsetc);
		
		
		$sql = "SELECT COUNT(*) FROM articles WHERE id_categories = 5 AND status = 1";
    	$result = mysqli_query($link, $sql);
    	$rows = mysqli_fetch_row($result);
    	$total_rows = $rows[0];
    	$total_pages = ceil($total_rows / $limitc);
    	if((int)$page > $total_pages) $offsetc = 1;
    	//if($page > $total_pages)
    		//$page=1;
    		//header("Location:/allposts.php?page=1");
    	
	?>
	<?php $posts_communications = get_posts_communications($limitc, $offsetc); ?>
	<?php foreach ($posts_communications as $posts_communication): ?>
      		<div class="blogpost__content blogcontent" style="border-left: 2px solid <?=$posts_communication['color'] ?>;">
				<a href="posts.php?id=<?=$posts_communication['id'] ?>&id_categories=<?=$posts_communication['id_categories'] ?>"><h3><?=$posts_communication['title'] ?></h3></a>
    		  	<div class="blogpost__content-text">
					<div class="blogpost__content-text-ul">
						<?=$posts_communication['description'] ?>
					</div>
    		  	</div>
    		  	<div class="blogpost__content-publication">
      				<ul class="publication__content">
      					<li class="publication__content__item publication__content__item-img"> <?=$posts_communication['display_name']  ?></li>
      					<li class="publication__content__item publication__content__item-date"> <?=$posts_communication['date'] ?></li>
      					<li class="publication__content__item publication__content__item-category"><a href="<?=$posts_communication['files'] ?>"> <?=$posts_communication['name'] ?></a></li>
      				</ul>
    		  	</div>	
      		</div>
		<hr class="blogpost__content-hr">
    <?php endforeach; ?>	
		  <!-- Pagination -->
		<nav aria-label="Page navigation example"><!-- это из bootstrap -->
			<ul class="pagination">

				<?php foreach(range(1, $total_pages) as $p) : ?>
					<li class="page-item<?php if($p==$page){echo ' active';} ?>">
						<a class="page-link" href="?page=<?= $p; ?>"><?= $p; ?></a>
					</li>
				<?php endforeach; ?>

			</ul>
		</nav>
    	
		</div><!-- /.col-lg-8 -->
<!----------------------------- blogwidget -------------------------->
		<div class="col-lg-4 blogwidget">
			<div class="blogwidget__category blogcontent">
				<div class="blogwidget__category-title">
					<span>Наименование</span>
				</div>
				<div class="blogwidget__category-item item">
					<ul class="item__blog">
						<?php $categories = get_categories(); ?>
						<?php foreach ($categories as $category): ?>
								<li class="item__blog-li">
									<a href="<?=$category['files'] ?>"><?=$category['name'] ?></a>
									<!--<span>0</span>-->
								</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div> <!-- /.col-lg-4 -->
	</div> <!-- /.row -->
</div> <!-- /.container -->

<?php
	include '../include/footer.php';
?>