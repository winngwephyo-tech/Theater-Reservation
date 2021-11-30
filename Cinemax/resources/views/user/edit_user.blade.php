@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link href="{{ asset('css/movie/common.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/user/user-edit.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('script')

@endsection

@section('content')
<div class="wrapper">
    <h3 class="form-title">Edit Your Information</h3>
    <form class="user-info-form" method="POST" enctype="multipart/form-data" action="/user_edit">
        @csrf
        <div class="input-wrapper">
            <div class="input-container">
                <input type=" text" id="name" name="name" class="user-info" placeholder="Name" class="name @error('name') is-invalid @enderror" value="{{ $user->name }}">
                @error('name')
                <span class="form-error">
                    <div>{{ $message }}</div>
                </span>
                @enderror
            </div>
            <div class="input-container">
                <input type=" text" id="email" name="email" class="user-info" placeholder="email" class="email @error('email') is-invalid @enderror" value="{{ $user->email }}">
                @error('email')
                <span class="form-error">
                    <div>{{ $message }}</div>
                </span>
                @enderror
            </div>
            <div class="input-container">
                <input type="text" id="phone" name="phone" class="user-info" placeholder="phone" class="phone @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
                @error('phone')
                <span class="form-error">
                    <div>{{ $message }}</div>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-button">
            <button type="submit" class="button submit">Update</button>
            <a class="button cancel" href="/">Cancel</a>
        </div>
    </form>
    <h3 class="form-title">Change Your Password</h3>
    <form action="/password_change" class="user-info-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-wrapper">
            <div class="input-container">
                <input type="password" id="password" name="current_password" class="user-info" placeholder="Current Password" class="current_password @error('current_password') is-invalid @enderror">
                @error('current_password')
                <span class="form-error">
                    <div>{{ $message }}</div>
                </span>
                @enderror
            </div>
            <div class="input-container">
                <input type="password" id="new_password" name="new_password" class="user-info" placeholder="New Password" class="new_password @error('new_password') is-invalid @enderror">
                @error('new_password')
                <span class="form-error">
                    <div>{{ $message }}</div>
                </span>
                @enderror
            </div>
            <div class="input-container">
                <input type="password" id="new_confirm_password" name="new_confirm_password" class="user-info" placeholder="New Confirm Password" class="new_confirm_password @error('new_confirm_password') is-invalid @enderror">
                @error('new_confirm_password')
                <span class="form-error">
                    <div>{{ $message }}</div>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-button">
            <button type="submit" class="button submit">Update</button>
            <a class="button cancel" href="/">Cancel</a>
        </div>
    </form>

    <form action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="button">
            {{ __('Log Out') }}
        </button>
    </form>

</div>
@endsection