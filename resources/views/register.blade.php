<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل مستخدم جديد</title>
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
        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background-color: #45a049; }
        a { text-decoration: none; color: #333; }
        h2 { text-align: center; margin-bottom: 20px; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>تسجيل مستخدم جديد</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="الاسم">
            <input type="email" name="email" placeholder="البريد">
            <input type="password" name="password" placeholder="كلمة المرور">
            <input type="text" name="address" placeholder="العنوان">
            <button type="submit">تسجيل</button>
        </form>

        <p style="text-align:center; margin-top:10px;">لديك حساب؟ <a href="/login">تسجيل الدخول</a></p>
    </div>
</body>
</html>