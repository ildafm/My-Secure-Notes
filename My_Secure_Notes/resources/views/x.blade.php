<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>S Notes | Verifikasi Email</title>
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
                                        <h5 class="card-title text-center pb-0 fs-4">Verifikasi Email</h5>
                                        <p class="text-center small">Registrasi berhasil. silahkan cek pesan pada email
                                            anda untuk memverifikasi
                                            akun anda</p>
                                    </div>

                                    <div class="row">
                                        {{-- start form resend --}}
                                        <form class="col" method="POST" action="{{ route('verification.send') }}"
                                            onsubmit="document.getElementById('btn_submit').disabled = true; document.getElementById('btn_logout').disabled = true">
                                            @csrf

                                            <button class="btn btn-primary btn-sm w-100" type="submit"
                                                id="btn_submit">Kirim
                                                ulang tautan</button>
                                        </form>
                                        {{-- end form resend --}}

                                        {{-- start form logout --}}
                                        <form class="col" method="POST" action="{{ route('logout') }}"
                                            onsubmit="document.getElementById('btn_submit').disabled = true; document.getElementById('btn_logout').disabled = true">
                                            @csrf

                                            <button type="submit" class="btn btn-warning btn-sm w-100"
                                                id="btn_logout">Logout </button>
                                        </form>
                                        {{-- end form logout --}}
                                    </div>


                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mt-4 text-sm" align="center">
                                            <hr>
                                            Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat
                                            pendaftaran
                                            <br><br>
                                            <b>Silahkan cek kembali email anda</b>
                                        </div>
                                    @elseif(session('error'))
                                        <div class="mt-4 text-sm" align="center">
                                            <hr>
                                            Mohon menunggu beberapa saat sebelum mencoba mengirimkan tautan verifikasi
                                            kembali
                                        </div>
                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
        <!-- End #div -->
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../template/js/main.js"></script>

</body>

</html>
