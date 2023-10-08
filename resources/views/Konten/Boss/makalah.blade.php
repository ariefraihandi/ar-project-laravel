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
                            <th>Code</th>
                            <th>Harga</th>
                            <th>Url</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($makalas as $makalah)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $makalah->kode }}</td>
                            <td>Rp. {{ $makalah->harga }}</td>
                            <td>{{ $makalah->url }}</td>
                            <td>
                                {{-- Tambahkan tombol-tombol aksi di sini --}}
                                <button class="btn btn-primary">Edit</button>
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

    {{-- @foreach ($submenus as $sm)
    <div class="modal fade" id="editmenu{{ $sm->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmenuTitle">Edit {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('submenu.update', ['id' => $sm->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="menu_id" class="form-label">Menu</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    @foreach ($menus as $m)
                                        <option value="{{ $m->id }}" @if($m->id == $sm->menu_id) selected @endif>{{ $m->menu_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Submenu</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $sm->title }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="url" class="form-label">URL</label>
                                <input type="text" id="url" name="url" class="form-control" value="{{ $sm->url }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="icon" class="form-label">ICON</label>
                                <input type="text" id="icon" name="icon" class="form-control" value="{{ $sm->icon }}" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="itemsub" class="form-label">Itemsub</label>
                                <input type="text" id="itemsub" name="itemsub" class="form-control" value="{{ $sm->itemsub }}" />
                            </div>
                            <div class="col mb-0">
                                <label for="is_active" class="form-label">Status</label>
                                <input type="text" id="is_active" name="is_active" class="form-control" value="{{ $sm->is_active }}" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                        <input type="hidden" id="id" name="id" value="{{ $sm->id }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach --}}

    
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