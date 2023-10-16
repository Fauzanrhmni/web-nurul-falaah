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
                    <h3>Tambah Fasilitas</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <form action="/fasilitasAdmin" method="post" enctype="multipart/form-data">
                                @csrf <!-- Token CSRF untuk perlindungan form -->
                                <div class="form-group mb-3">
                                    <label for="judul">judul:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="judul"
                                        name="judul"
                                    />
                                    @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Gamabar</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar">
                                </div>
                                    @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                               
                                <button type="submit" class="btn btn-primary">
                                    Tambah Fasilitas
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

@endsection