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
                    <h3>Edit Guru</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <form action="/guru/{{ $guru->id }}" method="post">
                                @csrf <!-- Token CSRF untuk perlindungan form -->
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="nama">nama:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama"
                                        name="nama"
                                        value="{{ $guru->nama }}"
                                    />
                                    @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telepone">telepone:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="telepone"
                                        name="telepone"
                                        value="{{ $guru->telepone }}"
                                    />
                                    @error('telepone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat">alamat:</label>
                                    <input
                                        type="alamat"
                                        class="form-control"
                                        id="alamat"
                                        name="alamat"
                                        value="{{ $guru->alamat }}"
                                    />
                                    @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                                <button type="submit" class="btn btn-primary">
                                    Tambah Guru
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

@endsection