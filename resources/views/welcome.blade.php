<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبا بك</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .welcome-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        a { display: inline-block; margin-top: 20px; padding: 10px 20px; background: red; color: white; border-radius: 5px; text-decoration: none; }
        a:hover { background: darkred; }
        h2 { margin-bottom: 15px; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h2>مرحبا {{ $user->name }}</h2>
        <p>العنوان: {{ $user->address }}</p>

        <a href="/logout">تسجيل الخروج</a>
    </div>
</body>
</html>