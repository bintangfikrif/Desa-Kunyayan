<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pekon Kunyayan - Kabupaten Tanggamus</title>
    @vite(['resources/css/styles.css', 'resources/css/carousel.css'])

</head>

<body class="antialiased">
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
    <main>
        <section class="berita-detail container py-5">
            <h1 class="h3 mb-4">{{ $berita->judul }}</h1>

            <!-- Image -->
            <img src="{{ asset('storage/' . $berita->photo) }}" alt="{{ $berita->judul }}" class="img-fluid mb-4"
                style="object-fit: cover; height: 400px; margin-left: auto; margin-right: auto; display: block;">

            <!-- Metadata (place and date) -->
            <p class="card-text text-muted" style="font-size: 14px">
                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }},
                Admin
            </p>
            <!-- Description -->
            <p><b>{{ $berita->tempat }},
                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}
                </b>{{ $berita->deskripsi }}</p>

            <!-- Optional: Add a back button or similar link -->
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back</a>
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
                <p><img src="{{ Vite::asset('resources/images/icon-phonecall.png') }}" alt="Phone"> 085378033300
                </p>
                <p><img src="{{ Vite::asset('resources/images/icon-mail.png') }}" alt="Email">
                    kunayannnkunayan@gmail.com</p>
                <p><img src="{{ Vite::asset('resources/images/icon-clock.png') }}" alt="Clock"> Senin - Jum'at
                    (08.00 - 15.00)</p>
                <p><img src="{{ Vite::asset('resources/images/icon-pin.png') }}" alt="Location"> Jl. Lintas Barat
                    Pekon
                    Kunyayan Kecamatan Wonosobo</p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
