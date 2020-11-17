<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->createAsStripeCustomer();

        Address::create(['user_id' => $user->id]);

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'ap' => ['required', 'string', 'max:255'],
            'am' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthdate' => ['date', 'required'],
            'sex_id' =>['required', 'integer']
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'ap' => $data['ap'],
            'am' => $data['am'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthdate' => $data['birthdate'],
            'sex_id' => $data['sex_id'],
            'profilePicture' => 'https://api.adorable.io/avatars/285/' . str_replace(' ', '', $data['name'] . $data['ap'] . $data['am']) . '.png'
        ]);
    }
}
