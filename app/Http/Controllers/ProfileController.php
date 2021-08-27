<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profile= profile::where('user_id', '=', auth()->id())
            ->with('user', 'location')
            ->get();

        return response([
            'Profile' =>new UserResource($profile),
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
        $profile= profile::where('user_id', '=', auth()->id())
            ->with('user', 'location')
            ->get();

        if (!isset($profile))  //agregar que el usuario sea admin
        {
            return response([
                'message' => 'User not exist'
            ],401);
        }

        return response([
            'Users' => $profile,
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
