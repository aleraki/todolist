<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel=" stylesheet">
  <script type="text/javascript" src="../jquery/jquery.js"></script>
  <title>todoリスト</title>
  <script>
    $(function() {
      $('.button.editbutton').click(function() {
        if (!confirm("変更してよろしいですか？")) {
          return false;
        }
      });
    });
  </script>
</head>

<body>
  <header>
    <p id="title">todo list</p>
    <p id="logout">logout</p>
  </header>
  <main>
    <form action="" method="post">
      {{ csrf_field() }}
      {{ method_field('post') }}
      <p class="label">todo</p>
      <input type="text" name="content" class="input" value="{{ $edit->content }}">
      <p class="label">status</p>
      <label><input type="radio" value="1" name="status" class="input radio" @if($edit->status == 1) checked @endif>未着手</label>
      <label><input type="radio" value="2" name="status" class="input radio" @if($edit->status == 2) checked @endif>作業中</label>
      <label><input type="radio" value="3" name="status" class="input radio" @if($edit->status == 3) checked @endif>作業済</label>
      <p class="label">limit</p>
      <input type="text" name="limit" class="input" value="{{$edit->due_date}}">
      <input type="submit" value="complete" class="button editbutton">
    </form>
  </main>
</body>

</html>
