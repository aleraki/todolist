<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel=" stylesheet">
  <script type="text/javascript" src="jquery/jquery.js"></script>
  <title>todoリスト</title>
  <script>
    $(function() {
      $('#deletebutton.button').click(function() {
        if (!confirm("本当に削除しますか？")) {
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
      {{ method_field('patch') }}
          <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
          @if($errors->has('name'))<span class="text-danger">{{ $errors->first('name') }}</span> @endif
      <div class="form-group @if($errors->has('email')) has-error @endif">
        <label for="email" class="col-md-3 control-label">メールアドレス</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" id="email" name="email" value="{{$student->email}}">
          @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span> @endif
        </div>
      </div>
      <div class="form-group @if($errors->has('tel')) has-error @endif">
        <label for="tel" class="col-md-3 control-label">電話番号</label>
        <div class="col-md-9">
          <input type="tel" class="form-control" id="tel" name="tel" value="{{$student->tel}}">
          @if($errors->has('tel'))<span class="text-danger">{{ $errors->first('tel') }}</span> @endif
        </div>
      </div>

      <div class="col-md-offset-3 text-center"><button class="btn btn-primary">確認</button></div>
    </form>
  </main>
</body>

</html>
