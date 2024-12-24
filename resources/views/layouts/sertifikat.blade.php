<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif !important;
        }

        @page {
            size: A4 portrait;
            margin: 0;
        }

        @font-face {
            font-family: 'Inter';
            src: url('public/font/web/Inter-ExtraBold.woff2') format('truetype');
        }

        .text {
            position: absolute;
            color: #1C2C84;
            transform: translate(-50%, -50%);
        }

        .textBlack {
            font-family: "Inter", sans-serif !important;
        }

        .font-italic {
            font-style: italic !important;
        }

        .font-bold {
            font-weight: bolder !important;
        }

        .font-black {
            font-weight: 900 !important;
        }

        .font-thin {
            font-weight: lighter;
        }

        .page-1 {
            background: url('./assets/sertifikat/kelasGeneral-1.png') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .page-2 {
            font-optical-sizing: auto;
            background: url('./assets/sertifikat/kelasGeneral-2.png') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .name-1 {
            top: 46%;
            left: 50%;
            font-size: 30px;
        }

        .birth-1 {
            width: 100%;
            color: #1C2C84;
            top: 49.5%;
            left: 72.7%;
            font-size: 16px;
        }

        .index-1 {
            width: 100%;
            font-weight: 100;
            top: 51.5%;
            left: 72.7%;
            font-size: 16px;
        }

        .predikat-1 {
            font-weight: 400;
            top: 60%;
            left: 50%;
            font-size: 16px;
            text-align: center;
        }

        .dateRelease-1 {
            opacity: 0.6;
            font-weight: 600;
            top: 65.9%;
            left: 74.5%;
            font-size: 16px;
        }

        .name-2 {
            top: 21%;
            left: 50%;
            font-size: 30px;
        }

        .predikat-2 {
            top: 10.5%;
            left: 50%;
            font-size: 34px;
        }
    </style>
</head>

<body>
    <div class="page-1">
        <div class="text name-1 textBlack font-bold">{{ $nama }}</div>
        <div class="text birth-1 font-thin">
            <span class="">Birth in {{ $tempatLahir }}, on {{ \Carbon\Carbon::parse($tanggalLahir)->format('d F Y') }}</span>
        </div>
        <div class="text index-1 font-thin">
            Index Number {{ $indexSertifikat }} / TC / {{ \Carbon\Carbon::parse($tanggalGenerate)->format('F') }} / {{ \Carbon\Carbon::parse($tanggalGenerate)->format('Y') }}
        </div>
        <div class="text predikat-1">
            Having followed a course in English and passed <br>
            the <span class="textBlack font-italic font-bold">{{ $gradeMurid }}</span> examination <br>
            With <span class="textBlack font-italic font-bold">{{ $predikatMurid }}</span> result, is thereby qualified to hold <br>
            this certificate
        </div>
        <div class="text dateRelease-1">{{ \Carbon\Carbon::parse($tanggalGenerate)->format('d F Y') }}</div>
    </div>
    <div class="page-2">
        <div class="text name-2 textBlack font-bold">{{ $nama }}</div>
        <div class="text predikat-2 textBlack font-bold">
            {{ $gradeMurid }}
        </div>
        <div class="text dateRelease-2">Metro, {{ \Carbon\Carbon::parse($tanggalGenerate)->format('d F Y') }}</div>
    </div>

</body>

</html>
