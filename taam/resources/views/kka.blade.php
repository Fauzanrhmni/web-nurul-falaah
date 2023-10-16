@extends('layouts.main')

@section('container')
    <!-- Table Section Start -->
    <section class="table">
      <h1>
        Kalender Kegiatan Akademik<br />
        Tahun Ajaran {{ Date::now()->format('Y') }}
      </h1>
      <center>
        <table>
          <tr>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Tanggal</th>
          </tr>
          @php
            $no = 1;    
          @endphp
          @foreach($akademik as $k)
          <tr>
            <td>{{ $no++ }}</td>
            <td>
              {{ $k->kegiatan }}
            </td>
            <td>{{ Date::parse($k->tgl_awal)->format('j F Y') }} - {{ Date::parse($k->tgl_akhir)->format('j F Y') }}</td>
          </tr>
          @endforeach
        </table>
      </center>
    </section>
    <!-- Table Section End -->

    @endsection


