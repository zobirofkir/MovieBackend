<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\RegisterResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register User
     *
     * @param RegisterRequest $request
     * @return void
     */
    public function register(RegisterRequest $request)
    {
        return RegisterResource::make(
            User::create($request->validated())
        );
    }

    /**
     * Login User
     *
     * @param LoginRequest $request
     * @return LoginResource
     */
    public function login(LoginRequest $request) : LoginResource
    {
        $request->validated();
        /**
         * @var User
         */
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return abort(401, "Email ou mot de passe incorrects");
        }
        
        return LoginResource::make($user);
    }

    /**
     * Get Authenticated User
     *
     * @return void
     */
    public function current()
    {
        return RegisterResource::make($this->currentUser());   
    }

    /**
     * Update Current User Password
     */
    public function updateCurrentUserPassword(PasswordRequest $request)
    {
        $this->currentUser()->update($request->validated());
        return RegisterResource::make($this->currentUser()->refresh());
    }


    /**
     * Logout User
     *
     * @return boolean
     */
    public function logout() : bool
    {
        $user = User::find(Auth::user()->id);
        $user->token()?->revoke();
        return true;
    }    


    /**
     * Get current user as App\Models\User
     *
     * @return User
     */
    private function currentUser () :User
    {
        return User::find(Auth::user()->id);
    }
}
