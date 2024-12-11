@extends('layouts.main')
@section('posts')
<div>
    <a class="icon-link icon-link-hover" href="{{route('post.index')}}">
        Back
        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
    </a>
    <div class="card" style="width: 18rem;">
        <img src="{{$post->image}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->post_content}}</p>

            @if($post->category != null)
                <div>

                    <p class="btn btn-group">{{$post->category->title}}</p>
                </div>
            @endif
            <div>
                <p class="btn btn-group">
                    @foreach($post->tags as $tag)
                        {{$tag->title}}</br>
                    @endforeach
                </p>
            </div>
            <a href="#" class="btn btn-primary">{{$post->likes}}</a>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info">Update</a>
                </div>
                <div class="col">
                    <form action="{{route('posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </div>
            </div>
        </div>
    </div>



</div>
@endsection
