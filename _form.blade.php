@csrf
@if (isset($pimpinan))
    @method('PUT')
@endif

<div class="row gx-3">
    {{-- Kolom Kiri --}}
    <div class="col-lg-7 col-md-5 mb-3">
        <div class="row">
            <div class="col-md-6">
                <label for="name" class="form-label">Bidang</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="bidang" id="bidang" class="form-control form-control-sm mb-2">
            </div>

            <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="jabatan" id="jabatan" class="form-control form-control-sm mb-2"
                    value="{{ old('jabatan', $pimpinan->jabatan ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="name" class="form-label">Nama</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="nama" id="nama" class="form-control form-control-sm mb-2"
                    value="{{ old('nama', $pimpinan->nama ?? '') }}">
            </div>

            <div class="col-md-6">
                <label for="jabatan" class="form-label">NIP</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="nip" id="nip" class="form-control form-control-sm mb-2"
                    value="{{ old('nip', $pimpinan->nip ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="name" class="form-label">Pangkat</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="pangkat" id="pangkat" class="form-control form-control-sm mb-2"
                    value="{{ old('pangkat', $pimpinan->pangkat ?? '') }}">
            </div>

            <div class="col-md-6">
                <label for="jabatan" class="form-label">Golongan</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="golongan" id="golongan" class="form-control form-control-sm mb-2"
                    value="{{ old('golongan', $pimpinan->golongan ?? '') }}">
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-md-12">
                <label for="email" class="form-label">Alamat KTP</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control form-control-sm"
                    value="{{ old('alamat_ktp', $pimpinan->alamat_ktp ?? '') }}">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-6">
                <label for="password" class="form-label">No HP</label>
                <div class="fs-6 text-danger fw-bold">
                </div>
                <input type="number" name="no_hp" id="no_hp" class="form-control form-control-sm"
                    value="{{ old('no_hp', $pimpinan->no_hp ?? '') }}">
            </div>

            <div class="col-md-6">
                <label for="gambarInput" class="form-label">Foto</label>
                <input type="file" name="image" id="gambarInput" class="form-control form-control-sm"
                onchange="previewGambar()">
                <div class="fs-6 text-danger fw-bold">
                    * Max 70 kb               
                </div>
            </div>
        </div>
    </div>

    {{-- Kolom Kanan --}}
    <div class="col-lg-5 col-md-7 text-center">
        <div class="row mt-2">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="position-relative" style="width: 200px; height: 250px;">
                    <img id="gambarPreview"
                        src="{{ isset($pimpinan) && $pimpinan->image ? Storage::url($pimpinan->image) : asset('build/images/User.png') }}"
                        alt="Preview Gambar"
                        class="img-thumbnail {{ isset($pimpinan) && $pimpinan->image ? '' : 'd-none' }}"
                        style="width: 100%; height: 100%; object-fit: cover;">

                    <button type="button" id="btnResetGambar" onclick="resetGambar()"
                        class="btn btn-sm btn-danger position-absolute"
                        style="top: 5px; right: 5px; border-radius: 50%; display: none; z-index: 10;">
                        &times;
                    </button>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-center">
                @if (isset($pimpinan) && $pimpinan->image)
                    <div class="col-md-12 mt-2">
                        <div class="form-check d-flex align-items-center justify-content-center">
                            <input class="form-check-input me-2" type="checkbox" name="hapus_gambar" id="hapusGambarCheck" value="1">
                            <label class="form-check-label" for="hapusGambarCheck">Hapus Foto Lama</label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Tombol Aksi --}}
<div class="mt-4">
    <button type="submit" class="btn btn-primary btn-sm mx-2 text-uppercase fw-bold">
        {{ isset($pimpinan) ? 'Update' : 'Simpan' }}
    </button>
    <a href="" class="btn btn-secondary btn-sm text-uppercase fw-bold">Kembali</a>
</div>

{{-- Script Preview Gambar --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('gambarInput');
        const preview = document.getElementById('gambarPreview');
        const resetBtn = document.getElementById('btnResetGambar');
        const defaultImage = '{{ asset('build/images/User.png') }}'; // fallback jika tidak ada gambar sama sekali

        window.previewGambar = function () {
            if (!input || !preview || !resetBtn) return;

            const file = input.files?.[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    resetBtn.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        };

        window.resetGambar = function () {
            if (!input || !preview || !resetBtn) return;

            input.value = '';
            preview.src = defaultImage;
            preview.classList.add('d-none');
            resetBtn.classList.add('d-none');
        };
    });
</script>

