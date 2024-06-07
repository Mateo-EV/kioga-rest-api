<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{ $subject ?? 'Verificación de Email - Kioga' }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #121212;
      color: #ffffff;
      margin: 0;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 500px;
      margin: 0 auto;
      background-color: #1e1e1e;
      padding: 20px;
      border-radius: 10px;
    }

    .headerbox {
      text-align: center;
    }

    .header img {
      max-width: 100px;
    }

    .button {
      display: block;
      padding: 10px 20px;
      background-color: #F97316;
      color: #ffffff;
      text-decoration: none;
      border-radius: 5px;
      align-self: center;
      margin: 20px auto;
    }

    .footerbox {
      margin-top: 20px;
      font-size: 12px;
      color: #aaaaaa;
    }

    .link {
      color: #F97316;
      word-break: break-word;
    }

    .link:hover {
      color: #F9731680
    }

    .content {
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="headerbox">
      <img src="{{ asset('images/kioga.png') }}" alt="Kioga Logo">
    </div>
    <div class="content">
      {{ $slot }}
    </div>
    @isset($subcopy)
    <div class="footerbox">
      {{ $subcopy }}
    </div>
    @endisset
  </div>
</body>
</html>
