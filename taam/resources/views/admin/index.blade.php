@extends('admin.layouts.main')

@section('container')
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-people-fill fa-3x text-costum"></i>
                            <div class="ms-3">
                                <p class="mb-2">Jumlah Siswa</p>
                                <h6 class="mb-0">{{ $jumlahSiswa }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-table fa-3x text-costum pb-4"></i>
                            <div class="ms-3">
                                <p class="mb-2">Jumlah Kelas</p>
                                <h6 class="mb-0">{{ $jumlahKelas }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-person-video3 fa-3x text-costum"></i>
                            <div class="ms-3">
                                <p class="mb-2">Jumlah Pengajar</p>
                                <h6 class="mb-0">{{ $jumlahGuru }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-calendar fa-3x text-costum"></i>
                            <div class="ms-3">
                                <p class="mb-2">Kalender Akademik</p>
                                <h6 class="mb-0">{{ $jumlahAkademik }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                <div class="bg-light rounded p-4">
                    <h3>Profil sekolah</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="storage/{{ $sekolah->logo_sekolah }}" class="img-fluid rounded-circle" alt="Foto Profil Guru" />
                        </div>
                        <div class="col-md-9">
                            <form action="/sekolah/{{ $sekolah->id }}/update" method="post" enctype="multipart/form-data">
                                @csrf <!-- Token CSRF untuk perlindungan form -->
                                @method('PATCH')
                                <div class="form-group mb-3">
                                    <label for="nama">Nama sekolah:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama"
                                        name="nama"
                                        value="{{ old('nama', $sekolah->nama_sekolah) }}"
                                    />
                                    @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="alamat"
                                        name="alamat"
                                        value="{{ old('alamat', $sekolah->alamat_sekolah) }}"
                                    />
                                    @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telepone">Telepone:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="telepone"
                                        name="telepone"
                                        value="{{ old('telepone', $sekolah->telepone_sekolah) }}"
                                    />
                                    @error('telepone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        value="{{ old('email', $sekolah->email_sekolah) }}"
                                    />
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama_kepala">Kepala Sekolah:</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama_kepala"
                                        name="nama_kepala"
                                        value="{{ old('nama_kepala', $sekolah->nama_kepala) }}"
                                    />
                                    @error('nama_kepala')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="sambutan_kepala">Sambutan Kepala Sekolah:</label>
                                    @error('sambutan_kepala')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea class="form-control" name="sambutan_kepala" id="sambutan" rows="3">{{ old('sambutan_kepala', $sekolah->sambutan_kepala) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Foto Kepala</label>
                                    <input class="form-control" type="file" id="formFile" name="logo_sekolah" value="{{ old('logo_sekolah', $sekolah->logo_sekolah) }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="visi">Visi:</label>
                                    @error('visi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea class="form-control" name="visi" id="sambutan" rows="3">{{ old('visi', $sekolah->visi) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="misi">Misi:</label>
                                    @error('misi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea class="form-control" name="misi" id="sambutan" rows="3">{{ old('misi', $sekolah->misi) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="sejarah">Sejarah:</label>
                                    @error('sejarah')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <textarea class="form-control" name="sejarah" id="sambutan" rows="3">{{ old('sejarah', $sekolah->sejarah) }}</textarea>
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


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Data Staff</h6>
                        <a href="/admin/create" class="text-costum btn btn-primary">Tambah admin</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">username</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="/admin/{{ $u->id }}/edit">Edit</a>

                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $u->id }}">Hapus</button>

                                        <div class="modal fade" id="hapusModal_{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin menghapus data ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="/admin/delete/{{ $u->id }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->




@endsection

           