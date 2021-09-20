<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>タスク一覧</h1>
    @foreach ($tasks as $task)
        <div class="tasks">
            <a href="/tasks/{{ $task->id }}" class="tasks-link">{{ $task->title }}</a>
            <form action="/tasks/{{ $task->id }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
            </form>
        </div>
        <br>
    @endforeach
    <hr>
    <h1>新規タスク登録</h1>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks" method="post">
        @csrf
        <label for="title">タイトル</label>
        <input type="text" name="title" value="{{ old('title') }}">

        <label for="body">内容</label>
        <textarea name="body">{{ old('body') }}</textarea>
        <input class="delete" type="submit" value="Create Task">
    </form>
</body>

</html>
