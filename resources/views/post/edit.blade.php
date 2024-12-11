@extends('layouts.main')
@section('posts')
<div>
    <form action = "{{route('posts.update', $post->id)}}" method="post" >
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="tilte" placeholder="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea name="post_content" class="form-control" id="content" placeholder="content" >{{$post->post_content}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input  type="text" name="image" class="form-control" id="image" placeholder="image" value="{{$post->image}}">
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="number" name="likes" class="form-control" id="likes" placeholder="likes" value="{{$post->likes}}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" aria-label="Default select example" id="category">
                @foreach($categories as $category)
                    <option
                       @if($post->category != null)
                           {{$category->id === $post->category->id ? ' selected': ''}}
                       @endif
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option
                        @if($post->tags != null)
                            @foreach($post->tags as $postTag)
                                {{$tag->id === $postTag->id ? ' selected': ''}}
                            @endforeach

                        @endif

                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach


            </select>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
