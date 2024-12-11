<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data){
        try{
            DB::beginTransaction();
            $tags=$data['tags'];
            $category=$data['category'];
            unset($data['tags'], $data['category']);

            $data['category'] = $this->getCategoryId($category);
            
            $tagIds = $this->getTagIds($tags);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        
        return $post;
    }

    public function update($data, Post $post){
        $tags=$data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh();
        $post->tags()->sync($tags);
    }

    private function getCategoryId($category){
        $category = !isset($category['id']) ? Category::create($category) : Category::find($category['id']);
        return $category->id;
    }

    private function getTagIds($tags){
        $tagIds = [];
        foreach($tags as $tag){
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag['id'];
        }
        return $tagIds;
    }
}
