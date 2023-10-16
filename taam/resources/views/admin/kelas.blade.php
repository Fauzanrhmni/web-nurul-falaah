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
                        <form class="d-none d-md-flex ms-4" action="/kelas/search" method="GET">
                            <input class="form-control border-0" type="text" name="query" placeholder="Cari kelas...">
                        </form>
                        <a href="/kelas/create" class="text-costum btn btn-primary">Tambah kelas</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Wali Kelas</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($kelas->isEmpty())
                                <tr>
                                    <td colspan="4">
                                        <center><h3>Tidak ada data</h3></center>
                                    </td>
                                </tr>
                            @else
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($kelas as $k)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $k->nama_kelas }}</td>
                                        <td>
                                            @if ($k->guru)
                                                {{ $k->guru->nama }}
                                            @else
                                                Tidak ada kelas
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="/kelas/{{ $k->id }}/edit">Edit</a>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $k->id }}">Hapus</button>
                                            <div class="modal fade" id="hapusModal_{{ $k->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin ingin menghapus data kelas ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="/kelas/delete/{{ $k->id }}" method="POST">
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

           