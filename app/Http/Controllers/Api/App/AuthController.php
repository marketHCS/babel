<?php

namespace App\Http\Controllers\Api\App;

/**
 * Document: AuthController
 * Created on: November 16th, 2020
 * Author: Hector Jama Escobedo
 * Project: Babel
 * Subject: Web
 * Description: In this controller, we going to declare the authentication behavior in the api.
 */

// Every class imports sorted by charts long.
use App\Sex;
use App\User;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Resources\Login;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Authentication controller class.
 */
class AuthController extends Controller
{
    /**
     * Login api function.
     *
     * In this function we going to resolve the login request; receiving 2 params, email and password user.
     *
     *
     * http post request. Contains: Http data, email param and password param.
     * @param Request $request
     *
     * In case of the credentials are correct, return an login-user object. Otherwise, return an error mesasage
     * @return response()->json()
     */
    public function login(Request $request)
    {
        // Credentials assertion.
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            // Preparing the login-user object.
            $user = Auth::user();
            $user->sex = Sex::find($user->sex_id);

            // Token assignation.
            $user->token = $user->createToken('babel')->accessToken;

            return response()->json(new Login($user), 200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function loginWeb(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' =>$request->password])) {
            // dd($request);
            $user = Auth::user();
            // dd($user);
            $user->sex = Sex::find($user->sex_id);
            // dd($user);
            $user->token = $user->createToken('babel')->accessToken;
            // dd($user);

            return response()->json(new Login($user), 200);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logout()
    {
        // Getting user instance.
        $user = Auth()->user();

        // Getting each user's token.
        $user->tokens->each(
            function ($token, $key) {
                // destroying the giving token.
                $token->delete();
            }
        );

        return response()->json('Bye!', 202);
    }

    /**
     * Register api function
     *
     * In this function we going to resolve the register request. receiving the minimum data to create a user.
     *
     * http post request. Contains: Http data, name, middle name, last name, email and password for the user register.
     * @param Request $request
     *
     * Doing a data validation, we gonna to evaluate if the user can register in the platform.
     * If asserts, we return the user created and the http 201 status. Else, we return an json array with every error in the validator.
     * @return void
     */
    public function register(Request $request)
    {
        // Evaluating with the register validator.
        $validator = $this->validator($request->all());

        // Checking the fails in the validator.
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        // Setting every request params in a temp variable.
        $input = $request->all();

        // Encrypting the password with an rsa hash, using an private key of 64 bits.
        $input['password'] = bcrypt($input['password']);

        // Creating the user.
        $user = User::create($input);

        // Creating the stripe user, for our connection with the payment method,
        $user->createAsStripeCustomer();

        // Setting a first address to the new user.
        Address::create(['user_id' => $user->id]);

        // Setting the sex param.
        $user->sex = Sex::find($user->sex_id);

        return response()->json($user, 201);
    }


    /**
     * User api function
     *
     * In this function we gonna return the current user in the system.
     *
     * We check the token received on the http post request, and return an user found.
     * @return response()->json($user, 200)
     */
    public function user()
    {
        // Searching the current user.
        $user = Auth()->user();
        return response()->json($user, 200);
    }

    /**
     * Register validator function
     *
     * Receiving the register request on an array.
     * @param array $data
     *
     * Returns an response, if didn't asserts, an array with the validator fails.
     * @return validatorResponse
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Check that it contains the name, that must be an string and must have a max long of 255 chars.
            'name' => ['required', 'string', 'max:255'],

            // Check that it contains the middle name, that must be an string and must have a max long of 255 chars.
            'ap' => ['required', 'string', 'max:255'],

            // Check that it contains the last name, that must be an string and must have a max long of 255 chars.
            'am' => ['required', 'string', 'max:255'],

            // Check that it contains the email, that must be an string, has an email format, be the unique on our database and must have a max long of 255 chars
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            // Check that it contains the password, that must be an string and must have a min long of 8 chars.
            'password' => ['required', 'string', 'min:8']
        ]);
    }
}
