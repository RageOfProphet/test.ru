<?php
require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>
    <?php
    echo $config['title'];
    ?>
  </title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">
    <?php include 'includes/header.php'; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="#">Все записи</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">
                  <?php
                  $articles = mysqli_query($connection, "SELECT * FROM `articles`");
                  ?>
                  <?php
                  while ($art = mysqli_fetch_assoc($articles))
                  {
                    ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/                        <?php echo $art['image']; ?>      );"></div>
                      <div class="article__info">
                        <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                        <div class="article__info__meta">
                          <small>Категория: <a href="#">Программирование</a></small>
                        </div>
                        <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                      </div>
                    </article>
                    <?php
                  }
                  ?>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Название статьи #2</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Название статьи #3</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Программирование</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                  <article class="article">
                    <div class="article__image"></div>
                    <div class="article__info">
                      <a href="#">Название статьи #4</a>
                      <div class="article__info__meta">
                        <small>Категория: <a href="#">Lifestyle</a></small>
                      </div>
                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                    </div>
                  </article>

                </div>
              </div>
            </div>


          </section>
          <?php include 'includes/sidebar.php';?>
        </div>
      </div>
    </div>

    <footer id="footer">
      <div class="container">
        <div class="footer__logo">
          <h1>
            <?php
            echo $config['title'];
            ?>
          </h1>
        </div>

      </div>
    </footer>

  </div>

</body>
</html>
