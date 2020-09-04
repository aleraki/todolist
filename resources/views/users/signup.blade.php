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
    <form action="{{ route('register') }}" method="post">
      {{ csrf_field() }}
      <p class="label">name</p>
      <input type="text" name="name" class="input">
      <p class="label">mail</p>
      <input type="email" name="email" class="input">
      <p class="label">password</p>
      <input type="password" name="password" class="input">
      <input type="submit" value="signup" class="button editbutton">
    </form>
  </main>
</body>

</html>
