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
                  $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10");
                  ?>
                  <?php
                  while ($art = mysqli_fetch_assoc($articles))
                  {
                    ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image']; ?>      );"></div>
                      <div class="article__info">
                        <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title']; ?></a>
                        <div class="article__info__meta">
                          <?php
                            $art_cat = false;
                            foreach ($categories as $cat) {
                              if($cat['id'] == $art['category_id'])
                              {
                                $art_cat = $cat;
                                break;
                              }
                            }
                          ?>
                          <small>Категория: <a href="/articles.php?category=<?php echo $art_cat['id']; ?>">
                            <?php echo $art_cat['title']; ?>
                          </a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($art['text']), 0, 100, 'utf-8') . ' ...'; ?></div>
                      </div>
                    </article>
                    <?php
                  }
                  ?>

                </div>
              </div>
            </div>


          </section>
          <?php include 'includes/sidebar.php';?>
        </div>
      </div>
    </div>

    <?php include "includes/footer.php"; ?>
  </div>

</body>
</html>