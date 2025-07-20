<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PiNet Mart | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/auth-style.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="login-wrapper">
        <div class="login-container">
            <!-- Logo -->
            <div class="logo-floating">
                <img src="{{ asset('tamplate/assets/img/logo_perwira.png') }}" alt="Logo" />
            </div>

            <!-- LOGIN FORM -->
            <!-- ==================== LOGIN FORM ==================== -->
            <form id="login-form" style="display: block;" data-login-url="{{ route('customer.login.process') }}">
                <div class="mb-2">
                    <label for="email" class="form-label text-gold">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="email" name="email" required autofocus />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label text-gold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required />
                        <button type="button" class="btn-password-toggle" tabindex="-1"
                            aria-label="Toggle password visibility" id="toggleLoginPasswordBtn">
                            <i class="bi bi-eye" id="toggleLoginPasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" />
                    <label class="form-check-label text-gold" for="remember">Remember me</label>
                </div>

                <!-- SPINNER LOGIN -->
                <div id="spinner-overlay"
                    style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 9999; justify-content: center; align-items: center;">
                    <img src="{{ asset('tamplate/assets/img/gif/spiner_gif.gif') }}" alt="Loading..." width="100"
                        height="100" />
                </div>

                <button type="submit" class="btn btn-login w-100">Login</button>

                <div class="text-center mt-2">
                    <span id="show-register" class="toggle-link">Don't have an account? Register</span>
                </div>
                <div class="text-center mt-2">
                    <span id="show-forgot-password" class="toggle-link">Forgot Password?</span>
                </div>
            </form>

            <!-- ==================== REGISTER FORM ==================== -->
            <form id="register-form" style="display: none;" data-register-url="{{ route('customer.register') }}">
                <div class="mb-2">
                    <label for="name" class="form-label text-gold">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" id="name" name="name" required autofocus />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="country" class="form-label text-gold">Country</label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="" disabled selected>Select your country</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Singapore">Singapore</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label for="phone" class="form-label text-gold">Phone Number</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                        <input type="tel" class="form-control" id="phone" name="phone" required />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="email_register" class="form-label text-gold">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="email_register" name="email" required />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password_register" class="form-label text-gold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password_register" name="password"
                            required />
                        <button type="button" class="btn-password-toggle" tabindex="-1"
                            id="toggleRegisterPasswordBtn">
                            <i class="bi bi-eye" id="toggleRegisterPasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password_confirmation" class="form-label text-gold">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required />
                        <button type="button" class="btn-password-toggle" tabindex="-1"
                            id="toggleConfirmPasswordBtn">
                            <i class="bi bi-eye" id="toggleConfirmPasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- SPINNER REGISTER -->
                <div id="regist-overlay"
                    style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 9999; justify-content: center; align-items: center;">
                    <img src="{{ asset('tamplate/assets/img/gif/regist_gif.gif') }}" alt="Loading..." width="100"
                        height="100" />
                </div>

                <button type="submit" class="btn btn-login w-100 mt-2">Register</button>

                <div class="text-center mt-2">
                    <span id="show-login-from-register" class="toggle-link">Already have an account? Login</span>
                </div>
            </form>


            <!-- FORGOT PASSWORD FORM -->
            <form id="forgot-form" style="display: none;" data-forgot-url="{{ route('customer.password.email') }}">
                <!-- @csrf -->
                <div class="mb-2">
                    <label for="forgot_email" class="form-label text-gold">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="forgot_email" name="email" required
                            autofocus />
                    </div>
                </div>

                <!-- SPINNER FORGOT -->
                <div id="forgot-overlay"
                    style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 9999; display: none; justify-content: center; align-items: center;">
                    <img src="{{ asset('tamplate/assets/img/gif/gift_lari.gif') }}" alt="Loading..." width="100"
                        height="100" />
                </div>


                <button type="submit" class="btn btn-login w-100">Reset Password</button>

                <div class="text-center mt-2">
                    <span id="show-login-from-forgot" class="toggle-link">Back to Login</span>
                </div>
            </form>
        </div>
    </div>

    <!-- JS Libs -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/auth-script.js') }}"></script>

    {{-- === SWEETALERT FLASH MESSAGE === --}}
    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: {!! json_encode(session('success')) !!},
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: {!! json_encode(session('error')) !!},
                    showConfirmButton: true
                });
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let messages = {!! json_encode($errors->all()) !!};
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    html: messages.join('<br>'),
                    showConfirmButton: true
                });
            });
        </script>
    @endif
</body>


</html>
