<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting to PERWIRA...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* === Background dengan Gambar === */
        body {
            background-image: url('{{ asset('tamplate/assets/img/background_abu.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;

            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* === Logo animasi bounce === */
        .logo-bounce {
            width: 25vw;
            max-width: 180px;
            min-width: 100px;
            height: auto;
            animation: bounce-in 1s ease-out;
        }

        @keyframes bounce-in {
            0% {
                transform: translateY(-200%) scale(1);
                opacity: 0;
            }
            60% {
                transform: translateY(30%) scale(1.1);
                opacity: 1;
            }
            80% {
                transform: translateY(-10%) scale(1.05);
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 480px) {
            .logo-bounce {
                width: 40vw;
                max-width: 140px;
            }
        }
    </style>
</head>

<body>
    <!-- Logo PERWIRA -->
    <img src="{{ asset('tamplate/assets/img/logo_perwira.png') }}" alt="PERWIRA" class="logo-bounce">

    <!-- Redirect otomatis -->
    <script>
        setTimeout(() => {
            window.location.href = @json($signedUrl);
        }, 2500); // 2.5 detik delay sebelum redirect
    </script>
</body>
</html>
