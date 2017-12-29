<?php
require_once '/includes/config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Блог IT_Минималиста!</title>
  
  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  
  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>  
  <div id="wrapper">    
    <?php include '/includes/header.php'; ?>
    <div id="content">
      <div class="container">
        <?php 
        $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
        if (mysqli_num_rows($article) <= 0)
        {
          ?>
          <div class="row">
            <section class="content__left col-md-8">
              <div class="full-text">
                <h3>Запрашиваемая статья не найдена!</h3>
              </div>
            </div>
          </div>
        </section>        
      </div>      
      <?php 
    } else 
    {
      $art = mysqli_fetch_assoc($article);
      mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);
      ?>
      <div id="content">
        <div class="container">
          <div class="row">
            <section class="content__left col-md-8">
              <div class="block">
                <a><?php echo $art['views']; ?> просмотров</a>
                <h3><?php echo $art['title'];?></h3>
                <div class="block__content">
                  <img src="/static/images/<?php echo $art['image']; ?>" style="max-width: 100%">
                  <div class="full-text">
                    <?php echo $art['text']; ?>       </div>
                  </div>
                </div>
                <?php 
              }
              ?>
              <div class="block">
                <a href="#comment-add-form">Добавить свой</a>
                <h3>Комментарии</h3>
                <div class="block__content">
                  <div class="articles articles__vertical">
                    <?php                      
                     $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `article_id`=". (int) $art['id']. "  ORDER BY `id` DESC " )?>
                    <?php                    
                    if(mysqli_num_rows($comments) <= 0)
                    {                    
                      echo 'Нет комментариев';             
                    }
                    while ($comment = mysqli_fetch_assoc($comments))
                    {
                      ?>
                      <article class="article">
                        <div class="article__info__preview"> <?php echo $comment['text']; ?>
                        </div>
                      <?php
                    }
                    ?>                    
                  </section>                  
                  <?php include '/includes/sidebar.php';?>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>  
    </div>
  </body>
  </html>
