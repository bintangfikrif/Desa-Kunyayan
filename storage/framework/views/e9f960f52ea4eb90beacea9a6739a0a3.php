<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stats - Admin</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/styles.css']); ?>
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
                    <a href="<?php echo e(route('admin.stats.edit')); ?>">Edit Stats</a>
                </li>
                <li style="display: inline; margin-right: 10px;">
                    <a href="<?php echo e(route('admin.kades.index')); ?>">Kades</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="form-container">
            <h2>Edit Statistik</h2>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.stats.update')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <label for="total_population">Total populasi:</label>
                <input type="number" name="total_population" value="<?php echo e($statistic->total_population); ?>" required>

                <label for="total_families">Total Kepala keluarga:</label>
                <input type="number" name="total_families" value="<?php echo e($statistic->total_families); ?>" required>

                <label for="total_males">Total Laki Laki:</label>
                <input type="number" name="total_males" value="<?php echo e($statistic->total_males); ?>" required>

                <label for="total_females">Total Perempuan:</label>
                <input type="number" name="total_females" value="<?php echo e($statistic->total_females); ?>" required>

                <label for="islam">Islam:</label>
                <input type="number" name="islam" value="<?php echo e($statistic->islam); ?>" required>

                <label for="christian">Kristiani:</label>
                <input type="number" name="christian" value="<?php echo e($statistic->christian); ?>" required>

                <label for="catholic">Katholik:</label>
                <input type="number" name="catholic" value="<?php echo e($statistic->catholic); ?>" required>

                <label for="hindu">Hindu:</label>
                <input type="number" name="hindu" value="<?php echo e($statistic->hindu); ?>" required>

                <label for="buddha">Buddha:</label>
                <input type="number" name="buddha" value="<?php echo e($statistic->buddha); ?>" required>

                <label for="konghucu">Konghucu:</label>
                <input type="number" name="konghucu" value="<?php echo e($statistic->konghucu); ?>" required>

                <button type="submit">Update Stats</button>
            </form>
        </div>
    </main>
</body>

</html>
<?php /**PATH D:\Kuliah\SEM 5\KKN\new Web\desa-kunyayang\resources\views/admin/stats/edit.blade.php ENDPATH**/ ?>