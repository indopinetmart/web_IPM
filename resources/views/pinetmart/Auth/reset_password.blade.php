<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PiNet Mart | Reset Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/auth-style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="login-wrapper">
        <div class="login-container">

            <!-- Logo -->
            <div class="logo-floating mb-4">
                <img src="{{ asset('tamplate/assets/img/logo_perwira.png') }}" alt="Logo" />
            </div>

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('customer.password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label class="form-label text-gold">Password Baru</label>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label class="form-label text-gold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required />
                </div>

                <!-- SPINNER OVERLAY -->
                <div id="reset-overlay"
                    style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 9999; justify-content: center; align-items: center;">
                    <img src="{{ asset('tamplate/assets/img/gif/spiner_gif.gif') }}" alt="Loading..." width="100"
                        height="100" />
                </div>

                <button type="submit" class="btn btn-login w-100">Reset Password</button>
            </form>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Optional: Custom JS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const resetForm = document.querySelector('form[action="{{ route('customer.password.update') }}"]');
            const spinnerReset = document.getElementById("reset-overlay");

            const showOverlay = (el) => { if (el) el.style.display = "flex"; };
            const hideOverlay = (el) => { if (el) el.style.display = "none"; };

            if (resetForm) {
                resetForm.addEventListener("submit", () => {
                    showOverlay(spinnerReset);
                });
            }
        });
    </script>

    {{-- SweetAlert untuk Notifikasi Session --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: @json(session('success')),
                timer: 3000,
                showConfirmButton: false,
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: @json(session('error')),
                showConfirmButton: true,
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: "error",
                title: "Terjadi Kesalahan",
                html: {!! json_encode(implode('<br>', $errors->all())) !!},
                showConfirmButton: true,
            });
        </script>
    @endif
</body>

</html>
