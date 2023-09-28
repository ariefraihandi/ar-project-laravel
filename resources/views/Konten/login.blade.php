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
                {{-- <div class="text-center"> --}}
                    <h4 class="mb-2">Masuk Untuk Memulai 🚀</h4>
                    {{-- <p class="mb-4">Daftar, untuk memulai peningkatan prestasi akademis Anda</p> --}}
                {{-- </div> --}}
  <br>
  <form id="formAuthentication" class="mb-3" action="{{ route('login.action') }}" method="POST">
    @csrf 
                    <div class="mb-3">
                        <label for="username" class="form-label">Email or Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus required/>
                        <div id="usernameError" style="color: red;"></div> <!-- Ubah id menjadi "username-error" -->
                    </div>
                    <div class="mb-3 form-password-toggle">
                      <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        <a href="auth-forgot-password-basic.html">
                          <small>Forgot Password?</small>
                        </a>
                      </div>
                      <div class="input-group input-group-merge">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                          aria-describedby="password"
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember-me" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                      </div>
                    </div>
                    <div class="mb-3">
                      <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                    </div>
                  </form>
    
                  <p class="text-center">
                    <span>New on our platform?</span>
                    <a href="auth-register-basic.html">
                      <span>Create an account</span>
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
