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
                    <h3>Tambah kelas</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <form action="/kelas" method="post">
                                @csrf <!-- Token CSRF untuk perlindungan form -->
                                <div class="form-group mb-3">
                                    <label for="nama_kelas">nama kelas:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama_kelas"
                                        name="nama_kelas"
                                    />
                                    @error('nama_kelas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="wali_kelas" aria-label="Floating label select example">
                                        <option selected>Pilih Wali Kelas</option>
                                        @foreach($guru as $g)
                                            <option value="{{ $g->id }}">{{ $g->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Wali kelas</label>
                                </div>
                               
                                <button type="submit" class="btn btn-primary">
                                    Tambah Kelas
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

@endsection