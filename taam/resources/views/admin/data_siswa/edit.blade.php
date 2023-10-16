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
                    <h3>Edit siswa</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <form action="/siswa/{{ $siswa->id }}" method="POST">
                                @csrf <!-- Token CSRF untuk perlindungan form -->
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama">nama:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama"
                                        name="nama"
                                        value="{{ old('nama', $siswa->nama) }}" 
                                    />
                                    @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="tanggal_lahir"
                                        name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" 
                                    />
                                    @error('tanggal_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat">alamat:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="alamat"
                                        name="alamat"
                                        value="{{ old('alamat', $siswa->alamat) }}" 
                                    />
                                    @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="kelas_id" aria-label="Floating label select example">
                                        <option selected>Pilih Kelas</option>
                                        @foreach($kelas as $s)
                                        <option value="{{ $s->id }}" {{ $siswa->kelas_id == $s->id ? 'selected' : '' }}>
                                            {{ $s->nama_kelas }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Wali kelas</label>
                                </div>
                               
                                <button type="submit" class="btn btn-primary">
                                    Tambah Siswa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

@endsection