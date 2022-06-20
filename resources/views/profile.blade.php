@extends('layouts.main')

@section('head')

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="assets/css/dashboardprofile.css" type="text/css" />
        {{-- <link rel="stylesheet" href="assets/css/fonts.css" type="text/css" /> --}}
        <link rel="stylesheet" href="assets/css/profile.css" type="text/css" />
        <script src="assets/js/dashboard.js"></script>
        <script src="https://kit.fontawesome.com/6ba9b8f714.js" crossorigin="anonymous"></script>
        <title>SIPALING | Profile</title>
    </head>
@endsection

@section('content')
    <div class="global-profile-container">
        <div style="width: 65%; margin: 0 10rem 1rem 20%; text-align:right;">
            <button type="button" class="profile-edit-option" id="edit-profile-button" onclick="openPopupProfile()">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit Profile
            </button>
            <button type="button" class="photo-edit-option" id="edit-photo-button" onclick="openPopupPhoto()">
                <i class="fa-regular fa-pen-to-square"></i>
                Edit Photo Profile
            </button>
        </div>
        <div class="pop-up-container-photo" id="edit-photo">
            <div class="drop-zone">
                <span class="drop-zone__prompt">Drop file here or click to upload</span>
                <input type="file" name="myFile" class="drop-zone__input" />
            </div>
            <button type="button" id="yes-button" onclick="closePopupPhoto()"><i
                    class="fa-solid fa-check"></i>Save</button>
            <button type="button" id="cancel-button" onclick="closePopupPhoto()"><i
                    class="fa-solid fa-xmark"></i>Cancel</button>
        </div>
        <div class="pop-up-container-profile" id="edit-profile">
            <div class="edit-profile-container">
                <span>Edit Profile</span>
                <form action="{{ route('update_user') }}" method="post" class="form-profile">
                    @csrf
                    <div style="display: flex; flex-direction: column; margin-top: 38px">
                        <label for="nik">NIK</label>
                        <input type="text" placeholder="NIK" name="nik" id="nik" autocomplete="off"
                            value="{{ auth()->user()->nik }}">
                        @error('nik')
                            <p style="color: red; font-size: 10px; text-align: right; margin: 0; line-height: 1;">
                                NIK salah atau telah digunakan
                            </p>
                        @enderror
                        <label for="nip">NIP</label>
                        <input type="text" placeholder="Nomor Induk Pegawai" name="nip" id="nip"
                            value="{{ auth()->user()->nip }}">
                        @error('nip')
                            <p style="color: red; font-size: 10px; text-align: right;">
                                NIP salah atau telah digunakan
                            </p>
                        @enderror
                        <label for="nama">Nama</label>
                        <input type="text" placeholder="Nama" name="nama" id="nama"
                            value="{{ auth()->user()->nama }}">
                        @error('nama')
                            <p style="color: red; font-size: 10px; text-align: right;">
                                Masukan nama
                            </p>
                        @enderror
                        <label for="alamat">Alamat</label>
                        <input type="text" placeholder="Alamat" name="alamat" id="alamat"
                            value="{{ auth()->user()->alamat }}">
                        @error('nama')
                            <p style="color: red; font-size: 10px; text-align: right;">
                                Masukan Alamat
                            </p>
                        @enderror
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" value="{{ auth()->user()->jenis_kelamin }}">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <label for="department_id">Jurusan</label>
                        <select name="department_id" id="department_id" value="{{ auth()->user()->departement_id }}">
                            <option value="1">Informatika</option>
                            <option value="2">Matematika</option>
                            <option value="3">Fisika</option>
                            <option value="4">Biologi</option>
                            <option value="5">Statistika</option>
                            <option value="6">Kimia</option>
                        </select>
                    </div>
                    <div style="display: block;">
                        <button type="submit" id="yes-button" style="padding-right:4px"><i
                                class="fa-solid fa-check"></i>Save</button>
                        <button type="button" id="cancel-button" onclick="closePopupProfile()"><i
                                class="fa-solid fa-xmark"></i>Cancel</button>
                    </div>
                </form>
            </div>

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
                <div id="user-name" style="text-transform: capitalize;">{{ auth()->user()->jenis_kelamin }}</div>
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
    <script src="assets/js/editProfile.js"></script>
@endsection
