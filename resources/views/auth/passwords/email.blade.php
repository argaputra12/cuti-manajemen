@extends('layouts.app')

@section('content')
<div class="wrapper p-20 h-[100vh]">
    <div class="m-auto w-[380px] border-solid rounded-xl bg-white border-2 font-poppins drop-shadow-2xl">
        <div class="text-center text-xl rounded-t-xl mb-2 font-semibold bg-[#11386d] text-white leading-[75px]">Reset Password</div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="post" class="flex flex-col pt-[5x] px-[30px] pb-[50px]">
            @csrf

            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <input id="email" type="email" class="form-control h-[100%] w-[100%] text-[17px] pl-[20px] border-solid border-[1px] border-gray-600 rounded-[25px] 
                @error('email') is-invalid invalid:border-pink-800 invalid:text-pink-800" @enderror name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email Address">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="field h-[50px] w-[100%] mt-[20px] relative">
                <button type="submit" class="mt-[20px] text-xl font-semibold bg-[#11386d] text-white text-center rounded-[25px] w-[100%] mx-auto py-1 cursor-pointer">{{ __('Send Password Reset Link') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
