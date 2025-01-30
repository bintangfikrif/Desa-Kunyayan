<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pekon - Pekon Kunyayan</title>
    @vite(['resources/css/styles.css'])

</head>

<body>
    <header>
        <div class="logo-container">
            <img src="{{ Vite::asset('resources/images/icon-tanggamus.png') }}" alt="Logo Kabupaten Tanggamus"
                class="logo-header">
            <div class="logo-text">
                <h1>Pekon Kunyayan</h1>
                <p>Kabupaten Tanggamus</p>
            </div>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('home') }}"
                        class="{{ Request::is('/') || Request::is('home') ? 'active' : '' }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('profil') }}" class="{{ Request::is('profil') ? 'active' : '' }}">Profil Pekon</a>
                </li>
                <li>
                    <a href="{{ route('infografis') }}"
                        class="{{ Request::is('infografis') ? 'active' : '' }}">Infografis</a>
                </li>
                <li>
                    <a href="{{ route('mitigasi') }}" class="{{ Request::is('mitigasi') ? 'active' : '' }}">Mitigasi
                        Bencana</a>
                </li>
                @auth
                    @if (auth()->user()->hasRole('admin'))
                        <li>
                            <a href="{{ route('admin.home') }}"
                                class="{{ Request::is('admin/home') ? 'active' : '' }}">Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.stats.edit') }}"
                                class="{{ Request::is('admin/stats/edit') ? 'active' : '' }}">Edit Stats</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.kades.index') }}"
                                class="{{ Request::is('admin/kades') ? 'active' : '' }}">Kades</a>
                        </li>
                        <li style="display: inline; margin-right: 10px;">
                            <a href="{{ route('admin.berita.index') }}">Berita</a>
                        </li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </nav>
    </header>


    <main class="profile-content">
        <section class="village-intro">
            <div class="village-image">
                <img src="{{ Vite::asset('resources/images/icon-tanggamus.png') }}" alt="Kabupaten Tanggamus"
                    class="profile-image">
            </div>
            <div class="village-details">
                <h2>PEKON KUNYAYAN</h2>
                <p>Kecamatan Wonosobo, Kabupaten</p>
                <p>Tanggamus, Provinsi Lampung</p>
            </div>
        </section>

        <section class="vision-mission">
            <div class="vision">
                <h2>VISI</h2>
                <p>"Dengan Ridho ALLAH SWT Bersama-sama masyarakat demi terbangunnya tata kelola pemerintahan
                    pekon Kunyayan yang baik dan bersih guna mewujudkan pekon kunyayan yang adil, makmur dengan
                    iman dan takwa serta bermanfaat."</p>
            </div>

            <div class="mission">
                <h2>MISI</h2>
                <p>"Menyelenggarakan pemerintahan pekon yang bersih demokratis dan terbebas dari korupsi,
                    kolusi, dan nepotisme (KKN) serta bentuk penyelewengan lainnya."
                <p>
            </div>
        </section>

        <section class="organization">
            <h2>Struktur Organisasi Perangkat Pekon Kunyayan</h2>
            <div class="org-chart">
                <h3>Struktur Organisasi Pemerintahan Pekon Kunyayan</h3>
                <img src="{{ Vite::asset('resources/images/icon-pekon.png') }}" alt="Struktur Organisasi"
                    class="org-chart-image">

            </div>
            <div class="org-chart">
                <h3>Struktur Organisasi BHP Pekon Kunyayan</h3>
                <img src="{{ Vite::asset('resources/images/icon-bhp.png') }}" alt="Struktur Organisasi"
                    class="org-chart-image">

            </div>
            <div class="org-chart">
                <h3>Struktur Organisasi LPM Pekon Kunyayan</h3>
                <img src="{{ Vite::asset('resources/images/icon-lpm.png') }}" alt="Struktur Organisasi"
                    class="org-chart-image">

            </div>
        </section>

        <section class="administrasi_map">
            <h2>Peta Administrasi Kunyayan</h2>
            <div class="peta-adminstrasi">
                <img src="{{ Vite::asset('resources/images/icon-peta_administrasi.png') }}" alt="Peta Administrasi"
                    class="peta-administrasi-img">
            </div>
        </section>

        <section class="kepala-desa-list container py-5">
            <h2 class="title">Daftar Kepala Pekon</h2>
            <div class="card-kades-container">
                @foreach ($kades as $kade)
                    <div class="card-kades">
                        <!-- Card Image -->
                        <img src="{{ asset('storage/' . $kade->photo_url) }}" alt="{{ $kade->name }}"
                            class="card-kades-img">
                        <div class="card-kades-body">
                            <!-- Card Name -->
                            <h5 class="card-kades-title">{{ $kade->name }}</h5>
                            <!-- Card Year of Service -->
                            <p class="card-kades-text">Tahun Jabatan: {{ $kade->tahun_jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="{{ Vite::asset('resources/images/icon-tanggamus.png') }} " alt="Logo Kabupaten Tanggamus"
                    class="logo">
                <div class="footer-text">
                    <h3>Pekon Kunyayan</h3>
                    <p>Kecamatan Wonosobo</p>
                    <p>Kabupaten Tanggamus</p>
                    <p>Provinsi Lampung</p>
                </div>
            </div>
            <div class="contact-info">
                <h3>Kontak Pekon</h3>
                <p><img src="{{ Vite::asset('resources/images/icon-phonecall.png') }}" alt="Phone"> 085378033300</p>
                <p><img src="{{ Vite::asset('resources/images/icon-mail.png') }}" alt="Email">
                    kunayannnkunayan@gmail.com</p>
                <p><img src="{{ Vite::asset('resources/images/icon-clock.png') }}" alt="Clock"> Senin - Jum'at
                    (08.00 - 15.00)</p>
                <p><img src="{{ Vite::asset('resources/images/icon-pin.png') }}" alt="Location"> Jl. Lintas Barat Pekon
                    Kunyayan Kecamatan Wonosobo</p>
            </div>
        </div>
    </footer>
</body>

</html>
