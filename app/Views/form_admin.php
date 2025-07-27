<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Form Admin</title>
</head>

<style>
    .translate-x-1/2 {
        transform: translateX(50%);
    }

    .toggle {
        margin-left: 440px;
    }
</style>

<?php include ('Template/sidebar.php'); ?>

<!-- Header Section -->
<div class="p-4 sm:ml-64">
    <div class="p-1 rounded-lg bg-white dark:bg-gray-800">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-regular">Form Admin</h2>
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

        <!-- Form Section -->
        <div class="bg-white p-8 rounded shadow-md w-full">
            <form action="<?= base_url('form_submit_admin') ?>" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="username"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                        <input type="text" name="username" id="username"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?= isset($errors['username']) ? 'border-red-500' : '' ?>"
                            value="<?= old('username') ?>">
                        <?php if (isset(session('errors')['username'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['username'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="relative">
                        <label for="password"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md pr-10 <?= isset($errors['password']) ? 'border-red-500' : '' ?>"
                                    value="<?= old('password') ?>" aria-describedby="password-error">
                                <!-- Button to toggle password visibility -->
                                <button type="button" onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-400">
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7 .274.76.624 1.466-1.042 2.105M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.042 2.105A10.042 10.042 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .274-.76.624-1.466 1.042-2.105">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        <?php if (isset(session('errors')['password'])): ?>
                            <span id="password-error"
                                class="text-red-500 text-sm"><?= session('errors')['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="nama"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?= isset($errors['nama']) ? 'border-red-500' : '' ?>"
                            value="<?= old('nama') ?>">
                        <?php if (isset(session('errors')['nama'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['nama'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="text" name="email" id="email"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?= isset($errors['email']) ? 'border-red-500' : '' ?>"
                            value="<?= old('email') ?>">
                        <?php if (isset(session('errors')['email'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="role" 
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role</label>
                        <select name="role" id="role" 
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md <?= isset($errors['role']) ? 'border-red-500' : '' ?>">
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="Admin" <?= old('role') == 'Admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="Mahasiswa" <?= old('role') == 'Mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                        </select>
                        <?php if (isset(session('errors')['role'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['role'] ?></span>
                        <?php endif; ?>
                    </div>
                        <div>
                            <label for="nim"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIM</label>
                            <input type="number" name="nim" id="nim"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('nim') ?>">
                            <?php if (isset(session('errors')['nim'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['nim'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="telp"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                            <input type="number" name="telp" id="telp"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('telp') ?>">
                            <?php if (isset(session('errors')['telp'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['telp'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="prodi"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Program Studi</label>
                            <select name="prodi" id="prodi"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="" disabled selected>Pilih program studi</option>

                                <!-- Fakultas Teknik & Informatika -->
                                <option value="Sistem Informasi (S1) - Teknik & Informatika" <?= (old('prodi') == 'Sistem Informasi (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Sistem Informasi (S1) -
                                    Teknik & Informatika</option>
                                <option value="Teknologi Informasi (S1) - Teknik & Informatika"
                                    <?= (old('prodi') == 'Teknologi Informasi (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Teknologi Informasi (S1) - Teknik & Informatika</option>
                                <option value="Software Engineering (S1) - Teknik & Informatika"
                                    <?= (old('prodi') == 'Software Engineering (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Software Engineering (S1) - Teknik & Informatika</option>
                                <option value="Informatika (S1) - Teknik & Informatika" <?= (old('prodi') == 'Informatika (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Informatika (S1) - Teknik &
                                    Informatika</option>
                                <option value="Teknik Industri (S1) - Teknik & Informatika" <?= (old('prodi') == 'Teknik Industri (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Teknik Industri (S1) -
                                    Teknik & Informatika</option>
                                <option value="Teknik Elektro (S1) - Teknik & Informatika" <?= (old('prodi') == 'Teknik Elektro (S1) - Teknik & Informatika') ? 'selected' : '' ?>>Teknik Elektro (S1) -
                                    Teknik & Informatika</option>
                                <option value="Sistem Informasi (D3) - Teknik & Informatika" <?= (old('prodi') == 'Sistem Informasi (D3) - Teknik & Informatika') ? 'selected' : '' ?>>Sistem Informasi (D3) -
                                    Teknik & Informatika</option>
                                <option value="Sistem Informasi Akuntansi (D3) - Teknik & Informatika"
                                    <?= (old('prodi') == 'Sistem Informasi Akuntansi (D3) - Teknik & Informatika') ? 'selected' : '' ?>>Sistem Informasi Akuntansi (D3) - Teknik & Informatika</option>
                                <option value="Teknologi Komputer (D3) - Teknik & Informatika"
                                    <?= (old('prodi') == 'Teknologi Komputer (D3) - Teknik & Informatika') ? 'selected' : '' ?>>Teknologi Komputer (D3) - Teknik & Informatika</option>

                                <!-- Fakultas Komunikasi & Bahasa -->
                                <option value="Ilmu Komunikasi (S1) - Komunikasi & Bahasa" <?= (old('prodi') == 'Ilmu Komunikasi (S1) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Ilmu Komunikasi (S1) -
                                    Komunikasi & Bahasa</option>
                                <option value="Sastra Inggris (S1) - Komunikasi & Bahasa" <?= (old('prodi') == 'Sastra Inggris (S1) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Sastra Inggris (S1) -
                                    Komunikasi & Bahasa</option>
                                <option value="Public Relations (D3) - Komunikasi & Bahasa" <?= (old('prodi') == 'Public Relations (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Public Relations (D3) -
                                    Komunikasi & Bahasa</option>
                                <option value="Broadcasting (D3) - Komunikasi & Bahasa" <?= (old('prodi') == 'Broadcasting (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Broadcasting (D3) - Komunikasi &
                                    Bahasa</option>
                                <option value="Advertising (D3) - Komunikasi & Bahasa" <?= (old('prodi') == 'Advertising (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Advertising (D3) - Komunikasi &
                                    Bahasa</option>
                                <option value="Bahasa Inggris (D3) - Komunikasi & Bahasa" <?= (old('prodi') == 'Bahasa Inggris (D3) - Komunikasi & Bahasa') ? 'selected' : '' ?>>Bahasa Inggris (D3) -
                                    Komunikasi & Bahasa</option>

                                <!-- Fakultas Ekonomi & Bisnis -->
                                <option value="Manajemen (S1) - Ekonomi & Bisnis" <?= (old('prodi') == 'Manajemen (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Manajemen (S1) - Ekonomi & Bisnis</option>
                                <option value="Akuntansi (S1) - Ekonomi & Bisnis" <?= (old('prodi') == 'Akuntansi (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Akuntansi (S1) - Ekonomi & Bisnis</option>
                                <option value="Pariwisata (S1) - Ekonomi & Bisnis" <?= (old('prodi') == 'Pariwisata (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Pariwisata (S1) - Ekonomi & Bisnis</option>
                                <option value="Hukum Bisnis (S1) - Ekonomi & Bisnis" <?= (old('prodi') == 'Hukum Bisnis (S1) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Hukum Bisnis (S1) - Ekonomi & Bisnis
                                </option>
                                <option value="Administrasi Perkantoran (D3) - Ekonomi & Bisnis"
                                    <?= (old('prodi') == 'Administrasi Perkantoran (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Administrasi Perkantoran (D3) - Ekonomi & Bisnis</option>
                                <option value="Akuntansi (D3) - Ekonomi & Bisnis" <?= (old('prodi') == 'Akuntansi (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Akuntansi (D3) - Ekonomi & Bisnis</option>
                                <option value="Administrasi Bisnis (D3) - Ekonomi & Bisnis"
                                    <?= (old('prodi') == 'Administrasi Bisnis (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Administrasi Bisnis (D3) - Ekonomi & Bisnis</option>
                                <option value="Manajemen Pajak (D3) - Ekonomi & Bisnis" <?= (old('prodi') == 'Manajemen Pajak (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Manajemen Pajak (D3) - Ekonomi
                                    & Bisnis</option>
                                <option value="Perhotelan (D3) - Ekonomi & Bisnis" <?= (old('prodi') == 'Perhotelan (D3) - Ekonomi & Bisnis') ? 'selected' : '' ?>>Perhotelan (D3) - Ekonomi & Bisnis</option>


                            </select>
                            <?php if (isset(session('errors')['prodi'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['prodi'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="kampus"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kampus</label>
                            <select name="kampus" id="kampus"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="" disabled selected>Pilih kampus</option>
                                <option value="UBSI KRAMAT 98" <?= (old('kampus') == 'UBSI KRAMAT 98') ? 'selected' : '' ?>>UBSI KRAMAT 98</option>
                                <option value="UBSI DEWI SARTIKA A" <?= (old('kampus') == 'UBSI DEWI SARTIKA A') ? 'selected' : '' ?>>UBSI DEWI SARTIKA A</option>
                                <option value="UBSI DEWI SARTIKA B" <?= (old('kampus') == 'UBSI DEWI SARTIKA B') ? 'selected' : '' ?>>UBSI DEWI SARTIKA B</option>
                                <option value="UBSI SALEMBA 22" <?= (old('kampus') == 'UBSI SALEMBA 22') ? 'selected' : '' ?>>UBSI SALEMBA 22</option>
                                <option value="UBSI SLIPI" <?= (old('kampus') == 'UBSI SLIPI') ? 'selected' : '' ?>>UBSI
                                    SLIPI</option>
                                <option value="UBSI PEMUDA" <?= (old('kampus') == 'UBSI PEMUDA') ? 'selected' : '' ?>>UBSI
                                    PEMUDA</option>
                                <option value="UBSI JATIWARINGIN" <?= (old('kampus') == 'UBSI JATIWARINGIN') ? 'selected' : '' ?>>UBSI JATIWARINGIN</option>
                                <option value="UBSI KALIMALANG" <?= (old('kampus') == 'UBSI KALIMALANG') ? 'selected' : '' ?>>UBSI KALIMALANG</option>
                                <option value="UBSI KALIABANG" <?= (old('kampus') == 'UBSI KALIABANG') ? 'selected' : '' ?>>UBSI KALIABANG</option>
                                <option value="UBSI CUT MUTIAH" <?= (old('kampus') == 'UBSI CUT MUTIAH') ? 'selected' : '' ?>>UBSI CUT MUTIAH</option>
                                <option value="UBSI MARGONDA" <?= (old('kampus') == 'UBSI MARGONDA') ? 'selected' : '' ?>>
                                    UBSI MARGONDA</option>
                                <option value="UBSI CENGKARENG" <?= (old('kampus') == 'UBSI CENGKARENG') ? 'selected' : '' ?>>UBSI CENGKARENG</option>
                                <option value="UBSI TANGERANG" <?= (old('kampus') == 'UBSI TANGERANG') ? 'selected' : '' ?>>UBSI TANGERANG</option>
                                <option value="UBSI CILEDUG" <?= (old('kampus') == 'UBSI CILEDUG') ? 'selected' : '' ?>>
                                    UBSI CILEDUG</option>
                                <option value="UBSI FATMAWATI" <?= (old('kampus') == 'UBSI FATMAWATI') ? 'selected' : '' ?>>UBSI FATMAWATI</option>
                                <option value="UBSI CIPUTAT" <?= (old('kampus') == 'UBSI CIPUTAT') ? 'selected' : '' ?>>
                                    UBSI CIPUTAT</option>
                                <option value="UBSI KARAWANG" <?= (old('kampus') == 'UBSI KARAWANG') ? 'selected' : '' ?>>
                                    UBSI KARAWANG</option>
                                <option value="UBSI CIKARANG" <?= (old('kampus') == 'UBSI CIKARANG') ? 'selected' : '' ?>>
                                    UBSI CIKARANG</option>
                                <option value="UBSI CIBITUNG" <?= (old('kampus') == 'UBSI CIBITUNG') ? 'selected' : '' ?>>
                                    UBSI CIBITUNG</option>
                                <option value="UBSI CILEBUT" <?= (old('kampus') == 'UBSI CILEBUT') ? 'selected' : '' ?>>
                                    UBSI CILEBUT</option>
                                <option value="UBSI CIKAMPEK" <?= (old('kampus') == 'UBSI CIKAMPEK') ? 'selected' : '' ?>>
                                    UBSI CIKAMPEK</option>
                            </select>
                            <?php if (isset(session('errors')['kampus'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['kampus'] ?></span>
                            <?php endif; ?>
                        </div>
                    <div>
                        <label for="sertifikat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sertifikat</label>
                        <input type="file" name="sertifikat[]" id="sertifikat" 
                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                            multiple>
                        <?php if (isset(session('errors')['sertifikat'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['sertifikat'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="md:col-span-2 flex justify-start">
                        <button id="submitBtn" type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-regular text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah Data
                        </button>
                        <!-- Button Batal -->
                        <button id="cancelBtn" type="button"
                            class="ml-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-regular text-white bg-red-600 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Form Section -->

        <!-- Flowbite JS-->
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

        <!-- Sweetalert JS-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Alert Success JS -->
        <script>
            <?php if (session()->getFlashdata('success')): ?>
                Swal.fire({
                    title: 'Success!',
                    text: '<?= session()->getFlashdata('success') ?>',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>
        </script>
        <!-- End Alert Success JS-->

        <!-- Delete JS -->
        <script>
            // Fungsi untuk menghapus inputan
            function clearInputs() {
                // Ganti id-input dengan id inputan Anda
                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
                document.getElementById("nama").value = "";
                document.getElementById("email").value = "";
                document.getElementById("role").value = "";
                document.getElementById("nim").value = "";
                document.getElementById("telp").value = "";
                document.getElementById("prodi").value = "";
                document.getElementById("kampus").value = "";
                document.getElementById("sertifikat").value = "";
                // Lanjutkan dengan menghapus inputan 
            }

            // Event listener untuk tombol "Batal"
            document.getElementById("cancelBtn").addEventListener("click", function () {
                clearInputs();
            });
        </script>
        <!-- End Delete JS -->

        <!-- Toggle Password JS -->
        <script>
            function togglePassword() {
                var passwordField = document.getElementById('password');
                var eyeIcon = document.getElementById('eyeIcon');
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.274.76-.624 1.466-1.042 2.105M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.042 2.105A10.042 10.042 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .274-.76.624-1.466 1.042-2.105"></path>';
                } else {
                    passwordField.type = 'password';
                    eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.274.76-.624 1.466-1.042 2.105"></path>';
                }
            }
        </script>
        <!-- End Toggle Password JS -->

        </body>

</html>