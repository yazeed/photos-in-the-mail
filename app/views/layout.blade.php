<!doctype html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=960"/>
  <title>PHOTOS in the MAIL</title>
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="/assets/css/style.css" media="all">
  <!-- includes google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Dosis:400,600,700,300' rel='stylesheet' type='text/css'>
  <!-- include jQuery library -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">window.jQuery || document.write('<script src="/assets/js/jquery-1.8.3.min.js"><\/script>') </script>
  <!-- include custom JavaScript -->
  <script type="text/javascript" src="/assets/js/main.js"></script>
  <!-- include the site stylesheet for lt IE9 -->
  <!--[if lt IE 9]><link rel="stylesheet" href="css/ie.css" media="all"><![endif]-->
  <!-- include HTML5 IE enabling script and stylesheet for IE -->
  <!--[if IE]><script type="text/javascript" src="js/ie.js"></script><![endif]-->
</head>
<body>
  <!-- main container of all the page elements -->
  <div id="wrapper" class="add">
    <!-- header of the page -->
    <header id="header">
      <div class="holder">
        <!-- page logo -->
        <strong class="logo">
          <a href="/">Photos in the mail</a>
        </strong>
        <span class="company-name">
          An Mtek Media Company &nbsp;
          <span class="login-links">
              @if (! Auth::check())
                <a href="/login">Log In</a>
              @else
                <a href="/logout">Log out</a>
              @endif
          </span>
        </span>
      </div>
    </header>
    <!-- contain main informative part of the site -->
    <section id="main">

      @if (Session::has('flash_message'))
          <div class="flash-message">
              <p>{{ Session::get('flash_message') }}</p>
          </div>
      @endif

      @yield('content')

    </section>
    <!-- end #main -->
  </div>
  <!-- footer of the page -->
  <footer id="footer">
    <div class="holder">
      <span class="copy-right">©2014 <a href="#">Photos in the Mail</a>. All Rights Reserved. </span>
      <span class="company-name">An Mtek Media Company</span>
    </div>
  </footer>

  @yield('lightbox')
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script>
    Stripe.setPublishableKey('{{ $_ENV['STRIPE_PUBLIC'] }}');
  </script>
  <script type="text/javascript" src="/assets/js/stripe_form.js"></script>
</body>
</html>