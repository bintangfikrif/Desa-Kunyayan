<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kades - Admin</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/styles.css']); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
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
            <ul style="list-style: none; display: inline;">
                <li style="display: inline; margin-right: 10px;">
                    <a href="<?php echo e(route('admin.home')); ?>">Home</a>
                </li>
                <li style="display: inline; margin-right: 10px;">
                    <a href="<?php echo e(route('admin.berita.index')); ?>">Berita</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        
        <div class="form-container">
            <h2>Manajemen Berita</h2>
            <a href="<?php echo e(route('admin.berita.create')); ?>" class="btn btn-success mb-3">Tambah Berita</a>

            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Tempat Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <?php if($berita->photo): ?>
                                    <img src="<?php echo e(asset('storage/' . $berita->photo)); ?>" class="img-thumbnail"
                                        width="100">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($berita->judul); ?></td>
                            <td><?php echo e($berita->tempat); ?></td>
                            <td><?php echo e($berita->tanggal); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.berita.edit', $berita->id)); ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('admin.berita.destroy', $berita->id)); ?>" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
<?php /**PATH D:\Kuliah\SEM 5\KKN\new Web\desa-kunyayang\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>