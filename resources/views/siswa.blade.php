@extends('layouts.app')

@section('breadcumb')
    <div class="section-header">
        <h1>Data Siswa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Datasiswa</div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Data SIswa</h4>
                    <div class="card-header-form">
                        <a href="#" class="btn btn-primary mx-2" data-toggle="modal" data-target="#form-create">+
                            Tambah
                            Data</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="custom-checkbox custom-control d-flex justify-content-center">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$siswa->isEmpty())
                                    @foreach ($siswa as $i => $_siswa)
                                        <tr>
                                            <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input" id="checkbox-{{ $i + 1 }}" value="{{ $_siswa->id }}">
                                                    <label for="checkbox-{{ $i + 1 }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $_siswa->nim }}</td>
                                            <td>{{ $_siswa->name }}</td>
                                            <td>{{ $_siswa->email }}</td>
                                            <td>
                                                <button data-id="{{ $_siswa->id }}" class="btn btn-danger btn_delete"
                                                    data-toggle="modal" data-target="#fire-modal-6">
                                                    Delete
                                                </button>
                                                <button data-id="{{ $_siswa->id }}" class="btn btn-warning btn_update"
                                                    data-toggle="modal" data-target="#modal_update">
                                                    Update
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="100%">
                                            <div class="d-flex align-items-center justify-content-center h-100">
                                                Tidak ada data
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" tabindex="-1" role="dialog" id="form-create">
    <div class="modal-dialog modal-md" role="document">
        <form action="{{ route('siswa.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah data siswa</h5> <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nim</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Nim" name="nim">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Email" name="email">
                        </div>
                    </div>
                    <button class="d-none" id="form-create-submit"></button>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="submit" class="btn btn-primary btn-shadow" id="">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal_update">
    <div class="modal-dialog modal-md" role="document">
        <form action="{{ route('siswa.update', ['id' => 0]) }}" method="post" id="update_form">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update data siswa</h5> <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nim</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Nim" name="nim">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Nama" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan Email" name="email">
                        </div>
                    </div>
                    <button class="d-none" id="form-create-submit"></button>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button type="submit" class="btn btn-primary btn-shadow" id="">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-6">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apakah anda yakin?</h5> <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body"> Apakah anda yakin untuk menghapus data ini?</div>
            <div class="modal-footer">
                <form action="{{ route('siswa.destroy', ['id' => 0]) }}" method="post" class="confirm-delete">
                    @csrf
                    <button type="Submit" class="btn btn-danger btn-shadow">
                        Yes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(".btn_delete").click(function() {
            let newId = $(this).attr("data-id");
            let oldUrl = $(".confirm-delete").attr("action");
            let newUrl = oldUrl.replace("/0", `/${newId}`);
            $(".confirm-delete").attr("action", newUrl);
        });

        $('#fire-modal-6').on('hidden.bs.modal', function() {
            $(".confirm-delete").attr("action", "{{ route('siswa.destroy', ['id' => 0]) }}");
        })

        $(".btn_update").click(function() {
            let oldUrl = $("#update_form").attr("action");
            let newId = $(this).attr("data-id");
            let newUrl = oldUrl.replace("/0", `/${newId}`);
            $("#update_form").attr("action", newUrl);

            $.ajax({
                type: 'get',
                url: '/siswa/show/' + newId,
                data: {
                    'id': newId
                },
                success: function(data) {
                    const {
                        data_siswa
                    } = data;
                    $('#update_form input[name="nim"]').val(data_siswa.nim)
                    $('#update_form input[name="name"]').val(data_siswa.name)
                    $('#update_form input[name="email"]').val(data_siswa.email)
                }
            });
        })

        $('#modal_update').on('hidden.bs.modal', function() {
            $("#update_form").attr("action", "{{ route('siswa.update', ['id' => 0]) }}");
            $('#update_form input[name="nim"]').val("")
            $('#update_form input[name="name"]').val("")
            $('#update_form input[name="email"]').val("")
        })
    </script>
@endsection
