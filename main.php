<?php
  include 'include/connectdb.php';
  include 'include/functions.php';
  include 'include/header.php';
?>
    <div class="container card-container">
      <a href="https://www.flaticon.com/ru/free-icons/" title="окна иконки" class="partner">Иконки от Smashicons - Flaticon</a>
      <div class="row">
      <div class="col-lg-6">
      <?php $mains_1 = get_main_1(); ?>
      <?php foreach ($mains_1 as $main_1): ?>
        <div class="card">
          <a href="articles/<?=$main_1['files'] ?>">
          <img src="<?=$main_1['images'] ?>" alt="favorite">
          <div class="card-body">
            <h4 class="card-title"><?=$main_1['name'] ?></h4>
            <p class="card-text"><?=$main_1['description'] ?></p>
          </div>
          </a>
        </div>
      <?php endforeach ?>
    </div><!--/.col-lg-6-->
    <div class="col-lg-6">
      <?php $mains_2 = get_main_2(); ?>
      <?php foreach ($mains_2 as $main_2): ?>
        <div class="card">
          <a href="articles/<?=$main_2['files'] ?>">
          <img src="<?=$main_2['images'] ?>" alt="favorite">
          <div class="card-body">
            <h4 class="card-title"><?=$main_2['name'] ?></h4>
            <p class="card-text"><?=$main_2['description'] ?></p>
          </div>
          </a>
        </div>
      <?php endforeach ?>
    </div><!--/.col-lg-6-->
    </div><!--/.row-->
      <div class="row">
    <div class="col-lg-6">
      <?php $mains_3 = get_main_3(); ?>
      <?php foreach ($mains_3 as $main_3): ?>
        <div class="card">
          <a href="articles/<?=$main_3['files'] ?>">
          <img src="<?=$main_3['images'] ?>" alt="favorite">
          <div class="card-body">
            <h4 class="card-title"><?=$main_3['name'] ?></h4>
            <p class="card-text"><?=$main_3['description'] ?></p>
          </div>
          </a>
        </div>
      <?php endforeach ?>
    </div><!--/.col-lg-6-->
    <div class="col-lg-6">
      <?php $mains_4 = get_main_4(); ?>
      <?php foreach ($mains_4 as $main_4): ?>
        <div class="card">
          <a href="articles/<?=$main_4['files'] ?>">
          <img src="<?=$main_4['images'] ?>" alt="favorite">
          <div class="card-body">
            <h4 class="card-title"><?=$main_4['name'] ?></h4>
            <p class="card-text"><?=$main_4['description'] ?></p>
          </div>
          </a>
        </div>
      <?php endforeach ?>
      <div class="card">
      </div>
    </div><!--/.col-lg-6-->
    </div><!--/.row-->

    </div><!-- /.container -->

<?php
  include 'include/footer.php';
?>