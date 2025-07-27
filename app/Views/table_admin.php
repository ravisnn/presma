<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Tabel Admin</title>
</head>

<?php include ('Template/sidebar.php'); ?>

<!-- Header Section -->
<div class="p-4 sm:ml-64">
    <div class="p-1 rounded-lg bg-white dark:bg-gray-800">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-regular">Tabel Admin</h2>
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

        <!-- Input Section -->
        <a href="<?php echo site_url('form_admin') ?>"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus"></i> Input Data
        </a>
        <!-- End Input Section -->

        <!-- Search Form -->
        <form method="get" action="<?= base_url('/table_admin') ?>" class="mb-4 mt-8 text-left">
            <div class="flex">
                <input type="text" name="keyword" value="<?= esc($keyword) ?>"
                    class="border px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-300 flex-grow"
                    placeholder="Masukkan keyword...">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
            </div>
        </form>
        <!-- End Search Form -->

        <!-- Table Section -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-8">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Password</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">NIM</th>
                        <th scope="col" class="px-6 py-3">Program Studi</th>
                        <th scope="col" class="px-6 py-3">Kampus</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Nomor Telepon</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Sertifikat</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = ($currentPage - 1) * $perPage + 1;
                    foreach ($admins as $admin): ?>
                        <tr class="table-row bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $i++ ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['username'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['password'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['nama'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['nim'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['prodi'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['kampus'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['email'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['telp'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['role'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $admin['sertifikat'] ?>
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <!-- Edit Modal toggle -->
                                <button data-modal-target="crud-modal<?= $admin['id'] ?>"
                                    data-modal-toggle="crud-modal<?= $admin['id'] ?>"
                                    class="edit-btn mb-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>

                                <!-- Edit Modal -->
                                <div id="crud-modal<?= $admin['id'] ?>" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-regular text-gray-900 dark:text-white">Edit Data
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="crud-modal<?= $admin['id'] ?>">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="<?= site_url('update_admin') ?>" method="POST"
                                                enctype="multipart/form-data" class="p-4 md:p-5">
                                                <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <!-- Populate input fields with data -->
                                                    <div class="col-span-2">
                                                        <label for="username"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                        <input type="text" name="username" id="username"
                                                            value="<?= $admin['username'] ?>"
                                                            class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['username'])): ?>
                                                            <span
                                                                class="text-red-500 text-sm"><?= session('errors')['username'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="password"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                                        <input type="password" name="password" id="password"
                                                            value="<?= $admin['password'] ?>"
                                                            class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['password'])): ?>
                                                            <span
                                                                class="text-red-500 text-sm"><?= session('errors')['password'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="nama"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                        <input type="text" name="nama" id="nama"
                                                            value="<?= $admin['nama'] ?>"
                                                            class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['nama'])): ?>
                                                            <span
                                                                class="text-red-500 text-sm"><?= session('errors')['nama'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="nim"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                                                        <input type="number" name="nim" id="nim"
                                                            value="<?= $admin['nim'] ?>"
                                                            class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['nim'])): ?>
                                                            <span
                                                                class="text-red-500 text-sm"><?= session('errors')['nim'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                        <input type="email" name="email" id="email"
                                                            value="<?= $admin['email'] ?>"
                                                            class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['email'])): ?>
                                                            <span
                                                                class="text-red-500 text-sm"><?= session('errors')['email'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="telp"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                                                        <input type="number" name="telp" id="telp"
                                                            value="<?= $admin['telp'] ?>"
                                                            class="input-field bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['telp'])): ?>
                                                            <span
                                                                class="text-red-500 text-sm"><?= session('errors')['telp'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                                            <select name="role" id="role"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="Admin" <?= old('role', $admin['role']) == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                                                <option value="Mahasiswa" <?= old('role', $admin['role']) == 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                                                            </select>
                                                        <?php if (isset(session('errors')['role'])): ?>
                                                            <span class="text-red-500 text-sm"><?= session('errors')['role'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program Studi</label>
                                                        <select name="prodi" id="prodi"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value="Sistem Informasi (S1) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Sistem Informasi (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Sistem Informasi (S1) - Teknik & Informatika</option>
                                                            <option value="Teknologi Informasi (S1) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Teknologi Informasi (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Teknologi Informasi (S1) - Teknik & Informatika</option>
                                                            <option value="Software Engineering (S1) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Software Engineering (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Software Engineering (S1) - Teknik & Informatika</option>
                                                            <option value="Informatika (S1) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Informatika (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Informatika (S1) - Teknik & Informatika</option>
                                                            <option value="Teknik Industri (S1) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Teknik Industri (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Teknik Industri (S1) - Teknik & Informatika</option>
                                                            <option value="Teknik Elektro (S1) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Teknik Elektro (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Teknik Elektro (S1) - Teknik & Informatika</option>
                                                            <option value="Sistem Informasi (D3) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Sistem Informasi (D3) - Teknik & Informatika') ? 'selected' : '' ?>>Sistem Informasi (D3) - Teknik & Informatika</option>
                                                            <option value="Sistem Informasi Akuntansi (D3) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Sistem Informasi Akuntansi (D3) - Teknik & Informatika') ? 'selected' : '' ?>>Sistem Informasi Akuntansi (D3) - Teknik & Informatika</option>
                                                            <option value="Teknologi Komputer (D3) - Teknik & Informatika"
                                                                <?= ($admin['prodi'] == 'Teknologi Komputer (D3) - Teknik & Informatika') ? 'selected' : '' ?>>Teknologi Komputer (D3) - Teknik & Informatika</option>
                                                            <option value="Ilmu Komunikasi (S1) - Komunikasi & Bahasa"
                                                                <?= ($admin['prodi'] == 'Ilmu Komunikasi (S1) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Ilmu Komunikasi (S1) - Komunikasi & Bahasa</option>
                                                            <option value="Sastra Inggris (S1) - Komunikasi & Bahasa"
                                                                <?= ($admin['prodi'] == 'Sastra Inggris (S1) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Sastra Inggris (S1) - Komunikasi & Bahasa</option>
                                                            <option value="Public Relations (D3) - Komunikasi & Bahasa"
                                                                <?= ($admin['prodi'] == 'Public Relations (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Public Relations (D3) - Komunikasi & Bahasa</option>
                                                            <option value="Broadcasting (D3) - Komunikasi & Bahasa"
                                                                <?= ($admin['prodi'] == 'Broadcasting (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Broadcasting (D3) - Komunikasi & Bahasa</option>
                                                            <option value="Advertising (D3) - Komunikasi & Bahasa"
                                                                <?= ($admin['prodi'] == 'Advertising (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Advertising (D3) - Komunikasi & Bahasa</option>
                                                            <option value="Bahasa Inggris (D3) - Komunikasi & Bahasa"
                                                                <?= ($admin['prodi'] == 'Bahasa Inggris (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Bahasa Inggris (D3) - Komunikasi & Bahasa</option>
                                                            <option value="Manajemen (S1) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Manajemen (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Manajemen (S1) - Ekonomi & Bisnis</option>
                                                            <option value="Akuntansi (S1) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Akuntansi (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Akuntansi (S1) - Ekonomi & Bisnis</option>
                                                            <option value="Pariwisata (S1) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Pariwisata (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Pariwisata (S1) - Ekonomi & Bisnis</option>
                                                            <option value="Hukum Bisnis (S1) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Hukum Bisnis (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Hukum Bisnis (S1) - Ekonomi & Bisnis</option>
                                                            <option value="Administrasi Perkantoran (D3) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Administrasi Perkantoran (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Administrasi Perkantoran (D3) - Ekonomi & Bisnis</option>
                                                            <option value="Akuntansi (D3) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Akuntansi (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Akuntansi (D3) - Ekonomi & Bisnis</option>
                                                            <option value="Administrasi Bisnis (D3) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Administrasi Bisnis (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Administrasi Bisnis (D3) - Ekonomi & Bisnis</option>
                                                            <option value="Manajemen Pajak (D3) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Manajemen Pajak (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Manajemen Pajak (D3) - Ekonomi & Bisnis</option>
                                                            <option value="Perhotelan (D3) - Ekonomi & Bisnis"
                                                                <?= ($admin['prodi'] == 'Perhotelan (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Perhotelan (D3) - Ekonomi & Bisnis</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="kampus"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kampus</label>
                                                        <select name="kampus" id="kampus"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value="UBSI KRAMAT 98" <?= ($admin['kampus'] == 'UBSI KRAMAT 98') ? 'selected' : '' ?>>UBSI KRAMAT 98</option>
                                                            <option value="UBSI DEWI SARTIKA A" <?= ($admin['kampus'] == 'UBSI DEWI SARTIKA A') ? 'selected' : '' ?>>UBSI DEWI SARTIKA A
                                                            </option>
                                                            <option value="UBSI DEWI SARTIKA B" <?= ($admin['kampus'] == 'UBSI DEWI SARTIKA B') ? 'selected' : '' ?>>UBSI DEWI SARTIKA B
                                                            </option>
                                                            <option value="UBSI SALEMBA 22" <?= ($admin['kampus'] == 'UBSI SALEMBA 22') ? 'selected' : '' ?>>UBSI SALEMBA 22</option>
                                                            <option value="UBSI SLIPI" <?= ($admin['kampus'] == 'UBSI SLIPI') ? 'selected' : '' ?>>UBSI SLIPI</option>
                                                            <option value="UBSI PEMUDA" <?= ($admin['kampus'] == 'UBSI PEMUDA') ? 'selected' : '' ?>>UBSI PEMUDA</option>
                                                            <option value="UBSI JATIWARINGIN" <?= ($admin['kampus'] == 'UBSI JATIWARINGIN') ? 'selected' : '' ?>>UBSI JATIWARINGIN
                                                            </option>
                                                            <option value="UBSI KALIMALANG" <?= ($admin['kampus'] == 'UBSI KALIMALANG') ? 'selected' : '' ?>>UBSI KALIMALANG</option>
                                                            <option value="UBSI KALIABANG" <?= ($admin['kampus'] == 'UBSI KALIABANG') ? 'selected' : '' ?>>UBSI KALIABANG</option>
                                                            <option value="UBSI CUT MUTIAH" <?= ($admin['kampus'] == 'UBSI CUT MUTIAH') ? 'selected' : '' ?>>UBSI CUT MUTIAH</option>
                                                            <option value="UBSI MARGONDA" <?= ($admin['kampus'] == 'UBSI MARGONDA') ? 'selected' : '' ?>>UBSI MARGONDA</option>
                                                            <option value="UBSI CENGKARENG" <?= ($admin['kampus'] == 'UBSI CENGKARENG') ? 'selected' : '' ?>>UBSI CENGKARENG</option>
                                                            <option value="UBSI TANGERANG" <?= ($admin['kampus'] == 'UBSI TANGERANG') ? 'selected' : '' ?>>UBSI TANGERANG</option>
                                                            <option value="UBSI CILEDUG" <?= ($admin['kampus'] == 'UBSI CILEDUG') ? 'selected' : '' ?>>UBSI CILEDUG</option>
                                                            <option value="UBSI FATMAWATI" <?= ($admin['kampus'] == 'UBSI FATMAWATI') ? 'selected' : '' ?>>UBSI FATMAWATI</option>
                                                            <option value="UBSI CIPUTAT" <?= ($admin['kampus'] == 'UBSI CIPUTAT') ? 'selected' : '' ?>>UBSI CIPUTAT</option>
                                                            <option value="UBSI KARAWANG" <?= ($admin['kampus'] == 'UBSI KARAWANG') ? 'selected' : '' ?>>UBSI KARAWANG</option>
                                                            <option value="UBSI CIKARANG" <?= ($admin['kampus'] == 'UBSI CIKARANG') ? 'selected' : '' ?>>UBSI CIKARANG</option>
                                                            <option value="UBSI CIBITUNG" <?= ($admin['kampus'] == 'UBSI CIBITUNG') ? 'selected' : '' ?>>UBSI CIBITUNG</option>
                                                            <option value="UBSI CILEBUT" <?= ($admin['kampus'] == 'UBSI CILEBUT') ? 'selected' : '' ?>>UBSI CILEBUT</option>
                                                            <option value="UBSI CIKAMPEK" <?= ($admin['kampus'] == 'UBSI CIKAMPEK') ? 'selected' : '' ?>>UBSI CIKAMPEK</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="sertifikat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sertifikat (Opsional)</label>
                                                        <input type="file" name="sertifikat[]" id="sertifikat" multiple
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        <?php if (isset(session('errors')['sertifikat'])): ?>
                                                            <span class="text-red-500 text-sm"><?= session('errors')['sertifikat'] ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <button type="submit" onclick="confirmUpdate(<?php echo $admin['id']; ?>)"
                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Update Data
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Edit Moadal -->

                                <!-- Delete Modal -->
                                <button
                                    class="mb-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    type="button" onclick="confirmDelete(<?php echo $admin['id']; ?>)">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>

                                <div id="popup-modal" tabindex="-1"
                                    class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <div class="p-6 text-center">
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apa anda Yakin ingin menghapus data?</h3>
                                                <form id="deleteForm" action="<?php echo base_url('delete_admin'); ?>"
                                                    method="post"
                                                    onsubmit="return handleDelete(<?php echo $admin['id']; ?>)">
                                                    <input type="hidden" name="id" id="deleteId" value="">
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Hapus
                                                    </button>
                                                    <button data-modal-hide="popup-modal" type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        Batal
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Delete Modal -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- End Table Section -->

        <!-- Pagination Links -->
        <div class="pagination-container mt-4 text-left">
            <?= $pager->links('admin', 'pagination') ?>
        </div>
        <!-- End Pagination Links -->
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

<!-- Sweetalert JS-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Delete JS -->
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apa Anda Yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                handleDelete(id);
            }
        });
    }

    function handleDelete(id) {
        fetch('<?php echo base_url("delete_admin"); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'id': id
            })
        }).then(response => {
            if (response.ok) {
                Swal.fire(
                    'Deleted!',
                    'Data admin berhasil dihapus',
                    'success'
                ).then(() => {
                    location.reload();
                });
            } else {
                Swal.fire(
                    'Error!',
                    'Gagal menghapus data.',
                    'error'
                );
            }
        });
    }
</script>
<!-- End Delete JS -->


<!-- Update JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '<?= session()->getFlashdata('success') ?>',
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
    });
</script>
<!-- End Update JS -->
</body>

</html>