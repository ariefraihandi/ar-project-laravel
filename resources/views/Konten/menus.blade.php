@extends('Index/app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= $title; ?> /</span> <?= $subtitle; ?></h4>
    
    <!-- Basic Bootstrap Table -->
    <a class="btn btn-success mb-3" href="#" data-bs-toggle="modal" data-bs-target="#addMenu">Add Menu</a>
    <div class="card">
        <h5 class="card-header"><?= $title; ?></h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="tables">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Menu Name</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($menus as $menu)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $menu->menu_name }}</strong></td>
                            <td>{{ $menu->order }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmenu{{ $menu->id }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addMenu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuTitle">Add <?= $title; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('menus.action') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="menu" class="form-label">Menu</label>
                            <input type="text" id="menu" name="menu" class="form-control" placeholder="Menu Name" />
                        </div>
                    </div>
                    @if(session()->has('user_id'))
                    <input type="text" id="user_id" name="user_id" value="{{ session('user_id') }}" />
                    @endif
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success">Add Menu</button>
                </div>
            </form>                       
        </div>
    </div>
</div>

@foreach ($menus as $sm)
    <div class="modal fade" id="editmenu{{ $sm['id'] }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmenuTitle">Edit {{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('menu.update', $sm['id']) }}">
                    @method('PUT')
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="menu" class="form-label">Name</label>
                            <input type="text" id="menu" name="menu" class="form-control" value="{{ $sm['menu_name'] }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="order" class="form-label">Urutan</label>
                            <input type="text" id="order" name="order" class="form-control" value="{{ $sm['order'] }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save changes</button>
                    <input type="hidden" id="menuid" name="menuid" value="{{ $sm['id'] }}">
                </div>
            </form>
            </div>
        </div>
    </div>
@endforeach
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
