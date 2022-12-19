<?php
  /*ini_set('error_reporting', 'E_ALL');
  ini_set('display_error', 'E_ALL');
  ini_set('display_startup_errors', 'E_ALL');*/
  include '../include/connectdb.php';
  include '../include/functions.php';
  include '../include/header.php';

  $post_id = $_GET['id'];
  $categories_id = $_GET['id_categories'];
  //if (!is_numeric($id)) exit();
  //массив поста
  $post = get_post_by_id($post_id);

?>

<div class="container container-posts">
  <div class="row">
<!---------------------------------------breadcrumb------------------------>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="../main.php">Главная</a></li>
			    <li class="breadcrumb-item active"><?=$post['name'] ?></li>
			  </ol>
			</nav>	
<!------------------------------ blogcontent --------------------------->      
    <div class="col-lg-8">
    <div class="blogcontent__content content-body blogcontent">
      <a href="<?=$post['files'] ?>"><h3><?=$post['name'] ?></h3></a>
      <hr>
        <div class="blogcontent__content-title">
          <h1><?=$post['title'] ?></h1>
        </div>
        <div class="blogcontent__content-text"> <!-- page__blog-text -->
              <?=$post['content'] ?>
        </div>
     <!-- <hr> --> <!-- hr-blog -->
    
    
      <!-- Pagination -->
      <!--<div class="blogpost__pagenav pagenav">
        <ul class="pagenav__nav">
          <li class="page-nav">
            <a href="#">&larr; Предыдущее</a>
          </li>
          <li class="page-nav">
            <a href="#">Следующее &rarr;</a>
          </li>
        </ul>
      </div> -->    
    </div>
    </div> <!-- /.col-lg-8 -->
  
    <!-- Sidebar Widgets Column -->
    <div class="col-lg-4 blogwidget">
        <div class="blogwidget__category blogcontent">
      <div class="blogwidget__category-title">
        <span>Статьи в категории</span>
      </div>    
      <div class="blogwidget__category-item item">
                <ul class="item__blog">
                <?php $titleposts = get_titles_posts($categories_id) ?>
                 <?php foreach ($titleposts as $titlepost): ?>
                  <li class="item__blog-li">
                    <a href="posts.php?id=<?=$titlepost['id']; ?>&id_categories=<?=$titlepost['id_categories'] ?>"><?=$titlepost['title']; ?></a>
                  </li>
                <?php endforeach; ?>
                </ul>
      </div>  
    </div>
    </div> <!-- /.col-lg-4 -->  
  
  </div> <!-- /.row -->
</div> <!-- /.container-fluid -->

<?php
  include '../include/footer.php';
?>