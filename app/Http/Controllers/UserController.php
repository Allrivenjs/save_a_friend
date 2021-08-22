<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::whereId(auth()->id())
            ->with('posts','animals')
            ->get();

        return response([
            'User' =>new UserResource($user),
            'message' => 'Retrieved  Successfully'
        ],200);

    }



    public function Alluser(){

        $users= User::where('id', '>', '0')
            ->with('posts','animals')
            ->get();


        return response([
            'Users' => new UserResource($users),
            'message' => 'Retrieved  Successfully'
        ],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);

        if (!isset($user))  //agregar que el usuario sea admin
        {
            return response([
                'message' => 'User not exist'
            ],401);
        }

        return response([
            'Users' => $user,
            'message' => 'Retrieved  Successfully'
        ],200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
