<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel=" stylesheet">
  <title>todoリスト</title>
</head>

<body>
  <header>
    <p id="title">todo list</p>
    <p id="logout">login</p>
  </header>
  <main>
    <form action="/users/login" method="post">
      {{ csrf_field() }}
      <p class="label">mail</p>
      <input type="email" name="email" class="input">
      <p class="label">password</p>
      <input type="password" name="password" class="input">
      <input type="submit" value="login" class="button editbutton">
    </form>
    <a href="{{ route('register') }}">新規登録</a>
  </main>
</body>

</html>
