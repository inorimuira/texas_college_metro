<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        @import url(https://db.onlinewebfonts.com/c/1c9478b7d31dc8f5c4f6b8b5f69148d2?family=CCTimelord);

        body {
            font-family: "CCTimelord";
            background: url('./assets/sertifikat/kelasGeneral-1.png') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100%;
            position: relative;
        }

        .text {
            font-family: "CCTimelord";
            position: absolute;
            text-align: center;
            color: #1C2C84;
        }

        .textBlack {
            font-weight: bolder;
        }

        .name {
            top: 46%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 30px;
            font-weight: bolder;
        }

        .birth {
            font-weight: 600;
            top: 49.5%;
            left: 40.5%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }

        .index {
            font-weight: 600;
            top: 51.5%;
            left: 40%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }

        .predikat {
            font-weight: 600;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            font-weight: bolder;
        }

        .dateRelease {
            font-weight: 600;
            top: 65.9%;
            left: 74.5%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="text name">{{ $nama }}</div>
    <div class="text birth">
        Birth in {{ $tempatLahir }}, on {{ \Carbon\Carbon::parse($tanggalLahir)->format('d F Y') }}
    </div>
    <div class="text index">
        Index Number {{ $indexSertifikat }} / TC / {{ \Carbon\Carbon::parse($tanggalGenerate)->format('F') }} / {{ \Carbon\Carbon::parse($tanggalGenerate)->format('Y') }}
    </div>
    <div class="text predikat">
        Having followed a course in English and passed <br>
        the <span class="textBlack">{{ $gradeMurid }}</span> examination <br>
        With <span class="textBlack">{{ $predikatMurid }}</span> result, is thereby qualified to hold <br>
        this certificate
    </div>
    <div class="text dateRelease">{{ \Carbon\Carbon::parse($tanggalGenerate)->format('d F Y') }}</div>
</body>

</html>
