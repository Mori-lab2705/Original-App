<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    @vite('resources/js/app.js')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        #calendar {
            margin-bottom: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        form input, form select, form button {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .flex-container {
            display: flex;
            justify-content: space-between;
        }
        .flex-container > div {
            flex: 1;
            margin-right: 10px;
        }
        .flex-container > div:last-child {
            margin-right: 0;
        }
        h2 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #fff;
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        li h3 {
            margin: 0;
            color: #555;
        }
        li span {
            display: block;
            margin-bottom: 10px;
        }
        li a {
            color: #007bff;
            text-decoration: none;
        }
        li a:hover {
            text-decoration: underline;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div id='calendar'></div>
    <form method="POST" action="{{ route('store') }}">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="person" placeholder="担当者">
        <div class="flex-container">
            <div>
                進捗度<br>
                <select name="progress" id="progress" class="form-control">
                    <option value="進行中">進行中</option>
                    <option value="完了">完了</option>
                    <option value="保留">保留</option>
                </select>
            </div>
            <div>
                重要度<br>
                <select name="importance" id="importance" class="form-control">
                    <option value="高">高</option>
                    <option value="中">中</option>
                    <option value="低">低</option>
                </select>
            </div>
        </div>
        開始<input type="date" name="start">
        終了<input type="date" name="end">
        備考欄 <input type="text" name="memo">
        カラー<input type="color" name="textColor">
        <button type="submit">登録</button>
    </form>
    <div id='show'></div>
    <h2>業務一覧</h2>
    <ul>
        @foreach($events as $event)
            <li>
                <h3>< {{ $event->title }} ></h3>
                <h3>担当者: {{ $event->person }}</h3>
                <h3>進捗度: {{ $event->progress }}</h3>
                <h3>重要度: {{ $event->importance }}</h3>
                <span style="color: {{ $event->textColor }}">開始: {{ $event->start }} 終了: {{ $event->end }}</span>
                <h4>備考欄: {{ $event->memo }}</h4>
                <a href="{{ route('event.edit', $event->id) }}">Edit</a>
                <form action="{{ route('destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('本当に削除しますか？')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
