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
                    <div class="above-heading">Payment Page</div>
                    <h2>Judul: {{$judulMakalah}}</h2>
                    {{-- <p class="p-form">Upload Makalah Untuk Mendownload</p> --}}
                    <form method="POST" data-toggle="validator" data-focus="false" action="{{ route('beli.form') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="emailInput">
                            <input type="email" class="form-control-input" id="email" name="email" required>
                            <label class="label-control" for="email">Email:</label>
                            <div class="help-block with-errors">@if ($errors->has('email')) {{ $errors->first('email') }} @endif</div>
                        </div>
                        <div class="form-group" id="whatsapp">
                            <input type="text" class="form-control-input" id="whatsapp" name="whatsapp" required>
                            <label class="label-control" for="whatsapp">Whatsapp:</label>
                            <div class="help-block with-errors">@if ($errors->has('whatsapp')) {{ $errors->first('whatsapp') }} @endif</div>
                        </div>
                        <input type="hidden" class="form-control-input" id="id_makalah" name="id_makalah" value="{{$idMakalah}}">
                        <input type="hidden" class="form-control-input" id="harga" name="harga" value="5000">
                        <input type="hidden" class="form-control-input" id="format" name="format" value="makalah">
                        <input type="hidden" class="form-control-input" id="judul_makalah" name="judul_makalah" value="{{$judulMakalah}}">
                        <div class="form-group" style="display: flex; justify-content: center; align-items: center;">
                            <button type="submit" class="form-control-submit-button">Submit</button>
                        </div>
                    </form>
                    
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div>
@endsection

@push('footer-script')
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