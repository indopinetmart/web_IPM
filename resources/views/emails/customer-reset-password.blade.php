<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body>
    <h2>Halo!</h2>
    <p>Kami menerima permintaan untuk reset password Anda.</p>
    <p>
        Klik tombol berikut untuk mengatur ulang password Anda:
    </p>
    <p>
        <a href="{{ $resetUrl }}" style="background: #ffcc00; padding: 10px 20px; color: black; text-decoration: none;">
            Reset Password
        </a>
    </p>
    <p>Link ini berlaku selama 30 menit.</p>
    <br>
    <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
</body>
</html>
