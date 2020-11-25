<?php

namespace App\Http\Controllers\Api\App;

use App\Sex;
use App\User;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            // dd($request);
            $user = Auth::user();
            // dd($user);
            $user->sex = Sex::find($user->sex_id);
            // dd($user);
            $user->token = $user->createToken('babel')->accessToken;
            // dd($user);

            return response()->json($user, 200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logout()
    {
        $user = Auth()->user();
        $user->tokens->each(
            function ($token, $key) {
                $token->delete();
            }
        );

        return response()->json('Bye!', 202);
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $user->createAsStripeCustomer();
        Address::create(['user_id' => $user->id]);

        $user->sex = Sex::find($user->sex_id);
        // $user->address = Address::where('user_id', '=', $user->id)->get();

        return response()->json($user, 201);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'ap' => ['required', 'string', 'max:255'],
            'am' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);
    }
}
