@extends('layouts.main')

@section('container')

    <!-- Fasilitas main Start -->
    <main class="fasilitas">
      <h1>{{$title}}</h1>
      
      <div class="galery">
        @foreach($fasilitas as $f)
          <img src="{{ asset("storage/$f->gambar") }}" alt="Fasilitas" class="fasilitas-thumbnail">
        @endforeach

      </div>
    </main>
    <!-- Fasilitas main End -->


    


    
@endsection


