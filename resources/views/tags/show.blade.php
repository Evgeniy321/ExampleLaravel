@extends('layouts.main')
@section('tags')
    <div>
        <a class="icon-link icon-link-hover" href="{{route('tags.index')}}">
            Back
            <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
        </a>
        <div class="card" style="width: 18rem;">
            <img src="{{$tag->image}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$tag->title}}</h5>
            </div>
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <a href="{{route('posts.edit', $tag->id)}}" class="btn btn-info">Update</a>
                    </div>
                    <div class="col">
                        <form action="{{route('posts.destroy', $tag->id)}}" method="post">
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
