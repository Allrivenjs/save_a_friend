<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthControllor extends Controller
{
    public function register(Request $request){
        $validatedData= $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = Hash::make($request->password);
        $user = User::Create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([
            'user' => $user,
            'access_token' => $accessToken
        ]);
    }

    public function login(Request $request){

        if(!auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return response(['message' => 'Invalid Credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response([
            'user' => auth()->user(),
            'access_token' => $accessToken
        ]);

    }

    /**
     * Logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){
        $devices =$request->input('devices');
        $this->logoutMultiple($request->user(), $devices);
    }
    private function logoutMultiple(User $user, $devices = FALSE)
    {
        $accessTokens = $user->tokens();
        if($devices == 'all') {}
        else if ($devices == 'other') {
            $accessTokens->where('id', '!=', $user->token()->id);
        } else {
            $accessTokens->where('id', '=', $user->token()->id);
        }
        $accessTokens = $accessTokens->get();
        foreach ($accessTokens as $accessToken) {
            $refreshToken = DB::table('oauth_refresh_tokens')
                ->where('access_token_id', $accessToken->id)
                ->update(['revoked' => TRUE]);
            $accessToken->revoke();
        }
    }
}
