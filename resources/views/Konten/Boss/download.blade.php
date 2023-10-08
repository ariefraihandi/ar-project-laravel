@extends('layouts/boss')
@push('css-addon')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .upload-container {
        background-color: #fff;
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .upload-input {
        margin-bottom: 10px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    .file-input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    progress {
        width: 100%;
        height: 10px;
        margin-top: 5px;
    }

</style>
@endpush

@section('content')
<div  id="start" class="form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-container">
                    <div class="above-heading">Download Files</div>
                    @if(!empty($makalah_id))
                    <h2>Selamat Makalah Anda Siap Untuk Didownload</h2>
                    <p class="p-form">Klik Tombol Dibawah Untuk Mendownload</p>
                    <form id="downloadForm" action="{{ route('downloading.action') }}" method="POST">
                        <div class="form-group">
                            <input type="hidden" class="form-control-input" id="makalah_id" name="makalah_id" value="{{ $makalah_id }}">
                            <input type="hidden" class="form-control-input" id="download_id" name="download_id" value="{{ $download_token }}">
                            <button type="button" class="form-control-submit-button" id="downloadButton">DOWNLOAD</button>
                        </div>
                    </form>
                    @else
                    <h2>Terjadi Kesalahan Saat mengunduh, Atau File Sudah Pernah Diunduh.</h2>
                    @endif
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
@endsection

@push('footer-script')

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Handle form submission on button click
        document.getElementById('downloadButton').addEventListener('click', function () {
            var form = document.getElementById('downloadForm');

            axios.post('{{ route('downloading.action') }}', new FormData(form))
                .then(function (response) {
                    console.log(response.data); // Debugging line

                    if (response.data.success) {
                        // File download successful
                        Swal.fire({
                            title: 'Sukses',
                            text: 'Selamat File Berhasil Diunduh.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        if (response.data.downloadUrl) {
                            // Trigger an automatic download of the file
                            var downloadLink = document.createElement('a');
                            downloadLink.href = response.data.downloadUrl;
                            downloadLink.style.display = 'none';
                            document.body.appendChild(downloadLink);
                            downloadLink.click();
                            document.body.removeChild(downloadLink);
                        }
                    } else {
                        // Handle other scenarios or show messages here
                        console.log(response.data.error); // Debugging line
                        Swal.fire({
                            title: 'Error',
                            text: response.data.error || 'Terjadi kesalahan saat mendownload.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(function (error) {
                    console.log('Error:', error);
                    // Handle other error scenarios if needed
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi kesalahan saat mengirim permintaan.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        });
    });

</script>



<script async="async" data-cfasync="false" src="//ophoacit.com/1?z=6421009"></script>
@endpush