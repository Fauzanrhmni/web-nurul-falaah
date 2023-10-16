@extends('admin.layouts.main')

@section('container')

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-light rounded p-4">
        <h3>{{$title}}</h3>
        <div class="row">
            <div class="col-md-9">
                <form action="/akademik/{{ $akademik->id }}" method="post"> <!-- Ganti aksi form dan method -->
                    @csrf
                    @method('PUT') <!-- Gunakan metode PUT untuk perbarui -->

                    <div class="form-group mb-3">
                        <label for="kegiatan">Kegiatan:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="kegiatan"
                            name="kegiatan"
                            value="{{ old('kegiatan', $akademik->kegiatan) }}" 
                        />
                        @error('kegiatan')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tgl_awal">Tanggal Mulai:</label>
                        <input
                            type="date"
                            class="form-control"
                            id="tgl_awal"
                            name="tgl_awal"
                            value="{{ old('tgl_awal', $akademik->tgl_awal) }}"
                        />
                        @error('tgl_awal')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tgl_akhir">Tanggal belakhir:</label>
                        <input
                            type="date"
                            class="form-control"
                            id="tgl_akhir"
                            name="tgl_akhir"
                            value="{{ old('tgl_akhir', $akademik->tgl_akhir) }}"
                        />
                        @error('tgl_akhir')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Recent Sales End -->

@endsection
