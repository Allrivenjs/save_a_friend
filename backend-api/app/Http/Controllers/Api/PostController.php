<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Posts= Post::all()->sortByDesc('id');
       // $Posts = Post::all()->first;
        //$Posts->image;
        return response([
            'Posts' => new PostResource($Posts),
            'message' => 'Retrieved  Successfully'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post=Post::create($request->all());
        /*$post=Post::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'text'=>$request->input('text'),
            'type_post_id'=>$request->input('type_post_id'),
            'category_id'=>$request->input('category_id'),
        ]);*/
        return response([
            'Posts'=> new PostResource($post),
            'message' => 'Retrieved  Successfully'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response([
            'post' => new PostResource($post),
            'message' => 'Retrieved  Successfully'
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
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
