@extends('layouts.main')

@section('container')

@if(session('pesan'))
  <script>
    alert('{{ session('pesan') }}');
  </script>                
@endif

    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>TAAM Nurul Falaah Cikoneng</h1>
        <p>Lorem ipsum dolor sit amet consectetur</p>
        <a href="/kalender" class="cta" target="_blank">Kalender Akademik</a>
      </main>
    </section>
    <!-- Hero Section End -->

    <!-- Amount Section Start -->
    <section class="amount">
      <div class="rectangle">
        <div class="text">
          <h1>{{ $jumlahsiswa }}</h1>
          <p>Siswa</p>
        </div>
        <div class="text">
          <h1>{{ $jumlahguru }}</h1>
          <p>guru</p>
        </div>
        <div class="text">
          <h1>{{ $jumlahkelas }}</h1>
          <p>kelas</p>
        </div>
      </div>
    </section>
    <!-- Amount Section End -->

    <!-- Rules Section Start -->
    <section class="rules">
      <div class="rules-img">
      @foreach($fasilitas->take(2) as $f)
          <div class="img">
              <img src="{{ asset("storage/$f->gambar") }}" alt="Fasilitas" class="img-card1" height= '350 px'/>
          </div>
      @endforeach
      </div>
    </section>
    <!-- Rules Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
      <h2>Kontak Kami</h2>
      <h1>TAAM Nurul Falaah Cikoneng</h1>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.230793735389!2d108.22415887465235!3d-7.327955292680355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f575ac796e5bd%3A0x1266496f1d655684!2sUniversitas%20Bina%20Sarana%20Informatika%20Kampus%20Tasikmalaya%20(UBSI%20Tasikmalaya)!5e0!3m2!1sid!2sid!4v1685781638931!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="/form" method="POST">
            @csrf <!-- Token CSRF untuk perlindungan form -->
            <div class="input-group">
                <i data-feather="user"></i>
                <input type="text" name="nama" placeholder="Masukkan Nama" />
            </div>
            <div class="input-group">
                <i data-feather="phone"></i>
                <input type="text" name="no_hp" placeholder="Masukkan No. HP" />
            </div>
            <div class="input-group">
                <i data-feather="message-circle"></i>
                <input type="pesan" name="pesan" placeholder="Masukkan pesan" />
            </div>
            <button type="submit" class="btn">Kirim Pesan</button>
        </form>

      </div>
    </section>
    <!-- Contact Section End -->



    @endsection


