
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">

<div class="wrapper">
            <div class="card">
                <h2>Login</h2>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <spanrole="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit" class="button">
                                    {{ __('Login') }}
                                </button>

                                <p class="f-12 p-20"><a href="{{route('register')}}">Create New Account</a></p>

                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="f-12">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
