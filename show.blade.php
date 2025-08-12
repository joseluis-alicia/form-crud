@extends('layouts.administrator.main')
@section('content')

<div class="row mt-1">
    <div class="card">
        <div class="card-header">
            <div class="card-title text-center">
                <h5 class="text-uppercase">informasi pimpinan</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="row align-items-center">
                        <div class="col-lg-10 info-table-wrapper">
                            <table class="table table-sm text-dark table-borderless mb-2 w-100">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width:150px;">Bidang</th>
                                        <td style="width:20px;">:</td>
                                        <td>{{ $pimpinan->bidang }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->nip }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pangkat</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->pangkat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Golongan</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->golongan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->alamat_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td>:</td>
                                        <td>{{ $pimpinan->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto</th>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ $pimpinan->image ? Storage::url($pimpinan->image) : asset('build/images/User.png') }}" alt="Foto Pengguna" width="140" height="auto" class="border border-secondary-subtle rounded-circle">
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('index.pimpinan') }}" class="btn btn-primary btn-sm">Kembali</a>
            <a href="{{ route('edit.pimpinan', $pimpinan->hashid) }}" class="btn btn-secondary btn-sm ms-2">Edit</a>
        </div>
    </div>
</div>

@endsection
