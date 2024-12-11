<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag){

        return view('tags.show', compact('tag'));
    }
    public function index(){
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }
}
