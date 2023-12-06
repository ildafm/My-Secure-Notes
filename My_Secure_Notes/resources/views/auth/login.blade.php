<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>S Notes | Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../template/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../template/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../template/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../template/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../template/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../template/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../template/css/style.css" rel="stylesheet">

</head>

<body>
    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo d-flex align-items-center w-auto">
                                    <img src="../template/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">SNotes</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>

                                    {{-- start form login --}}
                                    <form class="row g-3 needs-validation" novalidate method="POST"
                                        action="{{ route('login') }}"
                                        onsubmit="document.getElementById('btn_login').disabled = true">
                                        @csrf

                                        {{-- email label --}}
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="yourEmail" required placeholder="Masukan Email">

                                                <div class="invalid-feedback" id="emailEmptyError"
                                                    style="display: none;">Kolom email tidak boleh kosong.
                                                </div>
                                                <div class="invalid-feedback" id="emailNotValidError"
                                                    style="display: none;">Silahkan masukan
                                                    alamat email yang valid.
                                                </div>

                                                @error('email')
                                                    <div id="wrongEmailOrPasswordError" class="invalid-feedback">Email atau
                                                        password yang anda masukan
                                                        salah
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- password label --}}
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" pattern=".{8,}" required
                                                placeholder="Masukan Password">
                                            <div class="invalid-feedback" id="passwordEmptyError">
                                                Silahkan isi password.
                                            </div>
                                            <div class="invalid-feedback" id="passwordLengthError"
                                                style="display: none;">
                                                Password tidak boleh kurang dari 8 karakter.
                                            </div>
                                        </div>

                                        {{-- remember me button --}}
                                        {{-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> --}}


                                        <div class="col-12">
                                            <p class="small mb-0">Forgot your password? <a href="/forgot-password">Reset
                                                    password</a></p>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" id="btn_login"
                                                disabled>Login</button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="/register">Create an
                                                    account</a></p>
                                        </div>

                                    </form>
                                    {{-- end form login --}}

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- global variabel --}}
    <script>
        var wrongEmailOrPasswordError = document.getElementById('wrongEmailOrPasswordError');
        var btnLogin = document.getElementById('btn_login');

        let status_email = false;
        let status_password = false;

        function checkBtnLogin() {
            if (status_email == true && status_password == true) {
                btnLogin.disabled = false;
            } else {
                btnLogin.disabled = true;
            }
        }
    </script>

    {{-- email error message --}}
    <script>
        var emailInput = document.getElementById('yourEmail');
        var emailEmptyError = document.getElementById('emailEmptyError');
        var emailNotValidError = document.getElementById('emailNotValidError');

        // email error message management
        emailInput.addEventListener('input', function() {
            var email = this.value;

            // Cek jika email kosong
            if (email.trim() === '') {

                emailEmptyError.style.display = 'block';

                emailNotValidError.style.display = 'none';

                emailInput.classList.remove('is-valid');
                emailInput.classList.add('is-invalid');

                status_email = false;
                checkBtnLogin()

                wrongEmailOrPasswordError.style.display = 'none';
            } else if (!isValidEmail(email)) {
                emailEmptyError.style.display = 'none';

                emailNotValidError.style.display = 'block';

                emailInput.classList.remove('is-valid');
                emailInput.classList.add('is-invalid');

                status_email = false;
                checkBtnLogin()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else {

                emailEmptyError.style.display = 'none';

                emailNotValidError.style.display = 'none';

                emailInput.classList.remove('is-invalid');
                emailInput.classList.add('is-valid');

                status_email = true;
                checkBtnLogin()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            }

        });

        function isValidEmail(email) {
            // Gunakan regular expression untuk memeriksa apakah email valid
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>

    {{-- password --}}
    <script>
        var passwordInput = document.getElementById('yourPassword');
        var passwordLengthError = document.getElementById('passwordLengthError');
        var passwordEmptyError = document.getElementById('passwordEmptyError');

        // password error message management
        passwordInput.addEventListener('input', function() {
            var password = this.value;

            // Cek jika password kosong
            if (password.trim() === '') {

                passwordEmptyError.style.display = 'block';

                passwordLengthError.style.display = 'none';

                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');

                status_password = false;
                checkBtnLogin()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else if (password.length < 8) {

                passwordEmptyError.style.display = 'none';

                passwordLengthError.style.display = 'block';

                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');

                status_password = false;
                checkBtnLogin()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }
            } else {

                passwordEmptyError.style.display = 'none';

                passwordLengthError.style.display = 'none';

                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');

                status_password = true;
                checkBtnLogin()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }
            }

        });
    </script>

    <!-- Vendor JS Files -->
    <script src="../template/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../template/vendor/chart.js/chart.umd.js"></script>
    <script src="../template/vendor/echarts/echarts.min.js"></script>
    <script src="../template/vendor/quill/quill.min.js"></script>
    <script src="../template/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../template/vendor/tinymce/tinymce.min.js"></script>
    <script src="../template/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../template/js/main.js"></script>

</body>

</html>
