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
                <h2 class="text-2xl font-regular">Cek Prestasi</h2>
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

            <!-- Dashboard Section -->
            <div class="p-4 bg-gray-100 border border-gray-300 rounded-lg">
                <h2 class="text-lg font-regular mb-4">Data Mahasiswa</h2>
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" id="nim" name="nim" value="<?= $user['nim']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="prodi" class="block text-sm font-medium text-gray-700">Program Studi</label>
                        <input type="text" id="prodi" name="prodi" value="<?= $user['prodi']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="kampus" class="block text-sm font-medium text-gray-700">Kampus</label>
                        <input type="text" id="kampus" name="kampus" value="<?= $user['kampus']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="<?= $user['email']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="telp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" id="telp" name="telp" value="<?= $user['telp']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 hidden">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <input type="text" id="role" name="role" value="<?= $user['role']; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="prestasiCount" class="block text-sm font-medium text-gray-700">Jumlah Prestasi</label>
                        <input type="text" id="prestasiCount" name="prestasiCount" value="<?= $prestasiCount; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="sertifikatCount" class="block text-sm font-medium text-gray-700">Jumlah Sertifikat</label>
                        <input type="text" id="sertifikatCount" name="sertifikatCount" value="<?= $sertifikatCount; ?>" readonly
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </form>
            </div>
            <!-- End Dashboard Section-->

            <!-- Edit dan Download Sertifikat Button -->
            <div class="mt-5 flex gap-4">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Edit
                </button>

                <button data-modal-target="pdf-modal" data-modal-toggle="pdf-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Download Sertifikat
                </button>
            </div>

            <!-- Tabel Prestasi Mahasiswa -->
            <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4 mt-6">
                <h3 class="text-xl font-medium mb-4">Daftar Prestasi</h3>
                <!-- Search Form -->
                <form method="get" action="<?= base_url('cek_prestasi') ?>" class="mb-4 mt-8 text-left">
                    <div class="flex">
                        <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>"
                            class="border px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-300 flex-grow"
                            placeholder="Masukkan keyword...">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                    </div>
                </form>
                <!-- End Search Form -->
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th scope="col" class="py-3 px-6">No</th>
                            <th scope="col" class="py-3 px-6">Prestasi</th>
                            <th scope="col" class="py-3 px-6">Kegiatan</th>
                            <th scope="col" class="py-3 px-6">Tahun</th>
                            <th scope="col" class="py-3 px-6">Kategori</th>
                            <th scope="col" class="py-3 px-6">Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prestasi as $key => $data): ?>
                        <tr class="bg-white border-b">
                            <td class="py-3 px-6"><?= $key + 1; ?></td>
                            <td class="py-3 px-6"><?= $data['prestasi']; ?></td>
                            <td class="py-3 px-6"><?= $data['kegiatan']; ?></td>
                            <td class="py-3 px-6"><?= $data['tahun']; ?></td>
                            <td class="py-3 px-6"><?= $data['kategori']; ?></td>
                            <td class="py-3 px-6"><?= $data['tingkat']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- End Tabel Prestasi -->

            <!-- Pagination Links -->
            <div class="mt-4">
                <?= $pager->links('prestasi', 'pagination') ?>
            </div>
            <!-- End Pagination Links -->

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-regular text-gray-900 dark:text-white">
                                Edit Data Mahasiswa
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="<?= site_url('update_mahasiswa') ?>" method="POST" class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <div class="col-span-2 hidden">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="nama" id="nama" value="<?= $user['nama'] ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name">
                                </div>
                                <div class="col-span-2">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email" value="<?= $user['email'] ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name">
                                </div>
                                <?php if (isset(session('errors')['email'])): ?>
                                    <span class="text-red-500 text-sm"><?= session('errors')['email'] ?></span>
                                <?php endif; ?>
                                <div class="col-span-2">
                                    <label for="telp"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                                    <input type="number" name="telp" id="telp" value="<?= $user['telp'] ?>"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name">
                                </div>
                                <div class="col-span-2 hidden">
                                    <label for="role"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <select name="role" id="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="Admin" <?= $user['role'] == 'Admin' ? 'selected' : ''; ?>>Admin
                                        </option>
                                        <option value="Mahasiswa" <?= $user['role'] == 'Mahasiswa' ? 'selected' : ''; ?>>
                                            Mahasiswa
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update Data Mahasiswa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Bagian Sertifikat yang Disembunyikan dalam Form -->
            <div class="hidden">
                <label for="sertifikat" class="block text-sm font-medium text-gray-700">Sertifikat</label>
                    <div class="space-y-2">
                        <?php if (!empty($user['sertifikat'])): ?>
                            <?php 
                                $sertifikatFiles = explode(',', $user['sertifikat']);
                                foreach ($sertifikatFiles as $file): 
                            ?>
                                <a href="<?= base_url('assets/Sertifikat/' . trim($file)); ?>" download
                                    class="block text-center px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Download <?= basename(trim($file)) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-red-500">Tidak ada sertifikat yang tersedia untuk diunduh.</p>
                        <?php endif; ?>
                    </div>
                </div>
                
            <!-- Modal PDF untuk sertifikat -->
                <div id="pdf-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Download Sertifikat PDF</h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="pdf-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">Klik tombol di bawah untuk mengunduh sertifikat PDF.</p>
                                <div class="space-y-2">
                                    <?php if (!empty($sertifikatFiles)): ?>
                                        <?php foreach ($sertifikatFiles as $file): ?>
                                            <a href="<?= base_url('assets/Sertifikat/' . trim($file)); ?>" download
                                                class="block text-center px-5 py-2.5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Download <?= basename(trim($file)) ?>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p class="text-red-500">Tidak ada sertifikat yang tersedia untuk diunduh.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PDF Modal -->
            </div>
        <!-- End Cek Prestasi Mahasiswa Section -->

        <!-- Flowbite JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

        <!-- Sweetalert JS-->
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

            <?php if (session()->getFlashdata('errors')): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: '<ul><?php foreach (session()->getFlashdata('errors') as $error): ?><li><?= $error ?></li><?php endforeach; ?></ul>',
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
