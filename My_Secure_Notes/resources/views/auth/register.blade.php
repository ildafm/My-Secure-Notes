<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>S Notes | Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../template/img/favicon.png" rel="icon">
    <link href="../template/img/apple-touch-icon.png" rel="apple-touch-icon">

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
                                        <h5 class="card-title text-center pb-0 fs-4">Buat Akun Baru</h5>
                                        <p class="text-center small">Silahkan isi kolom pendaftaran berikut ini</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate method="POST"
                                        action="{{ route('register') }}">
                                        @csrf

                                        {{-- kolom username --}}
                                        <div class="col-12">
                                            <label for="yourName" class="form-label">Username</label>
                                            <input type="text" name="name" class="form-control" id="yourName"
                                                value="{{ old('name') }}" required autofocus maxlength="255"
                                                placeholder="Username, maximal 255 karakter">
                                            <div class="invalid-feedback" id="nameEmptyError">Username tidak boleh
                                                kosong
                                            </div>
                                        </div>

                                        {{-- kolom email --}}
                                        <div class="col-12">
                                            <label for="yourEmail" class="form-label">Email</label>
                                            <input type="email" name="email" maxlength="255"
                                                class="form-control @error('email') is-invalid @enderror" id="yourEmail"
                                                value="{{ old('email') }}" placeholder="Email, maximal 255 karakter"
                                                required>

                                            <div class="invalid-feedback" id="emailEmptyError" style="display: none;">
                                                Kolom email tidak boleh kosong.
                                            </div>
                                            <div class="invalid-feedback" id="emailNotValidError"
                                                style="display: none;">Silahkan masukan
                                                alamat email yang valid.
                                            </div>

                                            @error('email')
                                                <div id="wrongEmailOrPasswordError" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{-- kolom password --}}
                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" maxlength="255" class="form-control"
                                                placeholder="Password, maximal 255 karakter" id="yourPassword" required>
                                            <div class="invalid-feedback" id="passwordEmptyError">
                                                Kolom password tidak boleh kosong.
                                            </div>
                                            <div class="invalid-feedback" id="passwordLengthError"
                                                style="display: none;">
                                                Password tidak boleh kurang dari 8 karakter.
                                            </div>
                                        </div>

                                        {{-- kolom konfirmasi password --}}
                                        <div class="col-12">
                                            <label for="yourPasswordCofirmation" class="form-label">Konfirmasi
                                                Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                maxlength="255" id="yourPasswordCofirmation"
                                                placeholder="Ketikan ulang password anda" required>
                                            <div class="invalid-feedback" id="k_passwordEmptyError">
                                                Kolom konfirmasi password tidak boleh kosong.
                                            </div>
                                            <div class="invalid-feedback" id="k_passwordLengthError"
                                                style="display: none;">
                                                Konfirmasi password tidak boleh kurang dari 8 karakter.
                                            </div>
                                            <div class="invalid-feedback" id="k_passwordMatchError"
                                                style="display: none;">
                                                Konfirmasi password harus sama dengan password anda.
                                            </div>
                                        </div>

                                        {{-- centang i agree --}}
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox"
                                                    value="" id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept
                                                    the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" id="btn_submit"
                                                disabled>Create
                                                Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="/login">Log
                                                    in</a></p>
                                        </div>
                                    </form>

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
        var btnSubmit = document.getElementById('btn_submit');

        let status_username = false;
        let status_email = false;
        let status_password = false;
        let status_k_password = false;
        let status_term = false;

        function checkBtnSubmit() {
            if (status_username == true && status_email == true && status_password == true && status_k_password == true &&
                status_term == true) {
                btnSubmit.disabled = false;
            } else {
                btnSubmit.disabled = true;
            }
        }
    </script>

    {{-- username error message --}}
    <script>
        var nameInput = document.getElementById('yourName');
        var nameEmptyError = document.getElementById('nameEmptyError');

        // name error message management
        nameInput.addEventListener('input', function() {
            var name = this.value;

            // Cek jika name kosong
            if (name.trim() === '') {
                nameEmptyError.style.display = 'block';

                nameInput.classList.remove('is-valid');
                nameInput.classList.add('is-invalid');

                status_username = false;
                checkBtnSubmit();
            } else {
                nameEmptyError.style.display = 'none';

                nameInput.classList.remove('is-invalid');
                nameInput.classList.add('is-valid');

                status_username = true;
                checkBtnSubmit();
            }

        });

        function isValidEmail(email) {
            // Gunakan regular expression untuk memeriksa apakah email valid
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
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
                checkBtnSubmit()

                wrongEmailOrPasswordError.style.display = 'none';
            } else if (!isValidEmail(email)) {
                emailEmptyError.style.display = 'none';

                emailNotValidError.style.display = 'block';

                emailInput.classList.remove('is-valid');
                emailInput.classList.add('is-invalid');

                status_email = false;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else {

                emailEmptyError.style.display = 'none';

                emailNotValidError.style.display = 'none';

                emailInput.classList.remove('is-invalid');
                emailInput.classList.add('is-valid');

                status_email = true;
                checkBtnSubmit()

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

    {{-- password error massage --}}
    <script>
        var passwordInput = document.getElementById('yourPassword');
        var passwordLengthError = document.getElementById('passwordLengthError');
        var passwordEmptyError = document.getElementById('passwordEmptyError');

        var confirmPasswordLengthError = document.getElementById('k_passwordLengthError');
        var confirmPasswordEmptyError = document.getElementById('k_passwordEmptyError');
        var confirmPasswordMatchError = document.getElementById('k_passwordMatchError');


        // password error message management
        passwordInput.addEventListener('input', function() {
            var password = this.value;
            var confirmPasswordInput = document.getElementById('yourPasswordCofirmation');

            // Cek jika password kosong
            if (password.trim() === '') {

                passwordEmptyError.style.display = 'block';

                passwordLengthError.style.display = 'none';

                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');

                status_password = false;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else if (password.length < 8) {

                passwordEmptyError.style.display = 'none';

                passwordLengthError.style.display = 'block';

                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');

                status_password = false;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else {
                passwordEmptyError.style.display = 'none';

                passwordLengthError.style.display = 'none';

                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');

                status_password = true;
                checkBtnSubmit();

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }
            }
            // jika password diubah setelah mengisi konfirmasi password
            if (confirmPasswordInput.value != password) {

                confirmPasswordLengthError.style.display = 'none';

                confirmPasswordEmptyError.style.display = 'none';

                confirmPasswordMatchError.style.display = 'block';

                confirmPasswordInput.classList.remove('is-valid');
                confirmPasswordInput.classList.add('is-invalid');

                status_k_password = false;
                checkBtnSubmit();
            }

        });
    </script>

    {{-- confirm password error massage --}}
    <script>
        var confirmPasswordInput = document.getElementById('yourPasswordCofirmation');
        var confirmPasswordLengthError = document.getElementById('k_passwordLengthError');
        var confirmPasswordEmptyError = document.getElementById('k_passwordEmptyError');
        var confirmPasswordMatchError = document.getElementById('k_passwordMatchError');

        var passwordLengthError = document.getElementById('passwordLengthError');
        var passwordEmptyError = document.getElementById('passwordEmptyError');

        // password error message management
        confirmPasswordInput.addEventListener('input', function() {
            var password = document.getElementById('yourPassword');

            var confirm_password = this.value;

            // Cek jika password kosong
            if (confirm_password.trim() === '') {

                confirmPasswordLengthError.style.display = 'none';

                confirmPasswordEmptyError.style.display = 'block';

                confirmPasswordMatchError.style.display = 'none';

                confirmPasswordInput.classList.remove('is-valid');
                confirmPasswordInput.classList.add('is-invalid');

                status_k_password = false;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else if (confirm_password.length < 8) {

                confirmPasswordLengthError.style.display = 'block';

                confirmPasswordEmptyError.style.display = 'none';

                confirmPasswordMatchError.style.display = 'none';

                confirmPasswordInput.classList.remove('is-valid');
                confirmPasswordInput.classList.add('is-invalid');

                status_k_password = false;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else if (confirm_password != password.value) {

                confirmPasswordLengthError.style.display = 'none';

                confirmPasswordEmptyError.style.display = 'none';

                confirmPasswordMatchError.style.display = 'block';

                confirmPasswordInput.classList.remove('is-valid');
                confirmPasswordInput.classList.add('is-invalid');

                status_k_password = false;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }

            } else {
                passwordLengthError.style.display = 'none';
                passwordEmptyError.style.display = 'none';

                confirmPasswordLengthError.style.display = 'none';

                confirmPasswordEmptyError.style.display = 'none';

                confirmPasswordMatchError.style.display = 'none';

                confirmPasswordInput.classList.remove('is-invalid');
                confirmPasswordInput.classList.add('is-valid');

                status_k_password = true;
                checkBtnSubmit()

                if (wrongEmailOrPasswordError) {
                    wrongEmailOrPasswordError.style.display = 'none';
                }
            }

        });
    </script>

    {{-- term condition --}}
    <script>
        document.getElementById('acceptTerms').addEventListener('change', function() {
            // Cek apakah checkbox terms dicentang
            if (this.checked) {
                status_term = true;
                checkBtnSubmit()
            } else {
                status_term = false
                checkBtnSubmit()
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
