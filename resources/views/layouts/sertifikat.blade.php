<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        @font-face {
            font-family: 'Arial';
            src: url('/fonts/Arial.ttf');
        }
        body {
            font-family: 'Arial', sans-serif;
            background: url('/templates/sertifdummy.png') no-repeat center center;
            background-size: cover;
            width: 100%;
            height: 100%;
            position: relative;
        }
        .text {
            position: absolute;
            text-align: center;
            color: #000;
        }
        .name {
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 30px;
            font-weight: bold;
        }
        .birth {
            top: 53%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }
        .grade {
            top: 61%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            font-weight: bold;
        }
        .date {
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="text name">{{ $nama }}</div>
    <div class="text birth">
        Birth in {{ $tempatLahir }}, on {{ \Carbon\Carbon::parse($tanggalLahir)->format('d F Y') }}<br>
        Index Number: {{ $indexSertifikat }}
    </div>
    <div class="text grade">{{ $gradeMurid }}</div>
    <div class="text date">Metro, {{ \Carbon\Carbon::parse($tanggalGenerate)->format('d F Y') }}</div>
</body>
</html>
