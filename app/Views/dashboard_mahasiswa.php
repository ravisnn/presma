<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Dashboard Mahasiswa</title>
</head>

<body>

<?php include('Template/sidebar_mahasiswa.php'); ?>

    <!-- Header Section -->
    <div class="p-4 sm:ml-64">
        <div class="p-1 rounded-lg bg-white dark:bg-gray-800">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-regular">Dashboard</h2>
                <div class="flex items-center">
                    <div class="relative inline-block text-left">
                        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown"
                            data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer"
                            src="<?php echo base_url(); ?>assets/Img/user.png" alt="User dropdown">

                        <!-- Profile Menu -->
                        <div id="userDropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div><?php echo $user['nama']; ?></div>
                            </div>
                            <div class="py-1">
                                <a href="<?php echo site_url('logout') ?>"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- End Header Section -->

    <!-- Dashboard Section with Welcome Message -->
            <div class="bg-white p-8 rounded shadow-md w-full">
                <h2 class="text-lg font-regular mb-4">Selamat datang, <?= esc($user['nama']); ?>!</h2>
                <p class="mb-6 text-gray-500">Semoga hari Anda menyenangkan!</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Card for Prestasi Count -->
                    <div class="bg-blue-100 p-6 rounded-lg shadow-md">
                        <h5 class="text-xl font-semibold text-gray-800">Jumlah Prestasi</h5>
                        <p class="text-lg text-gray-600 mt-2"><?= esc($prestasiCount); ?> Prestasi yang Anda miliki.</p>
                    </div>

                    <!-- Card for Sertifikat Count -->
                    <div class="bg-green-100 p-6 rounded-lg shadow-md">
                        <h5 class="text-xl font-semibold text-gray-800">Jumlah Sertifikat</h5>
                        <p class="text-lg text-gray-600 mt-2"><?= esc($sertifikatCount); ?> Sertifikat yang tersedia.</p>
                    </div>
                </div>
            </div>
    <!-- End Dashboard Section -->

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session()->getFlashdata('success') ?>',
                showConfirmButton: true,
                timer: 1500
            });
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session()->getFlashdata('error') ?>',
            });
        <?php endif; ?>
    </script>
</body>

</html>
