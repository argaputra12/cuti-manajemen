<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumen Approval Cuti</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            line-height: 1.5;
            font-family: 'Times New Roman', Times, serif;
        }
        @page{
            margin-top:0;
            margin-left: 20px;
            margin-right: 20px;
        }
        .kopsurat{
            width: 755px;
            padding-left: 15px
        }
        .kopsurat img{
            width:100%;
            height:auto;
        }
        .body-surat{
            padding:20px 60px;
        }
        .para1{
            text-align: right;
            margin-right: 10px;
            margin-bottom: 20px;
        }
        .pembuka-surat{
            margin: 10px 0 60px 0;
        }

        .pembuka-surat .nomor span{
            width: 10px
        }
        .pembuka-surat .nomor{
            width: 20px
        }
        .para3 .salam-pembuka{
            margin-bottom: 10px;
        }
        .penutup-surat{
            margin-top: 20px;
        }
        p{
            word-spacing: 5px;
        }
        .ttd-container{
            margin-top: 120px;
            margin-right: 0px;
            margin-left: auto;
            width: 40%;
        }
        .ttd{
            text-align: center;
        }
        .tempat-ttd{
            height: 100px;
        }
        .karyawan{
            margin:10px 30px;
        }
    </style>
</head>
<body>
    <div class="kopsurat">

        <img src="assets/img/kopmipauns.png" width="" alt="">
    </div>
    <div class="body-surat">
        <div class="para1">
            <p>Surakarta, {{ $data->tanggal }}</p>
        </div>
        <table class="pembuka-surat">
            <tr>
                <td style="width: 90px">Nomor</td>
                <td>: {{ $data->id }}/SIPPALING/MIPA/{{ $bulan }}/{{ $data->tahun }}</td>
            </tr>
            <tr>
                <td>Hal</td>
                <td>: Balasan</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>: -</td>
            </tr>
        </table>
        <div class="para3">
            <p class="salam-pembuka">Dengan hormat,</p>
            <p>Menindak lanjuti surat permohonan izin dari saudara perihal permohonan cuti, saya yang bertanda tangan di bawah ini:</p>
            <table class="karyawan">
                <tr>
                    <td style="width: 90px">Nama</td>
                    <td>: Arga Putra </td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>: 123456789</td>
                </tr>
            </table>
            <p>Menerangkan bahwa :</p>
            <table class="karyawan">
                <tr>
                    <td style="width: 90px">Nama</td>
                    <td>: {{ $data->nama_user }} </td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>: {{ $data->nip }}</td>
                </tr>
            </table>
            <p class="penutup-surat">Dan setuju, memberikan izin untuk tidak masuk bekerja pada tanggal {{ $data->tanggal_mulai }} sampai tanggal {{ $data->tanggal_selesai }} dengan masa cuti selama {{ $data->durasi_cuti }} hari.</p>
            <p>Demikian surat balasan ini disampaikan untuk dipergunakan sebagaimana semestinya.</p>
        </div>
        <div class="ttd-container ">
            <div class="ttd">
                <p>Surakarta, {{ $data->tanggal }}</p>
                <p>Kepala Bagian Umum</p>
                <div class="tempat-ttd"></div>
                <p>Aldo Atallah Duta Dhanubrata</p>
            </div>
        </div>

    </div>
</body>
</html>
