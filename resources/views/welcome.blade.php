<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
      html, body {
        background-image: url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOGVmaXlzdjJhY2l3ZGxvNDJhMHVvNjd2NTNsc3U5eTkzNjFiM2Y4diZlcD12MV9naWZzX3NlYXJjaCZjdD1n/l3V0megwbBeETMgZa/giphy.gif'); /* Set your image URL here */
        background-size: cover; /* Ensures the background covers the entire screen */
        background-position: center; /* Centers the background image */
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
      }
      .full-height {
        height: 100vh;
      }
      .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
      }
      .position-ref {
        position: relative;
      }
      .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
      }
      .content {
        text-align: center;
        background: rgba(255, 255, 255, 0.7); /* Optional: add semi-transparent background for text readability */
        padding: 20px;
        border-radius: 10px;
      }
      .title {
        font-size: 84px;
      }
      .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
      }
      .m-b-md {
        margin-bottom: 30px;
      }
    </style>
  </head>
  <body>
    <div class="flex-center position-ref full-height">
      <div class="content">
        <div class="title m-b-md">
          {{ $title }}
        </div>
        <div class="links">
          <a href="{{ url('/') }}">Welcome</a>
          <a href="{{ url('/home') }}">Dashboard</a>
          <a href="{{ url('/login') }}">Login</a>
        </div>
      </div>
    </div>
  </body>
</html>
