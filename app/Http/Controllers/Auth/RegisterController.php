<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use App\Models\Admin as ModelsAdmin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'first_name_kana' => ['required', 'string', 'max:255', 'custom_kana'],
            'last_name' => ['required', 'string', 'max:255'],
            'last_name_kana' => ['required', 'string', 'max:255', 'custom_kana'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'first_name_kana' => $data['first_name_kana'],
            'last_name' => $data['last_name'],
            'last_name_kana' => $data['last_name_kana'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Profile::create([
            'user_id' => $user->id,
        ]);

        return $user;
    }


    protected function adminValidator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'first_name_kana' => ['required', 'string', 'max:255', 'custom_kana'],
            'last_name' => ['required', 'string', 'max:255'],
            'last_name_kana' => ['required', 'string', 'max:255', 'custom_kana'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function showAdminRegistrationForm()
    {
        return view('auth.admin-register', ['url' => 'admin']);
    }

    protected function createAdmin(array $data)
    {
        return ModelsAdmin::create([
            'first_name' => $data['first_name'],
            'first_name_kana' => $data['first_name_kana'],
            'last_name' => $data['last_name'],
            'last_name_kana' => $data['last_name_kana'],
            'role_id' => $data['role_id'] ?? 1, // 正しい値を取得し、デフォルト値を設定
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Register a new admin user.
     *
     * @param  array  $data
     * @return \App\Admin
     */
    protected function registerAdmin(Request $request)
    {
        $this->adminValidator($request->all())->validate();

        $admin = $this->createAdmin($request->all());

        event(new Registered($admin));

        $this->guard()->login($admin);

        return $this->registered($request, $admin)
            ?: redirect($this->redirectPath());
    }
}
