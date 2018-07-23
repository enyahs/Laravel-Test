@extends('web/layouts/cake')

@section('content')
    <main>
        @if (session('status'))
            <div class="alert alert-success mt-4 mx-2" role="alert">
                {{ session('status') }}
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger mt-4 mx-2" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="reset-password mt-4">
            <div class="container account-container p-4 text-center">
                <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="display-4 mb-5">
                        {{ __('Reset Password') }}
                    </div>
                    <div class="mt-3">
                        <input id="email" class="border-top-0 w-100 ft-5 py-4 border-right-0 border-left-0 border-bottom{{ $errors->has('email') ? ' is-invalid' : '' }}" style="background: transparent;" type="email" name="email" placeholder="Email address" value="{{ $email ?? old('email') }}" required autofocus>
                        
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <input id="password" class="border-top-0 w-100 ft-5 py-3 border-right-0 border-left-0 border-bottom{{ $errors->has('password') ? ' is-invalid' : '' }}" style="background: transparent;" type="password" name="password" placeholder="Password" required>
                        
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mt-3">
                        <input id="password-confirm" class="border-top-0 w-100 ft-5 py-3 border-right-0 border-left-0 border-bottom{{ $errors->has('password') ? ' is-invalid' : '' }}" style="background: transparent;" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                    <div class="mt-5">
                        <input class="w-100 bg-primary text-light ft-5 py-3 border-0" style="background: transparent;" type="submit" value="Reset Password" />
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection