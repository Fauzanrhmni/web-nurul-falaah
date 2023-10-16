@extends('layouts.main')

@section('container')
    <!-- Profil main Start -->
    <main class="profil" id="profil">
      <h1>Profil</h1>

      <div class="row">
      <img src="{{ asset("storage/$sekolah->logo_sekolah") }}" alt="Logo Sekolah">

        <div class="prakata">
          <h1>Sambutan Kepala Sekolah</h1>
          <h2>{{$sekolah->nama_kepala}}</h2>
          <p>
            {!! $sekolah->sambutan_kepala !!}
          </p>
        </div>
      </div>
    </main>
    <!-- Profil main End -->

    <!-- Visi Misi main Start -->
    <main class="visi-misi" id="visi-misi">
      <h1>Visi Misi</h1>
      <h3>Visi</h3>
      <p>
        {!! $sekolah->visi !!}
      </p>
      <h3>Misi</h3>
      <p>
        {!! $sekolah->misi !!}
      </p>
    </main>
    <!-- Visi Misi main End -->

    <!-- Sejarah main Start -->
    <main class="sejarah" id="sejarah">
      <h1>Sejarah</h1>

      <p>
        {!! $sekolah->sejarah !!}
      </p>
    </main>
    <!-- Sejarah main End -->


    @endsection


