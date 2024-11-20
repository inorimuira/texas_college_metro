<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Sukses</title>
</head>
<body>
    <h1>Selamat, {{ $nama }}!</h1>
    <p>Akun Anda telah berhasil didaftarkan dan kini dapat diakses.</p>
    <p>Terima kasih telah bergabung!</p>
    <p>
        Silakan <a href="{{ route('login') }}">login di sini</a> untuk mengakses akun Anda.
    </p>
</body>
</html>
