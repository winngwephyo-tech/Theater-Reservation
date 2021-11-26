
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">

<div class="wrapper">
            <div class="card">
                <h3>{{ __('Reset Password') }}</h3>

                <div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div>
                                <input id="email" placeholder="Your Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <p class="f-12 p-20" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                                @enderror
                        </div>

                        <div>
                                <button type="submit" class="button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                <p class="f-12 p-20"><a href="{{route('register')}}">Create New Account</a></p>
                        </div>
                    </form>
                </div>
            </div>
</div>