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
    <p id="logout">logout</p>
  </header>
  <main>
    <div id="tasktitle">
      <h1>new task</h1>
      <form action="{{ url('/new') }}" method="post">
        {{ csrf_field()}}
        <input type="text" name="new">
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
        <td>{{ $todo->status }}</td>
        <td>{{ $todo->due_date }}</td>
        <td>
          <form action="{{ action('TablesController@delete', $todo->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="button">delete</button>
          </form>
        </td>
        <td>
          <form action="[[ action('TablesController@edit',$todo) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('get')}}
            <button type="submit" class="button">edit</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </main>
</body>

</html>
