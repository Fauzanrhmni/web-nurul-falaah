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
                        <form class="d-none d-md-flex ms-4" action="/pesan/search" method="GET">
                            <input class="form-control border-0" type="text" name="query" placeholder="Cari nama...">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengirim</th>
                                    <th scope="col">Nomor HP</th>
                                    <th scope="col">Pesan</th>
                                    <th scope="col">tanggal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($pesan->isEmpty())
                                <tr>
                                    <td colspan="4">
                                        <center><h3>Tidak ada data</h3></center>
                                    </td>
                                </tr>
                            @else
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($pesan as $p)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->no_hp }}</td>
                                        <td>{{ $p->pesan }}</td>
                                        <td>{{ Date::parse($p->created_at)->format('j F Y H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#hapusModal_{{ $p->id }}">Hapus</button>
                                            <div class="modal fade" id="hapusModal_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin ingin menghapus data pesan ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="/pesan/delete/{{ $p->id }}" method="POST">
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

           