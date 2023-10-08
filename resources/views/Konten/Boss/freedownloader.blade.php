@extends('Index/app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= $title; ?> /</span> <?= $subtitle; ?></h4>    
        <!-- Basic Bootstrap Table -->
        <a class="btn btn-success mb-3" href="#" data-bs-toggle="modal" data-bs-target="#addSubMenu">Add Sub Menu</a>
        <div class="card">
            <h5 class="card-header"><?= $title; ?></h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Email</th>
                            <th>Code</th>
                            <th>Files</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($makalas as $makalah)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $makalah->email }}</td>
                            <td>{{ $makalah->id_makalah }}</td>
                            <td>
                                <a href="{{ asset('storage/uploads/' . $makalah->file1) }}"  target="_blank">File 1 | </a>
                           
                                <a href="{{ asset('storage/uploads/' . $makalah->file2) }}" target="_blank">File 2 | </a>
                            
                                <a href="{{ asset('storage/uploads/' . $makalah->file3) }}" target="_blank">File 3</a>
                            </td>
                            
                            <td>{{ \Carbon\Carbon::parse($makalah->created_at)->format('d M') }}</td>
                            <td>
                                <form action="{{ route('verify.files') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $makalah->token }}">
                                    <input type="hidden" name="email" value="{{ $makalah->email }}">
                                    <input type="hidden" name="id_makalah" value="{{ $makalah->id_makalah }}">
                                    <button type="submit" class="btn btn-success" style="padding: 5px 10px;">
                                        Verify
                                    </button>
                                </form>
                                <form action="{{ route('notverified.files') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $makalah->token }}">
                                    <input type="hidden" name="email" value="{{ $makalah->email }}">
                                    <input type="hidden" name="id_makalah" value="{{ $makalah->id_makalah }}">
                                    <button type="submit" class="btn btn-warning" style="padding: 5px 10px;">
                                        Not Verified
                                    </button>
                                </form>
                                <br>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSubMenu" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSubMenuTitle">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('makalah.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="makalah_file" class="form-label">Excel</label>
                                <input type="file" name="makalah_file" accept=".xlsx">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success">Import Data</button>
                    </div>
                </form>
                
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