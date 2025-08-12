@extends('layouts.administrator.main')
@section('content')
    <div class="row mt-1">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-center">
                    <h5 class="text-uppercase">daftar pimpinan</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('create.pimpinan') }}" class="btn btn-primary btn-sm text-uppercase fw-bold">
                        tambah
                    </a>
                </div>
                <form action="" enctype="multipart/form-data">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm border-dark mb-0" style="font-size: 1rem;color:black">
                            <thead class="text-center align-middle text-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>Bidang</th>
                                    <th>Jabatan</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                @foreach ($pimpinans as $no => $pimpinan )
                                <tr>
                                    <td class="text-end align-middle" style="width:40px;padding-right:10px">{{ $no+1 }}.</td>
                                    <td class="text-center align-middle"">
                                        <img src="{{ $pimpinan->image ? Storage::url($pimpinan->image) : asset('build/images/User.png') }}" alt="Foto Pengguna" width="40" height="auto" class="border border-secondary-subtle rounded-circle">
                                    </td>
                                    <td class="align-middle">{{ $pimpinan->nama }}</td>
                                    <td class="text-center align-middle">{{ $pimpinan->bidang }}</td>
                                    <td class="text-center align-middle">{{ $pimpinan->jabatan }}</td>
                                    <td class="text-center align-middle">{{ $pimpinan->no_hp }}</td>
                                    <td class="align-middle" style="width:100px">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('edit.pimpinan', $pimpinan->hashid) }}" class="btn btn-info btn-sm me-1" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" data-bs-title="EDIT">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                            <a href="{{ route('show.pimpinan', $pimpinan->hashid) }}" class="btn btn-secondary btn-sm me-1" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" data-bs-title="LIHAT">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <form action="{{ route('destroy.pimpinan', $pimpinan->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="HAPUS" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                    <i class="mdi mdi-delete-variant"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>        
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
