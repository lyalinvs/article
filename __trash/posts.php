<?php
  include '../include/connectdb.php';
  include '../include/header.php';
  $page = $_GET['id'];
  $resulttitleblog = mysqli_query($connect, "SELECT articles.title, categories.name FROM articles, categories WHERE articles.id_categories=categories.id ORDER BY articles.date DESC");
  $resulttext = mysqli_query($connect, "SELECT articles.title, articles.blog, categories.name FROM articles, categories WHERE articles.id='$page' AND articles.id_categories=categories.id");
?>

<div class="container">
  <div class="row">
    <div class="col-lg-8">
		<div class="blogcontent__content content-body blogcontent">
			<?php
				while ($rt = mysqli_fetch_assoc($resulttext))
				{
			?>
			<a href="#"><h3><?php echo $rt['name']; ?></h3></a>
			<hr>
				<div class="blogcontent__content-title">
					<h1>
            <?php
                echo $rt['title'];
            ?>
          </h1>
				</div>
				<div class="blogcontent__content-text"> <!-- page__blog-text -->
            <?php
                echo $rt['blog'];
              }
            ?>
				</div>
			<hr> <!-- hr-blog -->
		
		
		  <!-- Pagination -->
		  <div class="blogpost__pagenav pagenav">
        <ul class="pagenav__nav">
          <li class="page-nav">
        	  <a href="#">&larr; Предыдущее</a>
          </li>
          <li class="page-nav">
            <a href="#">Следующее &rarr;</a>
          </li>
        </ul>
		  </div>		
		</div>
    </div> <!-- /.col-lg-8 -->
	
    <!-- Sidebar Widgets Column -->
    <div class="col-lg-4 blogwidget">
        <div class="blogwidget__category blogcontent">
			<div class="blogwidget__category-title">
				<span>Материалы в категории</span>
			</div>		
			<div class="blogwidget__category-item item">
                <ul class="item__blog">
          <?php
            while ($title = mysqli_fetch_assoc($resulttitleblog))
            {
          ?>
                <li class="item__blog-li">
                  <a href="#"><?php echo $title['title']; ?></a>
                </li>
          <?php
            }
          ?>
			</div>	
		</div>
    </div> <!-- /.col-lg-4 -->	
	
  </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

<?php
  include '../include/footer.php';
?>