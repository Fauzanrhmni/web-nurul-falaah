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
                    <h3>{{ $title }}</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <form action="/admin" method="post">
                                @csrf <!-- Token CSRF untuk perlindungan form -->
                                <div class="form-group mb-3">
                                    <label for="username">Username:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="username"
                                        name="username"
                                    />
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">name:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                    />
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">email:</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                    />
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">password:</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                    />
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