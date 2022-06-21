@extends('layouts.app')

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
    h2{
        font-family: 'Poppins', sans-serif;
        font-size: 20px;
        text-align: center;
        padding-top: 10px; 
    }

    .btn{
        max-width: fit-content;
    }
</style>

@section('content')
<div class="wrapper p-20 h-[100vh]">
    <div class="m-auto w-[400px] border-solid rounded-xl bg-white border-2 font-poppins drop-shadow-2xl">
        <div class="text-center text-xl rounded-t-xl mb-2 font-semibold bg-[#11386d] text-white leading-[75px]">Verifikasi Email Anda</div>
        
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <h2>
            Sebelum melanjutkan, harap periksa email Anda untuk verifikasi lebih lanjut. Jika Anda tidak menerima email
        </h2>

        <form action="{{ route('verification.resend') }}" method="post" class="d-flex justify-content-center mb-4">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                <h2>klik di sini untuk kirim ulang email</h2>
            </button>.
        </form>
    </div>
</div>
@endsection

