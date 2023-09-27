@extends('Index/auth')

@push('head-script')
<link rel="stylesheet" href="{{ asset('assets') }}/portal/vendor/css/pages/page-auth.css" />
@endpush
@section('content')

     <!-- Content -->

     <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <a href="index.html" class="app-brand-link gap-2">
                        <img src="https://www.ariefraihandi.biz.id/assets/images/logo/arp.png" alt="AR Project Logo" class="app-brand-logo demo" width="40">
                        <span class="app-brand-text demo text-body fw-bolder">AR Project</span>
                    </a>
                </div>                
                <!-- /Logo -->
                <div class="text-center">
                    <h4 class="mb-2">Solusi Akademi Terpercaya 🚀</h4>
                    <p class="mb-4">Daftar, untuk memulai peningkatan prestasi akademis Anda</p>
                </div>
  
                <form class="mb-3" action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf 
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" onkeyup="validateUsername(this)" placeholder="Enter your username" autofocus required/>
                        <div id="usernameError" style="color: red;"></div> <!-- Ubah id menjadi "username-error" -->
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" onkeyup="validateEmail(this)" placeholder="Enter your username" autofocus required />
                        <div id="emailError" style="color: red;"></div> 
                    </div>
                   
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" onkeyup="validatePassword(this)" required/>
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        <div id="passError" style="color: red;"></div> 
                    </div>
                    
                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="confirm-password">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="confirm-password" class="form-control" name="confirm-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" onkeyup="validateConfirmPassword(this)" required/>
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                        <div id="conpassError" style="color: red;"></div> 
                    </div>                   
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required/>
                            <label class="form-check-label" for="terms-conditions">
                                I agree to
                                <a href="javascript:void(0);">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" id="submitBtn" class="btn btn-primary d-grid w-100">Sign up</button>
                </form> 
                <p class="text-center">
                  <span>Already have an account?</span>
                  <a href="auth-login-basic.html">
                    <span>Sign in instead</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>
  
      <!-- / Content -->

@endsection


@push('footer-script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function validateUsername(input) {
        var usernameValue = input.value;
        var regex = /^[a-z0-9_]+$/i;
        var usernameError = document.getElementById("usernameError");
        var submitButton = document.getElementById("submitBtn");

        if (usernameValue.length < 6) {
            usernameError.textContent = "Username harus memiliki minimal 6 karakter.";
            usernameError.style.color = "red"; // Menambahkan warna merah
            submitButton.disabled = true;
        } else if (!regex.test(usernameValue)) {
            usernameError.textContent = "Username hanya boleh berisi huruf kecil, angka, dan underscore.";
            usernameError.style.color = "red"; // Menambahkan warna merah
            submitButton.disabled = true;
        } else if (/[A-Z]/.test(usernameValue)) {
            usernameError.textContent = "Username tidak boleh mengandung huruf kapital.";
            usernameError.style.color = "red"; // Menambahkan warna merah
            submitButton.disabled = true;
        } else if (/[^a-zA-Z0-9_]/.test(usernameValue)) {
            usernameError.textContent = "Username tidak boleh mengandung karakter khusus atau spasi.";
            usernameError.style.color = "red"; // Menambahkan warna merah
            submitButton.disabled = true;
        } else {
            axios.post('{{ route('register.username') }}', { username: usernameValue })
                .then(function (response) {
                    if (response.data.available) {
                        usernameError.textContent = "Username tersedia.";
                        usernameError.style.color = "green"; // Menambahkan warna hijau
                        submitButton.disabled = false;
                    } else {
                        usernameError.textContent = "Username sudah digunakan.";
                        usernameError.style.color = "red"; // Menambahkan warna merah
                        submitButton.disabled = true;
                    }
                })
                .catch(function (error) {
                    usernameError.textContent = "Terjadi kesalahan saat memeriksa username.";
                    usernameError.style.color = "red"; // Menambahkan warna merah
                    submitButton.disabled = true;
                });
        }
    }

    function validateEmail(input) {
        var emailValue = input.value;
        var emailError = document.getElementById("emailError");
        var submitButton = document.getElementById("submitBtn");
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex untuk validasi email

        if (!emailRegex.test(emailValue)) {
            emailError.textContent = "Email tidak valid.";
            emailError.style.color = "red";
            submitButton.disabled = true;
        } else {
            axios.post('{{ route('register.email') }}', { email: emailValue })
                .then(function (response) {
                    if (response.data.available) {
                        emailError.textContent = "Email tersedia.";
                        emailError.style.color = "green"; // Ubah warna ke hijau jika tersedia
                        submitButton.disabled = false;
                    } else {
                        emailError.textContent = "Email sudah digunakan.";
                        emailError.style.color = "red";
                        submitButton.disabled = true;
                    }
                })
                .catch(function (error) {
                    emailError.textContent = "Terjadi kesalahan saat memeriksa email.";
                    emailError.style.color = "red";
                    submitButton.disabled = true;
                });
        }
    }

    function validatePassword(input) {
        var passwordValue = input.value;
        var passError = document.getElementById("passError");
        var submitButton = document.getElementById("submitBtn");

        // Validasi panjang minimal 6 karakter
        if (passwordValue.length < 6) {
            passError.textContent = "Password harus memiliki minimal 6 karakter.";
            passError.style.color = "red";
            submitButton.disabled = true;
            return;
        }

        // Validasi minimal 1 karakter angka
        if (!/\d/.test(passwordValue)) {
            passError.textContent = "Password harus mengandung minimal 1 angka.";
            passError.style.color = "red";
            submitButton.disabled = true;
            return;
        }

        // Validasi minimal 1 karakter huruf kapital
        if (!/[A-Z]/.test(passwordValue)) {
            passError.textContent = "Password harus mengandung minimal 1 huruf kapital.";
            passError.style.color = "red";
            submitButton.disabled = true;
            return;
        }

        // Validasi minimal 1 karakter selain huruf dan angka
        if (!/[^a-zA-Z0-9]/.test(passwordValue)) {
            passError.textContent = "Password harus mengandung minimal 1 karakter selain huruf dan angka.";
            passError.style.color = "red";
            submitButton.disabled = true;
            return;
        }

        // Jika semua validasi terpenuhi
        passError.textContent = "Password Valid";
        passError.style.color = "green";
        submitButton.disabled = false;
    }

    function validateConfirmPassword(input) {
        var confirmPasswordValue = input.value;
        var passwordValue = document.getElementById("password").value;
        var conpassError = document.getElementById("conpassError");
        var submitButton = document.getElementById("submitBtn");

        // Validasi jika kata sandi konfirmasi tidak cocok dengan kata sandi sebelumnya
        if (confirmPasswordValue !== passwordValue) {
            conpassError.textContent = "Password tidak cocok.";
            conpassError.style.color = "red";
            submitButton.disabled = true;
            return;
        }

        // Jika kata sandi konfirmasi cocok dengan kata sandi sebelumnya
        conpassError.textContent = "Password Valid";
        conpassError.style.color = "green";
        submitButton.disabled = false;
    }

    document.addEventListener("DOMContentLoaded", function() {
        var termsCheckbox = document.getElementById("terms-conditions");
        var submitButton = document.getElementById("submitBtn");

        // Mengecek apakah kotak centang sudah dicentang saat halaman dimuat
        if (!termsCheckbox.checked) {
            submitButton.disabled = true;
        }

        // Menambahkan event listener untuk mengaktifkan/menonaktifkan tombol submit saat kotak centang berubah
        termsCheckbox.addEventListener("change", function() {
            if (termsCheckbox.checked) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        });
    });
</script>

<script>
    // Cek apakah ada pesan sukses yang dikirim dari controller
    @if(session('success'))
        Swal.fire({
            title: 'Sukses',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

    // Cek apakah ada pesan error yang dikirim dari controller
    @if(session('error'))
        Swal.fire({
            title: 'Error',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    @endif
</script>

@endpush
