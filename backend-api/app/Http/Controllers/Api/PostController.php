<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Posts a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Posts(Request $request)
    {

        /*$querybuilder=DB::table('posts')
                        //->select('posts.id','posts.name','posts.text','posts.type_post_id','posts.category_id','posts.user_id', 'i.url','r.post_id','r.tag_id','tags.name','tags.color')

                        //->join('post_tag as r', 'posts.id' , '=', 'r.post_id')
                        //->join('tags','r.tag_id', '=','tags.id')

                        ->join('images as i', 'posts.id', '=','i.imageable_id')
                        ->limit(2)
                        ->get();

        $orm= Post::join("images","posts.id", "=", "images.imageable_id")
            ->limit($request->input('numberPosts'))
            ->get();*/

        $Posts=Post::with('tags', 'image', 'category', 'type_post')
            ->limit(1)
            ->get();
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

        if ($request->file('PostImage')){
            $url= Storage::disk('public')->put('posts', $request->file('PostImage'));
            $post->image()->create([
                'url' => $url
            ]);
        }
        if ($request->tags){
            $post->tags()->attach($request->tags);
        }


        $Post= Post::with('tags', 'image', 'category', 'type_post')
                ->where('posts.id', $post->id)
                ->get();


        return response([
            'Posts'=> new PostResource($Post),
            'message' => 'Retrieved  Successfully'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $Post= Post::with('tags', 'image', 'category', 'type_post')
            ->where('posts.id', $post)
            ->get();
        return response([
            'post' => new PostResource($Post),
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
        $post->update($request->all());

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
