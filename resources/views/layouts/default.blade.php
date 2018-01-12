<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/kickstart.css">
  <link rel="stylesheet" href="/css/kickstart-buttons.css">
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/kickstart.js"></script>
</head>
<body>
  <div id="particles-js"></div>
  <div class="container-1">
  @if (session('flash_message'))
  <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
  @endif
  <div class="container">
  @yield('content')
  </div>
  </div>

  <script src="/js/particles.js"></script>
  <script src="/js/set.js"></script>
</body>
</html>