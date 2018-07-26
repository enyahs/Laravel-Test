@extends('web/layouts/cake')

@section('content')
    <main>
        <div class="container p-4 mt-4">
            @if (session('status'))
                <div class="alert alert-success mb-5 mx-2" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h3 class="pb-1">{{ __('Newest Posts') }}</h3>
            <div class="posts pb-3">
                @foreach ($posts as $post)
                    <a href="{{ route('post.show', $post->id) }}">
                        <div class="post card card-body bg-light mt-3">
                            {{ $post->title }}
                        </div>
                    </a>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </main>
@endsection