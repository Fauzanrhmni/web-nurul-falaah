@extends('admin.layouts.main')

@section('container')

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">{{ $title }}</h6>
                        <form class="d-none d-md-flex ms-4" action="/siswa/search" method="GET">
                            <input class="form-control border-0" type="text" name="query" placeholder="Cari siswa...">
                        </form>
                        <a href="/siswa/create" class="text-costum btn btn-primary">Tambah siswa</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">tanggal_lahir</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($siswa->isEmpty())
                                <tr>
                                    <td colspan="4">
                                        <center><h3>Tidak ada data</h3></center>
                                    </td>
                                </tr>
                            @else
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($siswa as $s)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ Date::parse($s->tanggal_lahir)->format('j F Y') }}</td>
                                        <td>{{ $s->alamat }}</td>
                                        <td>
                                            @if ($s->kelas)
                                                {{ $s->kelas->nama_kelas }}
                                            @else
                                                Tidak ada kelas
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="/siswa/{{ $s->id }}/edit">Edit</a>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $s->id }}">Hapus</button>
                                            <div class="modal fade" id="hapusModal_{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin ingin menghapus data siswa ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="/siswa/delete/{{ $s->id }}" method="POST">
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
                                
                            @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



@endsection

           