@extends('layouts.main')
@section('tags')
<div>
    <a class="icon-link icon-link-hover" href="{{route('posts.create')}}">
        Create
        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
        </tr>
        </thead>
        <tbody>

    @foreach($tags as $tag)
        <tr>

                <th scope="row"><a href="{{route('posts.show', $tag->id)}}">{{$tag->id}}</a> </th>
                <td>{{$tag->title}}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>
@endsection
