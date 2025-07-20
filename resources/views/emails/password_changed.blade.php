<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Berhasil Diubah</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f8f8f8; padding: 30px;">
    <div style="background: white; padding: 20px; border-radius: 6px;">
        <h2>Password Anda Telah Diubah</h2>
        <p>Halo {{ $name ?? 'Pelanggan' }},</p>
        <p>Password akun Anda telah berhasil diubah pada:</p>
        <p><strong>{{ $date }}</strong></p>
        <p>Jika Anda tidak melakukan perubahan ini, segera hubungi tim support kami.</p>
        <br>
        <p>Salam,</p>
        <p><strong>PiNet Mart</strong></p>
    </div>
</body>
</html>
