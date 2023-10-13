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
                    @if ($pembelian)
                    <div class="above-heading">Pembayaran Berhasil</div>
                        <h2>Judul Makalah: {{ $pembelian->judul_makalah }}</h2>

                        <form method="POST" data-toggle="validator" data-focus="false" action="{{ route('download.bayar') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control-input" id="token" name="token" value="{{$pembelian->judul_makalah}}">
                            <div class="form-group" style="display: flex; justify-content: center; align-items: center;">
                                <button type="submit" class="form-control-submit-button" id="download-button">Download</button>
                            </div>
                        </form>                        
                    @else
                        <h2>Data Tidak Diketahui</h2>
                    @endif


                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
@endsection

@push('footer-script')

<script>
    document.getElementById('download-button').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan tindakan bawaan formulir

        // Dapatkan nilai token
        var token = document.getElementById('token').value;

        // Lakukan permintaan AJAX untuk memeriksa status pembelian
        $.ajax({
            type: 'POST',
            url: '{{ route('download.bayar') }}', // Gantilah dengan rute yang sesuai
            data: {token: token},
            success: function(response) {
                if (response.status === 1) {
                    // Jika status pembelian adalah 1 (berhasil), maka arahkan ke URL makalah
                    window.open(response.makalahUrl, '_blank');
                } else {
                    // Tampilkan pesan kesalahan jika status bukan 1
                    alert('Status pembelian tidak valid.');
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat memeriksa status pembelian.');
            }
        });
    });
</script>


<script>
@endif

    // Cek apakah ada pesan sukses yang dikirim dari controller
    @if(session('success'))
        Swal.fire({
            title: 'Sukses',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif

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