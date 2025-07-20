<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IPM_Develop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    /* Efek kilau emas */
    .shimmer-gold {
      background: linear-gradient(90deg, #FFD700, #fff8dc, #FFD700);
      background-size: 200% auto;
      color: transparent;
      background-clip: text;
      -webkit-background-clip: text;
      animation: shimmer 2s linear infinite;
    }

    @keyframes shimmer {
      0% {
        background-position: -200% center;
      }

      100% {
        background-position: 200% center;
      }
    }
  </style>
</head>

<body class="bg-gradient-to-r from-purple-700 to-purple-500 text-white">
  <div class="min-h-screen flex flex-col justify-center items-center px-4 text-center">
    <h1 class="shimmer-gold font-extrabold text-4xl sm:text-5xl mb-2">SEGERA HADIR</h1>
    <p class="text-lg sm:text-xl mb-10 max-w-xl">Aplikasi kami sedang dalam pembangunan</p>

    <div id="countdown" class="flex gap-6 mb-12 flex-wrap justify-center">
      <!-- Countdown boxes will be populated by JS -->
    </div>

    <a href="/" class="border border-white rounded-full px-6 py-2 font-semibold text-sm hover:bg-white hover:text-purple-700 transition-colors">
      Kembali
    </a>

    <footer class="mt-16 text-xs text-white/70" style="color: #FFD700">
      &copy; IPM_Develop.
    </footer>
  </div>

  <script>
    // === Countdown Timer ===
    const targetDate = new Date();
    targetDate.setDate(targetDate.getDate() + 72);

    const countdown = document.getElementById("countdown");

    function updateCountdown() {
      const now = new Date().getTime();
      const distance = targetDate - now;

      if (distance < 0) {
        countdown.innerHTML = "<p class='text-xl'>Kami sudah live! 🎉</p>";
        return;
      }

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      countdown.innerHTML = `
        <div class="bg-white shadow-lg rounded-xl w-24 h-24 flex flex-col justify-center items-center text-gray-800">
          <span class="font-extrabold text-2xl leading-none">${days}</span>
          <span class="text-xs uppercase tracking-widest">hari</span>
        </div>
        <div class="bg-white shadow-lg rounded-xl w-24 h-24 flex flex-col justify-center items-center text-gray-800">
          <span class="font-extrabold text-2xl leading-none">${hours}</span>
          <span class="text-xs uppercase tracking-widest">jam</span>
        </div>
        <div class="bg-white shadow-lg rounded-xl w-24 h-24 flex flex-col justify-center items-center text-gray-800">
          <span class="font-extrabold text-2xl leading-none">${minutes}</span>
          <span class="text-xs uppercase tracking-widest">menit</span>
        </div>
        <div class="bg-white shadow-lg rounded-xl w-24 h-24 flex flex-col justify-center items-center text-gray-800">
          <span class="font-extrabold text-2xl leading-none">${seconds}</span>
          <span class="text-xs uppercase tracking-widest">detik</span>
        </div>
      `;
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);

    // === BLOKIR INSPECT ELEMENT (untuk desktop) ===
    if (window.innerWidth > 768) {
      document.addEventListener('keydown', function (event) {
        const key = event.key.toLowerCase();
        if (
          (event.ctrlKey && ['u'].includes(key)) ||
          (event.key === 'F12') ||
          (event.ctrlKey && event.shiftKey && ['i', 'j', 'c'].includes(key))
        ) {
          event.preventDefault();
          window.location.href = '/'; // Atau: alert("Akses dibatasi!");
        }
      });

      document.addEventListener('contextmenu', function (event) {
        event.preventDefault();
        window.location.href = '/'; // Atau: alert("Klik kanan dinonaktifkan.");
      });
    }
  </script>
</body>

</html>
