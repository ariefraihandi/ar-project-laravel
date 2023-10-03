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
                    <div class="above-heading">Upload 3 Makalah</div>
                    <h2>Judul Makalah: {{$judulMakalah}}</h2>
                    <p class="p-form">Upload Makalah Untuk Mendownload</p>
                    <form method="POST" data-toggle="validator" data-focus="false" action="{{ route('submit.form') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" id="emailInput">
                            <input type="email" class="form-control-input" id="email" name="email" required>
                            <label class="label-control" for="email">Email:</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="upload-input">
                            <label for="file1">Makalah 1:</label>
                            <input type="file" id="file1" name="file1" class="file-input" accept=".pdf">
                            <progress id="progress1" max="100" value="0"></progress>
                        </div>
                        <div class="upload-input">
                            <label for="file2">Makalah 2:</label>
                            <input type="file" name="file2" id="file2" class="file-input" accept=".pdf">
                            <progress id="progress2" max="100" value="0"></progress>
                        </div>
                        <div class="upload-input">
                            <label for="file3">Makalah 3:</label>
                            <input type="file" name="file3" id="file3" class="file-input" accept=".pdf">
                            <progress id="progress3" max="100" value="0"></progress>
                        </div>
                        <input type="hidden" class="form-control-input" id="id_makalah" name="id_makalah" value="{{$idMakalah}}">
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
    // Function to update progress bar
function updateProgressBar(fileInput, progressBar) {
    const file = fileInput.files[0];
    const fileSize = file.size;
    const reader = new FileReader();

    reader.onload = function (e) {
        // Simulate file upload progress (you can replace this with actual AJAX upload)
        let progress = 0;
        const interval = setInterval(function () {
            progress += 25;
            progressBar.value = progress;

            if (progress >= 100) {
                clearInterval(interval);
            }
        }, fileSize / 100);

        // Simulate completion after 2 seconds (you can replace this with actual upload)
        // setTimeout(function () {
        //     progressBar.value = 100;
        //     alert(`Upload of ${file.name} completed.`);
        // }, 2000);
    };

    reader.readAsDataURL(file);
}

// Attach event listeners to file inputs
document.addEventListener("DOMContentLoaded", function () {
    const fileInputs = document.querySelectorAll(".file-input");
    const progressBars = document.querySelectorAll("progress");

    fileInputs.forEach((fileInput, index) => {
        fileInput.addEventListener("change", function () {
            updateProgressBar(this, progressBars[index]);
        });
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