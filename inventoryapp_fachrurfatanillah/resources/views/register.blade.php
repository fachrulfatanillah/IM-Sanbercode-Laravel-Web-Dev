<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('template/src/assets/images/logos/seodashlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('template/src/assets/images/logos/logo-light.svg') }}" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form action="/register" method="POST">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill"></i> Terjadi Kesalahan!</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="exampleInputtext1" class="form-label">Username</label>
                        <input name="username" type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" value="{{ old('username') }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('email') }}">
                    </div>

                    <div class="mb-4">
                        <label for="passwordInput" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="passwordInput" onkeyup="validatePassword()"> 
                    </div>
                    
                    <div class="mb-4">
                        <label for="confirmPasswordInput" class="form-label">Confirm Password</label>
                        <input name="confirm-password" type="password" class="form-control" id="confirmPasswordInput" onkeyup="validatePassword()">
                        
                        <small id="passwordMismatchError" class="text-danger" style="display:none;">
                            Password dan Konfirmasi Password tidak cocok.
                        </small>
                        
                        @error('confirm-password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4" value="Sign Up" id="submitButton" disabled>
                    
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                        <a class="text-primary fw-bold ms-2" href="./authentication-login.html">Sign In</a>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validatePassword() {
        // 1. Ambil nilai dari input password dan konfirmasi password
        const password = document.getElementById('passwordInput').value;
        const confirmPassword = document.getElementById('confirmPasswordInput').value;
        
        // 2. Ambil elemen tombol submit dan pesan error
        const submitButton = document.getElementById('submitButton');
        const errorMsg = document.getElementById('passwordMismatchError');

        // 3. Cek kondisi
        if (password === confirmPassword && password !== '') {
            // Jika password cocok DAN tidak kosong
            
            // Aktifkan tombol submit
            submitButton.removeAttribute('disabled');
            // Sembunyikan pesan error
            errorMsg.style.display = 'none'; 
        } else if (confirmPassword !== '') {
            // Jika password tidak cocok (dan user sudah mulai mengetik di konfirmasi)
            
            // Nonaktifkan tombol submit
            submitButton.setAttribute('disabled', 'disabled');
            // Tampilkan pesan error
            errorMsg.style.display = 'block'; 
        } else {
            // Kondisi awal atau password dihapus
            submitButton.setAttribute('disabled', 'disabled');
            errorMsg.style.display = 'none';
        }
    }

    // Inisialisasi: Pastikan tombol dinonaktifkan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', (event) => {
        document.getElementById('submitButton').setAttribute('disabled', 'disabled');
    });
  </script>

  <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>