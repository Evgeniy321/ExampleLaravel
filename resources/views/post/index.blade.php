@extends('layouts.main')
@section('posts')
    <div>
        <a class="icon-link icon-link-hover" href="{{ route('posts.create') }}">
            Create
            <svg class="bi" aria-hidden="true">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                    <th scope="col">likes</th>
                    <th scope="col">tag</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $post)
                    <tr>

                        <th scope="row"><a href="{{ route('posts.show', $post->id) }}">{{ $post->id }}</a> </th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->post_content }}</td>
                        <td>{{ $post->likes }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                {{ $tag->title }}</br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-center">
            {{ $posts->withQueryString()->links() }}
        </div>

    </div>
@endsection
