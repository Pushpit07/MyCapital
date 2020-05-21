<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>navigation bar</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/side_nav.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>
  <header class="header">

    <nav class="navigation">

      <section class="logo"></section>

      <section class="navigation__icon">
        <span class="topBar"></span>
        <span class="middleBar"></span>
        <span class="bottomBar"></span>
      </section>

      <ul class="navigation__ul">
        <li><a href="">HOME</a></li>
        <li><a href="">GALLERY</a></li>
        <li><a href="">TEAM</a></li>
        <li><a href="">CLIENT</a></li>
        <li><a href="">FAQ</a></li>
      </ul>

      <section class="navigation__social">
        <ul class="navigation__social-ul">
          <li>
            <a href="" class="social-icon"></a>
          </li>
          <li>
            <a href="" class="social-icon"></a>
          </li>
          <li>
            <a href="" class="social-icon"></a>
          </li>
          <li>
            <a href="" class="social-icon"></a>
          </li>
        </ul>
      </section>

    </nav>

  </header>
 

  <script>

    $(function() {
     $(".navigation__icon").click(function() {
       $(".navigation").toggleClass('navigation-open');
     });
   });

  </script>

</body>
</html>