@extends('web/layouts/cake')

@section('content')
    <main>
        <div class="container p-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-3 text-muted">Created by {{ $post->user->name }}</h6>
                    <p class="card-text">{{ $post->body }}</p>
                    @can('update', $post)
                        <div>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                            <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger" 
                            onclick="event.preventDefault(); document.getElementById('delete-post').submit();">{{ __('Delete') }}</a>

                            <form id="delete-post" class="d-none" action="{{ route('post.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </main>
@endsection