<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Form Prestasi</title>
</head>

<body>

<?php include ('Template/sidebar.php'); ?>

<!-- Header Section -->
<div class="p-4 sm:ml-64">
    <div class="p-1 rounded-lg bg-white dark:bg-gray-800">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-regular">Form Prestasi</h2>
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
                <form action="<?= base_url('form_submit') ?>" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nama"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" name="nama" id="nama"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('nama') ?>">
                            <?php if (isset(session('errors')['nama'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['nama'] ?></span>
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
                            <label for="prestasi"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prestasi</label>
                            <input type="text" name="prestasi" id="prestasi"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('prestasi') ?>">
                            <?php if (isset(session('errors')['prestasi'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['prestasi'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="kegiatan"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kegiatan</label>
                            <input type="text" name="kegiatan" id="kegiatan"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('kegiatan') ?>">
                            <?php if (isset(session('errors')['kegiatan'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['kegiatan'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="tahun"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                            <input type="number" name="tahun" id="tahun"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('tahun') ?>">
                            <?php if (isset(session('errors')['tahun'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['tahun'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="kategori"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                            <select name="kategori" id="kategori"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="" disabled selected>Pilih kategori</option>
                                <option value="Olahraga" <?= (old('kategori') == 'Olahraga') ? 'selected' : '' ?>>Olahraga
                                </option>
                                <option value="Akademik" <?= (old('kategori') == 'Akademik') ? 'selected' : '' ?>>Akademik
                                </option>
                                <option value="Seni" <?= (old('kategori') == 'Seni') ? 'selected' : '' ?>>Seni</option>
                            </select>
                            <?php if (isset(session('errors')['kategori'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['kategori'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="tingkat"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tingkat</label>
                            <select name="tingkat" id="tingkat"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="" disabled selected>Pilih tingkat</option>
                                <option value="Lokal" <?= (old('tingkat') == 'Lokal') ? 'selected' : '' ?>>Lokal</option>
                                <option value="Nasional" <?= (old('tingkat') == 'Nasional') ? 'selected' : '' ?>>Nasional
                                </option>
                                <option value="Internasional" <?= (old('tingkat') == 'Internasional') ? 'selected' : '' ?>>
                                    Internasional</option>
                            </select>
                            <?php if (isset(session('errors')['tingkat'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['tingkat'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul
                                Artikel</label>
                            <input type="text" name="judul" id="judul"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="<?= old('judul') ?>">
                            <?php if (isset(session('errors')['judul'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['judul'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="isi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Isi
                                Artikel</label>
                            <textarea name="isi" id="isi"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"><?= old('isi') ?></textarea>
                            <?php if (isset(session('errors')['isi'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['isi'] ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <label for="gambar"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar</label>
                            <input type="file" name="gambar" id="gambar"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <?php if (isset(session('errors')['gambar'])): ?>
                                <span class="text-red-500 text-sm"><?= session('errors')['gambar'] ?></span>
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
                    document.getElementById("nama").value = "";
                    document.getElementById("nim").value = "";
                    document.getElementById("prodi").value = "";
                    document.getElementById("kampus").value = "";
                    document.getElementById("prestasi").value = "";
                    document.getElementById("kegiatan").value = "";
                    document.getElementById("tahun").value = "";
                    document.getElementById("kategori").value = "";
                    document.getElementById("tingkat").value = "";
                    document.getElementById("judul").value = "";
                    document.getElementById("isi").value = "";
                    // Lanjutkan dengan menghapus inputan 

                    // Clear the file input
                    var fileInput = document.getElementById("gambar");
                    var newFileInput = document.createElement("input");
                    newFileInput.type = "file";
                    newFileInput.name = fileInput.name;
                    newFileInput.id = fileInput.id;
                    newFileInput.className = fileInput.className;
                    fileInput.parentNode.replaceChild(newFileInput, fileInput);
                }

                // Event listener untuk tombol "Batal"
                document.getElementById("cancelBtn").addEventListener("click", function () {
                    clearInputs();
                });
            </script>
            <!-- End Delete JS -->
</body>

</html>