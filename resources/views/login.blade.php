<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        input { width: 100%; padding: 8px; margin: 8px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { width: 100%; padding: 10px; margin-top: 10px; background-color: #2196F3; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #1976D2; }
        a { text-decoration: none; color: #333; }
        h2 { text-align: center; margin-bottom: 20px; }
        .message { text-align: center; margin-bottom: 10px; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>تسجيل الدخول</h2>

        @if(session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <input type="email" name="email" placeholder="البريد">
            <input type="password" name="password" placeholder="كلمة المرور">
            <button type="submit">دخول</button>
        </form>

        <p style="text-align:center; margin-top:10px;">ليس لديك حساب؟ <a href="/register">تسجيل مستخدم جديد</a></p>
    </div>
</body>
</html>