<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width"> <!-- for responsible site -->
  <meta name="description" content="Affordable and professional web design">
  <meta name="keywords" content="web design, affordable web design">
  <meta name="author" content="Nasrin Mohamadi">
  <title>Library | Welcome</title>
  <link rel="stylesheet" type="text/css" href="assets/css/_library.css">
  <link href="assets/font/css/all.css" rel="stylesheet">
</head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1>The Readers <span class="highlight"> Exchange </span></h1>
        </div>
        <nav>
          <ul>
            <li class="current"><a href="index.php?action=">Home</a></li>
            <li><a href="index.php?action=list&model=book">Books</a></li>
            <li><a href="index.php?action=list&model=translator">Translators</a></li>
            <?php if ( isset($_SESSION["user"]["type"]) && 
                      ($_SESSION["user"]["type"] == SA || $_SESSION["user"]["type"] == A  ) ) { ?>
                      <li><a href="index.php?action=list&model=user">Users</a></li>
            <?php } ?>

            <?php if ( !isset($_SESSION["user"]["id"]) ) { ?>
                      <li><a href="index.php?action=login&model=user">Login</a></li>
            <?php } ?>

            <?php if ( !isset($_SESSION["user"]["id"]) ) { ?>
                      <li><a href="index.php?action=signup&model=user">Signup</a></li>
            <?php } ?>

            <?php if (isset($_SESSION["user"]["id"])) { ?>
                      <li><a href="index.php?action=logout&model=user">logout</a></li>
            <?php } ?>

            <?php if (isset($_SESSION["user"]["id"])) { ?>
                      <li><?= "Hi,  ".$_SESSION["user"]["firstName"]." ".$_SESSION["user"]["lastName"] ?></li>
            <?php } ?>

          </ul>
        </nav>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
         <?php  echo $content; ?>
      </div>
    </section>

    <section id="newsletter">
      <div class="container">
        <h1>Subscribe To Our Newsletter</h1>
        <form>
          <input type="email" placeholder="Enter Email...">
          <button type="submit" class="button_1">Subscribe</button>
        </form>
      </div>
    </section>

    <footer>
      <p>Nasrin Web Design, Copyright &copy; 2020</p>
    </footer>
  </body>
</html>




