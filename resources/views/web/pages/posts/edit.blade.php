@extends('web/layouts/cake')

@section('content')
    <main>
        <div class="edit-post mt-4">
            <div class="container account-container p-5 text-left">
                @if ($errors->any())
                    <div class="alert alert-danger mt-4 mx-2" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('post.update', $post->id) }}" aria-label="{{ __('Edit Post') }}">
                    @csrf
                    @method('PUT')
                    <div class="display-4 mb-5">
                        {{ __("Edit Post") }}
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $post->title or old('title') }}" required autofocus>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea id="body" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" rows="3" maxlength="50" required>{{ $post->body or old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>
@endsection