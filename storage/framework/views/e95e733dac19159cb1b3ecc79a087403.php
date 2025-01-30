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
                class="logo">
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
            <h2>Edit Berita</h2>
            <form action="<?php echo e(route('admin.berita.update', $berita->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" class="form-control" name="photo">
                    <?php if($berita->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $berita->photo)); ?>" class="img-thumbnail mt-2" width="150">
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?php echo e($berita->judul); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="7" required><?php echo e($berita->deskripsi); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Kegiatan</label>
                    <input type="text" class="form-control" name="tempat" value="<?php echo e($berita->tempat); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" name="tanggal" value="<?php echo e($berita->tanggal); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
<?php /**PATH D:\Kuliah\SEM 5\KKN\new Web\desa-kunyayang\resources\views/admin/berita/edit.blade.php ENDPATH**/ ?>