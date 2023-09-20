@extends('layouts/app')
@push('css-addon')
<style>
    #drop-area {
    border: 2px dashed #ccc;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
}
.browse-files-text {
	color: #7b2cbf;
	font-weight: bolder;
	cursor: pointer;
}

.drag-drop-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#drop-area p {
    margin: 0;
}

.custom-file-input {
        opacity: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
    }

    .custom-file-label {
        background-color: #007bff; /* Warna latar belakang label */
        color: #fff; /* Warna teks label */
        padding: 10px 15px; /* Spasi dalam label */
        border-radius: 5px; /* Sudut label dibulatkan */
        cursor: pointer;
    }

    /* Gaya untuk progress bar */


/* Gaya untuk file info */
.file-info {
    display: none;
    align-items: center;
    font-size: 15px;
}

.file-icon {
    margin-right: 10px;
}

.progress-bar {
    width: 0;
    height: 20px; /* Ubah tinggi progress bar sesuai keinginan Anda */
    background-color: #4BB543;
    transition: width 0.3s ease-in-out;
    border-radius: 10px; /* Menambah border-radius untuk membuatnya tidak terlalu siku */
    margin-bottom: 10px; /* Menambah margin-bottom agar tidak terlalu dekat dengan tombol submit */
}

.file-name, .file-size {
    /* display: flex; Untuk mengatur konten secara horizontal */
    justify-content: center; /* Untuk membuat konten berada di tengah */
    align-items: center;
    padding: 0 3px;
    color: #7b2cbf;
    font-weight: bolder;
    cursor: pointer;
    text-align: center;
}


</style>    
@endpush

@section('content')
    <div  id="start" class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="above-heading">TURNITIN</div>
                        <h2>Cek Turnitin</h2>
                        <p class="p-form">Anda memiliki kesempatan pengecekan GRATIS..!</p>
                        <form method="POST" data-toggle="validator" data-focus="false" action="{{ route('turnitin.action') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="name" name="name" required>
                                <label class="label-control" for="name">Nama Lengkap:</label>
                                <div class="help-block with-errors"></div>
                            </div>
                        
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="email" name="email" required>
                                <label class="label-control" for="email">Email:</label>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control-input" id="instagram_username" name="instagram_username" required>
                                <label class="label-control" for="instagram_username">Instagram Username:</label>
                                <div class="help-block with-errors"></div>
                                <div id="username-validation-feedback"></div>
                                <small class="form-text text-muted">Kami hanya akan menggunakan informasi ini untuk memeriksa status akun Instagram Anda.</small>
                            </div>         
                            <div class="form-group" id="drop-area">
                                <div class="drag-drop-text">
                                    <input type="file" class="custom-file-input" id="file" name="file" required>
                                    <h5>Drag & drop File Yang Ingin Diperiksa atau</h5> <span class="browse-files-text">Pilih Dari Perangkat</span>
                                    <small class="form-text text-muted">MAX 2 MB</small>
                                </div>
                            </div>
                            <div class="file-block">
                                <div class="file-info" style="display: none;">
                                    <span class="file-name"></span> |
                                    <span class="file-size"></span>
                                </div>
                                <div class="progress-bar"></div>
                            </div>
                            <div class="form-group" style="display: flex; justify-content: center; align-items: center;">
                                <button type="submit" class="form-control-submit-button" style="display: none;">Submit</button>
                                <a class="btn-solid-reg page-scroll" href="#pricing" style="display: none;" id="registerButton">Daftarkan Akun</a>
                            </div>
                        </form>
                        
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div>
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">HARGA</div>
                    <h2 class="h2-heading">Harga Pengecekan Turnitn</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">BASIC</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">0</span></div>
                            <div class="frequency">Trial</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Menggunakan Turnitin.com</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">1 Kali cek sebulan</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Unlimited check</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">Bayar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">SILVER</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">10 K</span></div>
                            <div class="frequency">Mingguan</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Menggunakan Turnitin.com</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">life time 1 minggu</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Max 5 Doc / Day</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Dokumen Publik</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">Bayar</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">GOLD</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">45 K</span></div>
                            <div class="frequency">Bulanan</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Menggunakan Turnitin.com</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">1 Bulan life time</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Max 10 Doc / Day</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Dokumen Publik</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">Bayar</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">PLATINUM</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">99 K</span></div>
                            <div class="frequency">Tahunan</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Menggunakan Turnitin.com</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">12 Bulan life time</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Unlimited check/day</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Dokumen pribadi dan publik</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">Bayar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end of container -->
    </div>
    <div  id="start" class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="icon-container">
                        <span class="fa-stack">
                            <a href="https://www.facebook.com/ariefraihandii">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://id.pinterest.com/ariefraihandibiz/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.instagram.com/ariefraihandi/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                       
                    </div> <!-- end of col -->
                </div> <!-- end of col -->
            </div>
        </div>
    </div>
@endsection

@push('footer-script')
<script>
 document.addEventListener('DOMContentLoaded', function () {
    var dropArea = document.getElementById('drop-area');
    var progressBar = document.querySelector('.progress-bar');
    var fileInput = document.getElementById('file');
    var fileInfo = document.querySelector('.file-info');

    fileInput.addEventListener('change', function () {
        var input = document.getElementById('file');
        var fileName = document.querySelector('.file-name');
        var fileSize = document.querySelector('.file-size');

        if (input.files.length > 0) {
            var file = input.files[0];
            fileName.textContent = file.name;
            fileSize.textContent = (file.size / 1024).toFixed(1) + " KB";

            // Tampilkan elemen file-info
            fileInfo.style.display = 'inline-block';

            // Simulasikan progress bar (jika diperlukan)
            var width = 0;
            var id = setInterval(frame, 20);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    progressBar.style.width = width + "%";
                }
            }
        } else {
            // Sembunyikan elemen file-info jika tidak ada file yang dipilih
            fileInfo.style.display = 'none';
        }
    });
});
</script>

<script>
    const usernameInput = document.getElementById('instagram_username');
    const usernameValidationFeedback = document.getElementById('username-validation-feedback');
    const submitButton = document.querySelector('.form-control-submit-button[type="submit"]');
    const registerButton = document.getElementById('registerButton');

    usernameInput.addEventListener('input', function () {
        const username = usernameInput.value;

        axios.post('{{ route('turnitin.validation') }}', { username: username })
            .then(function (response) {
                if (response.data.available) {
                    usernameValidationFeedback.innerHTML = '<i class="fas fa-check text-success"></i> Selamat, Anda Mendapat Kesempatan Pengecekan Turnitin Gratis.';
                    submitButton.style.display = 'block';
                    registerButton.style.display = 'none';
                } else {
                    usernameValidationFeedback.innerHTML = '<i class="fas fa-times text-danger"></i> Mohon Maaf, Pengecekan Gratis Sudah Pernah Digunakan Bulan Ini';
                    submitButton.style.display = 'none';
                    registerButton.style.display = 'block';
                }
            })
            .catch(function (error) {
                // Tangani kesalahan jika ada
                usernameValidationFeedback.innerHTML = '<i class="fas fa-exclamation-circle text-warning"></i> Terjadi kesalahan saat memeriksa username.';
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