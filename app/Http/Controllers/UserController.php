<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // عرض صفحة التسجيل
    public function showRegister() {
        return view('register');
    }

    // تنفيذ التسجيل
    public function register(Request $request) {
        // تحقق من صحة البيانات
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'address' => 'required|max:255',
        ]);

        // حفظ المستخدم
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->save();

        return redirect('/login')->with('success', 'تم التسجيل بنجاح!');
    }

    // عرض صفحة تسجيل الدخول
    public function showLogin() {
        return view('login');
    }

    // تنفيذ تسجيل الدخول
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user->id);
            return redirect('/welcome');
        } else {
            return back()->with('error', 'البريد أو كلمة المرور غير صحيحة');
        }
    }

    // صفحة الترحيب بعد تسجيل الدخول
    public function welcome() {
        $user_id = Session::get('user');
        if ($user_id) {
            $user = User::find($user_id);
            return view('welcome', compact('user'));
        } else {
            return redirect('/login');
        }
    }

    // تسجيل الخروج
    public function logout() {
        Session::forget('user');
        return redirect('/login');
    }
}