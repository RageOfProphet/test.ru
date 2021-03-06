<header id="header">
  <div class="header__top">
    <div class="container">
      <div class="header__top__logo">
        <h1>
          <?php
          echo $config['title'];
          ?>
        </h1>
      </div>
      <nav class="header__top__menu">
        <ul>
          <li><a href="/">Главная</a></li>
          <li><a href="pages/about_me.php">Обо мне</a></li>
          <li><a href="http://vk.com/smb">Я Вконтакте</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <?php
    //создаем массив из полей, которые fetch вытаскивает из БД.
    $categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`");
    $categories = array();
    while ( $cat = mysqli_fetch_assoc($categories_q)) 
    {
      $categories[] = $cat;
    }
  ?>
  <div class="header__bottom">
    <div class="container">
      <nav>
        <ul>
          <?php
            foreach ($categories as $cat)            
            {
              ?>
              <li><a href="/$articles.php?category=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a></li>
              <?php
            }
          ?>
        </ul>
      </nav>
    </div>
  </div>
</header>
