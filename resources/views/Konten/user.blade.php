@extends('Index/app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-notifications.html"
              ><i class="bx bx-bell me-1"></i> Billing</a
            >
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="pages-account-settings-connections.html"
              ><i class="bx bx-link-alt me-1"></i> Connections</a
            >
          </li> --}}
        </ul>
        <div class="card mb-4">
          <h5 class="card-header">Profile Details</h5>
          <!-- Account -->
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                @if (empty($userProfile->image))
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($users->name) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
                @else
                    <!-- Display the user's existing profile image -->
                    <img src="{{ asset('storage/profile/' . $userProfile->image) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
                @endif
                <form method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
              <div class="button-wrapper">
                

                <label for="profile_photo" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input
                      type="file"
                      id="profile_photo"
                      name="profile_photo"
                      class="account-file-input"
                      hidden
                      accept=".png, .jpg, .jpeg"
                    />
                  </label>
                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Nama</label>
                  <input
                    class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    value="{{ $users->name }}"
                    autofocus
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="{{ $users->email }}"
                    placeholder="john.doe@example.com" readonly
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="organization" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    value="{{ $users->username }}" readonly
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Whatsapp</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">ID (+62)</span>
                    <input
                      type="text"
                      id="whatsapp"
                      name="whatsapp"
                      class="form-control"
                      value="{{ $userProfile->whatsapp }}"
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $userProfile->alamat }}" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="universitas" class="form-label">Universitas</label>
                  <input class="form-control" type="text" id="universitas" name="universitas" value="{{ $userProfile->universitas }}" />
                </div>
                
                <div class="mb-3 col-md-6">
                  <label for="fakultas" class="form-label">Fakultas</label>
                  <input class="form-control" type="text" id="fakultas" name="fakultas" value="{{ $userProfile->fakultas }}" />
                </div>
                
                <div class="mb-3 col-md-6">
                  <label for="user_ig" class="form-label">Username IG</label>
                  <input class="form-control" type="text" id="user_ig" name="user_ig" value="{{ $userProfile->user_ig }}" />
                </div>
                
                
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
      </div>
    </div>
  </div>


    
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