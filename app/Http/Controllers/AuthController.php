<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // 1️⃣ عرض صفحة التسجيل
    public function showRegister() {
        return view('register');
    }

    // 2️⃣ تنفيذ التسجيل
    public function register(Request $request) {

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;

        // 🔐 تشفير كلمة المرور
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login');
    }

    // 3️⃣ عرض صفحة الدخول
    public function showLogin() {
        return view('login');
    }

    // 4️⃣ تنفيذ تسجيل الدخول
    public function login(Request $request) {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return "المستخدم غير موجود";
        }

        if (!Hash::check($request->password, $user->password)) {
            return "كلمة المرور خطأ";
        }

        // حفظ المستخدم
        Session::put('user', $user);

        return redirect('/home');
    }

    // 5️⃣ صفحة الترحيب
    public function home() {

        $user = Session::get('user');

        return view('home', compact('user'));
    }

    // 6️⃣ تسجيل الخروج
    public function logout() {

        Session::forget('user');

        return redirect('/login');
    }
}