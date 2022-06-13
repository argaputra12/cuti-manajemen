@extends('layouts.app')

@section('content')
<div class="wrapper p-20 h-[100vh]">
    <div class="m-auto w-[380px] border-solid rounded-xl bg-white border-2 font-poppins drop-shadow-2xl">
        <div class="text-center text-xl rounded-t-xl mb-2 font-semibold bg-[#11386d] text-white leading-[75px]">Login Form</div>
        
        @if (session()->has('status'))
        <div class="text-center text-l bg-gray-200 text-[#11386d] font-semibold mt-5 mx-auto w-3/4 py-1 border-2 border-gray-300 rounded">
            {{ session()->get('status') }}
        </div>
            
        @endif

        @if (session()->has('loginError'))
        <div class="text-center text-l bg-gray-100 text-pink-800 font-semibold mt-3 mx-auto w-3/4 py-1 border-2 border-pink-800 rounded">
            {{ session()->get('loginError') }}
        </div>
            
        @endif
        <form action="{{ route('login') }}" method="post" class="flex flex-col pt-[5x] px-[30px] pb-[50px]">
            @csrf
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px]
                @error('email') invalid:border-pink-800 invalid:text-pink-800 @enderror" type="text" required placeholder="Email Address" name="email"></input>
            </div>
            @error('email')
            <p class="mt-2 text-pink-800 text-sm">
                Email tidak valid
              </p>
            @enderror
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input class="h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px]" type="password" required placeholder="Password" name="password"></input>
            </div>
            <div class="content flex w-[100%] h-[50px] text-base items-center justify-around">
                <div class="checkbox flex items-center justify-center">
                    <input type="checkbox" id="remember" name="remember" class="w-[15px] h-[15px] bg-sky-700" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="pl-1">Remember Me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn btn-link">
                        {{ __('Forgot Your Password') }}
                    </a>
                @endif
            </div>
            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input type="submit" value="Login" class="mt-[-10px] text-xl font-semibold bg-[#11386d] text-white text-center rounded-[25px] w-[100%] mx-auto py-1 cursor-pointer"></input>

                
                <div class="signup-link mt-[20px] text-center">Not registered yet? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register now</a></div>
            </div>
        </form>
    </div>
</div>
@endsection
