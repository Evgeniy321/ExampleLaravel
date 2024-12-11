<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\FilterRequest;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function index(FilterRequest $request){
        //$this->authorize('view', auth()->user());
        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams'=> array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        return PostResource::collection($posts);
        //return view('post.index', compact('posts'));
    }

    public function create(){
        $tags=Tag::all();
        $categories=Category::all();
        return view('post.create', compact('tags','categories'));
    }

    public function store(PostRequest $request){
        $data = $request->validated();
        dd($data);
        $post = $this->service->store($data);
        return new PostResource($post);
        //return redirect(route('post.index'));
    }

    public function edit(Post $post){
        $categories=Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','categories', 'tags'));
    }

    public function update(PostRequest $request, Post $post){
        $data = $request->validated();
        $this->service->update($data, $post);
        return redirect(route('posts.show', $post->id));
    }

    public function show(Post $post){
        return new PostResource($post);
        //return view('post.show', compact('post'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}
