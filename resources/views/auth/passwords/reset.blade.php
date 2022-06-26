@extends('layouts.app')

@section('content')
<div class="wrapper p-20 h-[100vh]">
    <div class="m-auto w-[380px] border-solid rounded-xl bg-white border-2 font-poppins drop-shadow-2xl">
        <div class="text-center text-xl rounded-t-xl mb-2 font-semibold bg-[#11386d] text-white leading-[75px]">Reset Password</div>
        <form action="{{ route('password.update') }}" method="post" class="flex flex-col pt-[5x] px-[30px] pb-[50px]">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] 
                @error('email') invalid:border-pink-800 invalid:text-pink-800 @enderror" required placeholder="Email Address" name="email" id="email" type="email"
                value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
            </div>
            @error('email')
            <p class="mt-2 text-pink-800 text-sm">
                Email tidak valid
              </p>
            @enderror
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px]" type="password" required placeholder="Password" name="password"
                id="password" autocomplete="new-password">
            </div>
            @error('password')
                <p class="mt-2 text-pink-800 text-sm">
                    <strong>{{ $message }}</strong>
                </p>
            @enderror
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px]" type="password" required placeholder="Confirm Password" name="password_confirmation" 
                id="password-confirm" autocomplete="new-password">
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <button type="submit" class="mt-[20px] text-xl font-semibold bg-[#11386d] text-white text-center rounded-[25px] w-[100%] mx-auto py-1 cursor-pointer">{{ __('Reset Password') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
