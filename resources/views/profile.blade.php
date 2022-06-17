@extends('layouts.main')

@section('head')

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="assets/css/dashboardprofile.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/fonts.css" type="text/css" />
        <link rel="stylesheet" href="assets/css/profile.css" type="text/css" />
        <script src="assets/js/dashboard.js"></script>
        <script src="https://kit.fontawesome.com/6ba9b8f714.js" crossorigin="anonymous"></script>
        <title>SIPALING | Profile</title>
    </head>
@endsection

@section('content')
    <div class="global-profile-container">
        <div style="width: 65%; margin: 0 10rem 1rem 20%; text-align:right;">
            <button type="button" class="profile-edit-option" id="edit-button" onclick="openPopupPhoto()">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit Photo Profile
            </button>
        </div>
        <div class="pop-up-container-photo" id="photo">
            <div class="drop-zone">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" name="myFile" class="drop-zone__input" />
            </div>
            <button type="button" id="yes-button" onclick="closePopupPhoto()"><i
                    class="fa-solid fa-check"></i>Save</button>
            <button type="button" id="cancel-button" onclick="closePopupPhoto()"><i
                    class="fa-solid fa-xmark"></i>Cancel</button>
        </div>
        <div class="profile-container">
            <div class="profile-title">
                <h1>Profile</h1>
            </div>
            <div class="profile-img">
                <img src="assets/img/user-placeholder.png" alt="user" />
                <h2>{{ auth()->user()->nama }}</h2>
            </div>
            <div class="profile-name">
                <h3>NIK</h3>
                <div id="user-name">{{ auth()->user()->nik }}</div>
            </div>
            <div class="profile-nip">
                <h3>NIP</h3>
                <div id="user-nip">{{ auth()->user()->nip }}</div>
            </div>
            <div class="profile-name">
                <h3>Nama</h3>
                <div id="user-name">{{ auth()->user()->nama }}</div>
            </div>
            <div class="profile-name">
                <h3>Alamat</h3>
                <div id="user-name">{{ auth()->user()->alamat }}</div>
            </div>
            <div class="profile-name">
                <h3>Jenis kelamin</h3>
                <div id="user-name">{{ auth()->user()->jenis_kelamin }}</div>
            </div>
            <div class="profile-name">
                <h3>Jurusan</h3>
                <div id="user-name">{{ $nama_department }}</div>
            </div>
            <div class="profile-name">
                <h3>Email</h3>
                <div id="user-name">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>
    </div>

    <script src="assets/js/profile.js"></script>
    <script src="assets/js/dragPhoto.js"></script>
    <script src="assets/js/popupPhoto.js"></script>
@endsection
