@extends('web/layouts/cake')

@section('content')
    <main>
        <div class="create-post mt-4">
            <div class="container account-container p-5 text-left">
                @if ($errors->any())
                    <div class="alert alert-danger mb-5 mx-2" role="alert">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('post.store') }}" aria-label="{{ __('Create Post') }}">
                    @csrf
                    <div class="display-4 mb-5">
                        {{ __("Create Post") }}
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" value="{{ old('title') }}" required autofocus>
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="body">Content</label>
                        <textarea class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" rows="3" maxlength="50" required>{{ old('body') }}</textarea>
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