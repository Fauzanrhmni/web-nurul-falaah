@extends('layouts.main')

@section('container')
    <!-- Profil main Start -->
    <main>
        <h1>Jumlah Siswa</h1>
        @foreach ($kelasData as $namaKelas => $siswaKelas)
        <br>
            <p>Kelas : {{ $namaKelas }}</p>
            <center>
                <table>
                    <tr>
                        <th style="width: 2rem;">No</th>
                        <th>Nama Lengkap</th>
                        <th style="width: 15rem;">Kelas</th>
                    </tr>
                    @foreach ($siswaKelas as $s)
                        <tr>
                            <td style="width: 2rem;">{{ $loop->iteration }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $namaKelas }}</td>
                        </tr>
                    @endforeach
                </table>
            </center>
        @endforeach
</main>

    <!-- Profil main End -->

    <!-- Visi Misi main Start -->
    <main>
        <h1>Jumlah Pengajar</h1>
        <br>
            <center>
                <table>
                    <tr>
                        <th style="width: 2rem;">No</th>
                        <th>Nama Lengkap</th>
                    </tr>
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nama }}</td>
                        </tr>
                    @endforeach
                </table>
            </center>
    </main>
    <!-- Visi Misi main End -->



    @endsection


