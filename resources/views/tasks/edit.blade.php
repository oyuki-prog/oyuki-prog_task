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
    <h1>登録タスク編集</h1>

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

    <form action="/tasks/{{ $task->id }}" method="post" id="patch">
        @csrf
        @method('patch')
        <input type="hidden" name="id" value="{{ $task->id }}">
        <label for="title">タイトル</label>
        <input type="text" name="title" value="{{ old('name', $task->title) }}">
        <label for="body">内容</label>
        <textarea type="text" name="body">{{ old('body', $task->body) }}</textarea>
    </form>

    <div class="button-group">
        <input type="submit" value="更新" form="patch">
        <button onclick="location.href='/tasks/{{ $task->id }}'">詳細へ戻る</button>
    </div>
</body>

</html>
