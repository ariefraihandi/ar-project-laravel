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
                                <small class="form-text text-muted">Kami hanya akan menggunakan informasi ini untuk memeriksa status akun Instagram Anda.</small>
                            </div>     
                        
                            {{-- <div class="form-group">
                                <input type="file" class="form-control-input" id="file" name="file" required>
                                <small class="form-text text-muted">Upload File Yang Ingin Diperiksa Di Sini. MAX 2 MB</small>
                                <div class="help-block with-errors"></div>
                            </div>  --}}

                            <div class="form-group" id="drop-area">
                                <div class="drag-drop-text">
                                    <input type="file" class="custom-file-input" id="file" name="file" required>
                                    <h5>Drag & drop any file here or</h5> <span class="browse-files-text">browse file from device</span>
                                    <small class="form-text text-muted">MAX 2 MB</small>
                                </div>
                                {{-- <div class="help-block with-errors"></div> --}}
                            </div>
                            <div class="file-block">
                                <div class="file-info" style="display: none;">
                                    <span class="file-name"></span> |
                                    <span class="file-size"></span>
                                </div>
                                <div class="progress-bar"></div>
                            </div>
                                                        
                            
                            
                            
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">Submit</button>
                            </div>           
                        </form>
                        
                        
                        <!-- end of newsletter form -->
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
             <!-- end of row -->
        </div> <!-- end of container -->
    </div>

    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">PRICING</div>
                    <h2 class="h2-heading">Pricing Options Table</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">BASIC</div>
                            <div class="price"><span class="currency">$</span><span class="value">Free</span></div>
                            <div class="frequency">14 days trial</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Email Marketing Module</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">User Control Management</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">List Building And Cleaning</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Collected Data Reports</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Planning And Evaluation</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">ADVANCED</div>
                            <div class="price"><span class="currency">$</span><span class="value">29.99</span></div>
                            <div class="frequency">monthly</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Email Marketing Module</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">User Control Management</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">List Building And Cleaning</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Collected Data Reports</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Planning And Evaluation</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <!--<div class="label">
                            <p class="best-value">Best Value</p>
                        </div> -->
                        <div class="card-body">
                            <div class="card-title">COMPLETE</div>
                            <div class="price"><span class="currency">$</span><span class="value">39.99</span></div>
                            <div class="frequency">monthly</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Email Marketing Module</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">User Control Management</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">List Building And Cleaning</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Collected Data Reports</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Planning And Evaluation</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div>
            
        </div> <!-- end of container -->
    </div>
    <div  id="start" class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="icon-container">
                        <span class="fa-stack">
                            <a href="#your-link">
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
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
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
@endpush