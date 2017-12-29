<section class="content__right col-md-4">
  
  <div class="block">
    <h3>Топ читаемых статей</h3>
    <div class="block__content">
      <div class="articles articles__vertical">  
        <?php
        $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
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
