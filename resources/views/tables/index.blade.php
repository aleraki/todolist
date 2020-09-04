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
    <a href="#" id="logout">logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </header>
  <main>
    @if(Auth::check())
    <p style="color:rgb(90,128,203);">ようこそ{{ Auth::user()->name }}さん</p>
    @else
    <p>no</p>
    @endif
    <div id="tasktitle">
      <h1>new task</h1>
      <form action="{{ url('/new') }}" method="post">
        {{ csrf_field()}}
        <input type="text" name="new" class="inputtext">
        <button type="submit" id="newbutton">add</button>
      </form>
    </div>
    <h2>your task</h2>
    <table>
      <tr>
        <th>title</th>
        <th>status</th>
        <th>limit</th>
        <th> </th>
      </tr>
      @foreach ($todos as $todo)
      <tr>
        <td>{{ $todo->content }}</td>
        @if($todo->status == 1)
        <td class="red">未着手</td>
        @elseif($todo->status == 2)
        <td class="green">作業中</td>
        @elseif($todo->status == 3)
        <td class="gray">作業済</td>
        @endif
        <td>{{ $todo->due_date }}</td>
        <td id="deleteform">
          <form action="/delete/{{ $todo->id }}" method="post">
            {{ csrf_field() }}
            <!-- {{ method_field('delete') }} -->
            <input type="submit" value="delete" class="button" id="deletebutton">
          </form>
        </td>
        <td>
          <form action="/edit/{{ $todo->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('get')}}
            <input type="submit" value="edit" class="button">
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </main>
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
  @yield('scripts')
</body>

</html>
