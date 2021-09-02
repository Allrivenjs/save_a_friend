<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request){
        $credentials=$request->only('email','password');
        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token){
                return response()->json(['error'=>'invalid_credentials'],400);
            }
        }catch (JWTException $e){
            return response()->json(['error'=>'could_not_create_token'],500);
        }
        $user = JWTAuth::user();
        return response()->json([
            'Login' => [
                'User' => new UserResource($user),
                'token' => $token
            ]
        ],201);
    }



    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'birthday' =>'required|date',
            //'phone'=>'required|number|max:255',
            'email'=>'required|string|email|max:255|unique:users|confirmed',
            'password'=>'required|string|min:6',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'birthday'=> $request->get('birthday'),
        ]);
        $random = rand(0, 100);
        $user->profile()->create([
            'slug' => Str::of($user->name .'-'. $user->lastname.'-'.$random)->slug('-'),
            'user_id' => $user->id,
        ]);
        $userData=User::with('profile')
            ->whereId($user->id)
            ->get();

        $token = JWTAuth::fromUser($user);
        return response()->json([
            'Register' =>[
            'User'=>new UserResource($userData),
            'token' =>  $token
            ]
        ],201);
    }

    public function getAuthenticatedUser(){
        try {
            $user =JWTAuth::parseToken()->authenticate();
            if (! $user){
                return response()->json(['user_not_found',404]);
            }
        }catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['message' => 'token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['message' => 'token_absent'], $e->getStatusCode());
        }
        return response()->json(new UserResource($user), 200);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
//            Cookie::queue(Cookie::forget('token'));
//            $cookie = Cookie::forget('token');
//            $cookie->withSameSite('None');
            return response()->json([
                "status" => "success",
                "message" => "User successfully logged out."
            ], 200)
               /* ->withCookie('token', null,
                    config('jwt.ttl'),
                    '/',
                    null,
                    config('app.env') !== 'local',
                    true,
                    false,
                    config('app.env') !== 'local' ? 'None' : 'Lax'
                )*/;
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(["message" => "No se pudo cerrar la sesión."], 500);
        }
    }
}
