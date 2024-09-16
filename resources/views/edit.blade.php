<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: #007BFF;
            outline: none;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            margin-bottom: 20px;
            text-align: center;
        }
        .back-link a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.3s;
        }
        .back-link a:hover {
            color: #0056b3;
        }
        .form-control{
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Event</h2>
        <div class="back-link">
            <a href="{{ route('index') }}">Back</a>
        </div>
        <form action="{{ route('event.update', $event->id) }}" method="POST">
            @csrf 
            @method('PUT')
            <div class="form-group">
                <label for="title"><strong>Title:</strong></label>
                <input type="text" id="title" name="title" value="{{ $event->title }}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="person"><strong>担当者:</strong></label>
                <input type="text" id="person" name="person" value="{{ $event->person }}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="start"><strong>開始:</strong></label>
                <input type="date" id="start" name="start" value="{{ $event->start }}" placeholder="Start Date">
            </div>
            <div class="form-group">
                <label for="end"><strong>終了:</strong></label>
                <input type="date" id="end" name="end" value="{{ $event->end }}" placeholder="End Date">
            </div>
            <div class="form-group">進捗度<br>
                <select name="progress" id="progress" class="form-control">
                <option value="進行中" >進行中</option>
                <option value="完了" >完了</option>
                <option value="保留">保留</option>
                </select>
            </div>
            <div class="form-group">重要度<br>
            <select name="importance" id="importance" class="form-control">
                <option value="高" >高</option>
                <option value="中" >中</option>
                <option value="低">低</option>
            </select>
            </div>
            <div class="form-group">
                <label for="memo"><strong>備考欄:</strong></label>
                <input type="text" id="memo" name="memo" value="{{ $event->memo }}" placeholder="メモ等">
            </div>
            <div class="form-group">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>
</html>
