@extends('layouts.main')
@section('posts')
<div>
    <form action = "{{route('posts.store')}}" method="post" >
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="tilte"
                   value="{{old('title')}}"
                   placeholder="title">
            @error('title')
                <p class="text-bg-danger">it's error!!! {{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea name="post_content" class="form-control" id="content" placeholder="content">{{old('post_content')}}</textarea>
            @error('post_content')
            <p class="text-bg-danger">it's error!!! {{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input  type="text" name="image" class="form-control" id="image" placeholder="image">
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="number" name="likes" class="form-control" id="likes" placeholder="likes">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id" id="category">
                @foreach($categories as $category)
                    <option
                        {{old('category_id') == $category->id? 'selected ' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach


            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
