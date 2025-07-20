<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Verifikasi Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        h2 {
            color: #343a40;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            background-color: #ffc107;
            color: #000;
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn:hover {
            background-color: #e0a800;
            box-shadow: 0 6px 16px rgba(255, 193, 7, 0.6);
        }

        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Verifikasi Login Anda</h2>

        <p>Halo,</p>

        <p>Kami menerima permintaan login dari IP: <strong>{{ $ip ?? 'Tidak diketahui' }}</strong>.</p>

        <p>Jika ini adalah Anda, silakan klik tombol di bawah untuk memverifikasi login Anda:</p>

        <p>
            <a href="{{ $url }}" class="btn">Verifikasi Login</a>
        </p>

        <p>Link ini hanya berlaku selama <strong>3 jam</strong>.</p>

        <p>Jika Anda tidak melakukan permintaan ini, abaikan email ini. Tidak ada tindakan lebih lanjut yang akan diambil.</p>

        <div class="footer">
            &copy; {{ date('Y') }} Pinetmart. Semua hak dilindungi.
        </div>
    </div>
</body>

</html>
