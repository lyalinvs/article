<?php
/*выводит название категорий*/
  function get_categories(){
    global $link;
    $sql = "SELECT * FROM categories WHERE id < 90"; //SELECT COUNT(*) FROM `articles` WHERE id_categories=1
    $result = mysqli_query($link, $sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categories;
  }
/*выводит все материалы + Пагинация*/
  function get_posts($limit, $offset){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, users.display_name, articles.date, categories.name, categories.files, categories.color FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.status = 1 ORDER BY articles.date DESC LIMIT $limit OFFSET $offset";
    $result = mysqli_query($link, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts;
  }
/*выводит большой пост в файле posts.php по id*/
  function get_post_by_id($post_id){
    global $link;
    $sql = "SELECT articles.id, articles.title, articles.content, categories.name, categories.files, articles.id_categories FROM articles, categories WHERE articles.id=$post_id AND articles.id_categories=categories.id";
    $result = mysqli_query($link, $sql);
    $post = mysqli_fetch_assoc($result);
    return $post;
  }
/*выводит в файле posts.php в виджете список заголовков постов всех*/
  function get_titles_posts($categories_id){
    global $link;
    $sql = "SELECT articles.id, articles.title, articles.id_categories FROM articles WHERE articles.id_categories=$categories_id ORDER BY articles.date DESC";
    //$sql = "SELECT articles.title FROM articles WHERE articles.id_categories=$categories_id AND articles.id <> $post_id ORDER BY articles.date DESC";
    $result = mysqli_query($link, $sql);
    $titleposts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $titleposts;
  }
/*выводит материалы из категории связь, телекоммуникации*/  
  function get_posts_communications($limitc, $offsetc){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, articles.date, categories.name, users.display_name, categories.color FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.id_categories=5 ORDER BY articles.date DESC LIMIT $limitc OFFSET $offsetc";
    $result = mysqli_query($link, $sql);
    $posts_communications = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts_communications;
  }
/*выводит материалы из категории избранные материалы*/  
  function get_posts_favorite($limitf, $offsetf){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, articles.date, categories.name, users.display_name, categories.color, categories.files FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.favorites=0 ORDER BY articles.date DESC LIMIT $limitf OFFSET $offsetf";
    $result = mysqli_query($link, $sql);
    $posts_favorite = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts_favorite;
  }
/*выводит материалы из категории ms office*/  
  function get_posts_office($limito, $offseto){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, articles.date, categories.name, users.display_name, categories.color FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.id_categories=3 ORDER BY articles.date DESC LIMIT $limito OFFSET $offseto";
    $result = mysqli_query($link, $sql);
    $posts_office = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts_office;
  }
/*выводит материалы из категории оргтехника*/  
  function get_posts_print($limitp, $offsetp){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, articles.date, categories.name, users.display_name, categories.color FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.id_categories=1 ORDER BY articles.date DESC LIMIT $limitp OFFSET $offsetp";
    $result = mysqli_query($link, $sql);
    $posts_print = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts_print;
  }
/*выводит материалы из категории скрипты*/  
  function get_posts_script($limitss, $offsetss){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, articles.date, categories.name, users.display_name, categories.color FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.id_categories=4 ORDER BY articles.date DESC LIMIT $limitss OFFSET $offsetss";
    $result = mysqli_query($link, $sql);
    $posts_script = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts_script;
  }
/*выводит материалы из категории windows*/  
  function get_posts_windows($limitw, $offsetw){
    global $link;
    $sql = "SELECT articles.id, articles.id_categories, articles.title, articles.description, articles.date, categories.name, users.display_name, categories.color FROM articles, categories, users WHERE articles.id_categories=categories.id AND articles.id_author=users.id AND articles.id_categories=2 ORDER BY articles.date DESC LIMIT $limitw OFFSET $offsetw";
    $result = mysqli_query($link, $sql);
    $posts_windows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts_windows;
  }
/*main.php*/
  function get_main_1(){
    global $link;
    $sql = "SELECT id, name, description, images, files FROM categories WHERE id in (98, 99)";
    $result = mysqli_query($link, $sql);
    $mains_1 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $mains_1;
  }
  function get_main_2(){
    global $link;
    $sql = "SELECT id, name, description, images, files FROM categories WHERE id in (1, 2)";
    $result = mysqli_query($link, $sql);
    $mains_2 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $mains_2;
  }
  function get_main_3(){
    global $link;
    $sql = "SELECT id, name, description, images, files FROM categories WHERE id in (3, 4)";
    $result = mysqli_query($link, $sql);
    $mains_3 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $mains_3;
  }
  function get_main_4(){
    global $link;
    $sql = "SELECT id, name, description, images, files FROM categories WHERE id = 5";
    $result = mysqli_query($link, $sql);
    $mains_4 = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $mains_4;
  }    

?>


 