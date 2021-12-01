<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login/style.css') }}">

<div class="wrapper">
    <div class="card">
        <h2>{{ __('Register') }}</h2>

        <div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <p class="f-12 p-20" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>

                <div>

                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <p class="f-12 p-20" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                <div>

                    <input id="phone" placeholder="Phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                    @error('phone')
                    <p class="f-12 p-20" role="alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror

                </div>

                <div>

                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <p class="f-12 p-20" " role=" alert">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror

                </div>

                <div>


                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

                <button type="submit" class="button">
                    {{ __('Register') }}
                </button>

                <p class="f-12 p-20"><a href="{{route('login')}}">Already Have an Account?</a></p>
            </form>
        </div>
    </div>
</div>