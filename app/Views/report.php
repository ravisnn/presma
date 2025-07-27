<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Kritik dan Saran</title>
</head>

<body>
    <?php include('Template/sidebar_mahasiswa.php'); ?>

    <div class="p-4 sm:ml-64">
        <!-- Header Section -->
        <div class="p-1 rounded-lg bg-white dark:bg-gray-800 mb-4">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-regular">Kritik dan Saran</h2>
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
        </div>
        <!-- End Header Section -->

        <!-- Kritik dan Saran Section -->
        <div class="p-4 bg-white rounded-lg">
            <form action="<?php echo site_url('report_submit'); ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <!-- Wrapper untuk Form -->
                <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg">
                    <div class="mb-4">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="<?= $user['email']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                        <label for="jenis" class="block mb-2 text-sm font-medium text-gray-700">Jenis Laporan</label>
                        <select id="jenis" name="jenis" class="w-full p-2 border border-gray-300 rounded-lg">
                            <option value="Kendala">Kendala</option>
                            <option value="Kritik">Kritik</option>
                            <option value="Saran">Saran</option>
                        </select>
                    </div>
                    <div>
                        <label for="pesan" class="block mb-2 text-sm font-medium text-gray-700">Pesan</label>
                        <textarea id="pesan" name="pesan" rows="4"
                            class="w-full p-2 border border-gray-300 rounded-lg"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Kirim</button>
            </form>
        </div>
        <!-- End Kritik dan Saran Section -->
    </div>

    <!-- Flowbite JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Sweetalert JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    <?php if (session()->getFlashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success'); ?>',
        });
    <?php elseif (session()->getFlashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '<?= session()->getFlashdata('error'); ?>',
        });
    <?php endif; ?>
</script>

</body>

</html>
