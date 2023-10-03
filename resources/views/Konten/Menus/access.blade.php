@extends('Index/app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><?= $title; ?> /</span> <?= $subtitle; ?></h4>
    @foreach ($menus as $menu)
        
        <div class="divider divider-primary">
            <div class="divider-text">{{ $menu->menu_name }}</div>
          </div>
      
        <div class="d-flex flex-wrap">
            @foreach ($submenus->where('menu_id', $menu->id) as $submenu)
                <div class="col-lg-4 mb-4 order-0">
                    <div class="card" style="margin-right: 10px; margin-left: 10px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-header">{{ $submenu->title }}</h5>
                            <div class="form-check form-switch me-3">
                                <input class="form-check-input" type="checkbox" data-role="" data-undersubmenu="">
                                <input class="form-check-input" type="checkbox" {!! $checkAccessSub($userRole['id'], $submenu->id) !!} data-role="{{ $userRole['id'] }}" data-menu="{{ $submenu['id'] }}">
                            </div>
                        </div>
                        @if ($submenu->itemsub == 1)
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($childsubs->where('id_submenu', $submenu->id) as $childsub)
                                            <tr>
                                                <td><i class="fab fa-angular fa-lg text-danger"></i><strong>{{ $childsub->title }}</strong></td>
                                                <td>
                                                    <div class="form-check form-switch me-3">
                                                        <input class="form-check-input" name="accesschild" type="checkbox" {!! $checkAccesschild($userRole['id'], $childsub->id) !!} data-role="{{ $userRole['id'] }}" data-menu="{{ $childsub['id'] }}">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection

@push('footer-script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
