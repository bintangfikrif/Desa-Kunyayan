<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pekon Kunyayan - Kabupaten Tanggamus</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/styles.css', 'resources/css/carousel.css']); ?>

</head>

<body class="antialiased">
    <header>
        <div class="logo-container">
            <img src="<?php echo e(Vite::asset('resources/images/icon-tanggamus.png')); ?>" alt="Logo Kabupaten Tanggamus"
                class="logo-header">
            <div class="logo-text">
                <h1>Pekon Kunyayan</h1>
                <p>Kabupaten Tanggamus</p>
            </div>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="<?php echo e(route('home')); ?>"
                        class="<?php echo e(Request::is('/') || Request::is('home') ? 'active' : ''); ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo e(route('profil')); ?>" class="<?php echo e(Request::is('profil') ? 'active' : ''); ?>">Profil Pekon</a>
                </li>
                <li>
                    <a href="<?php echo e(route('infografis')); ?>"
                        class="<?php echo e(Request::is('infografis') ? 'active' : ''); ?>">Infografis</a>
                </li>
                <li>
                    <a href="<?php echo e(route('mitigasi')); ?>" class="<?php echo e(Request::is('mitigasi') ? 'active' : ''); ?>">Mitigasi
                        Bencana</a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->hasRole('admin')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.home')); ?>"
                                class="<?php echo e(Request::is('admin/home') ? 'active' : ''); ?>">Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.stats.edit')); ?>"
                                class="<?php echo e(Request::is('admin/stats/edit') ? 'active' : ''); ?>">Edit Stats</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.kades.index')); ?>"
                                class="<?php echo e(Request::is('admin/kades') ? 'active' : ''); ?>">Kades</a>
                        </li>
                        <li style="display: inline; margin-right: 10px;">
                            <a href="<?php echo e(route('admin.berita.index')); ?>">Berita</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="logout-button">
                                Logout
                            </button>
                        </form>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('login')); ?>">Log in</a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>

    </header>
    <main>
        <section class="berita-detail container py-5">
            <h1 class="h3 mb-4"><?php echo e($berita->judul); ?></h1>

            <!-- Image -->
            <img src="<?php echo e(asset('storage/' . $berita->photo)); ?>" alt="<?php echo e($berita->judul); ?>" class="img-fluid mb-4"
                style="object-fit: cover; height: 400px; margin-left: auto; margin-right: auto; display: block;">

            <!-- Metadata (place and date) -->
            <p class="card-text text-muted" style="font-size: 14px">
                <?php echo e(\Carbon\Carbon::parse($berita->tanggal)->format('d F Y')); ?>,
                Admin
            </p>
            <!-- Description -->
            <p><b><?php echo e($berita->tempat); ?>,
                    <?php echo e(\Carbon\Carbon::parse($berita->tanggal)->format('d F Y')); ?>

                </b><?php echo e($berita->deskripsi); ?></p>

            <!-- Optional: Add a back button or similar link -->
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-secondary mt-3">Back</a>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-logo">
                <img src="<?php echo e(Vite::asset('resources/images/icon-tanggamus.png')); ?> " alt="Logo Kabupaten Tanggamus"
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
                <p><img src="<?php echo e(Vite::asset('resources/images/icon-phonecall.png')); ?>" alt="Phone"> 085378033300
                </p>
                <p><img src="<?php echo e(Vite::asset('resources/images/icon-mail.png')); ?>" alt="Email">
                    kunayannnkunayan@gmail.com</p>
                <p><img src="<?php echo e(Vite::asset('resources/images/icon-clock.png')); ?>" alt="Clock"> Senin - Jum'at
                    (08.00 - 15.00)</p>
                <p><img src="<?php echo e(Vite::asset('resources/images/icon-pin.png')); ?>" alt="Location"> Jl. Lintas Barat
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
<?php /**PATH D:\Kuliah\SEM 5\KKN\new Web\desa-kunyayang\resources\views/detail_berita.blade.php ENDPATH**/ ?>