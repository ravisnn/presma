<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free-6.5.1-web/css/all.css">
    <title>Presma UBSI</title>
</head>

<style>
    html {
        scroll-behavior: smooth;
    }

    section {
        background-color: #FAFAFA;
    }

    .table {
        margin-top: 100px;

    }

    .table h2 {
        margin-top: 5px;
    }

    .table-container {
    max-width: 1200px;
    margin: 0 auto; 
    padding: 1rem; 
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
    
    .pagination-container {
        margin-left: 35px;
    }

    .footer {
        margin-top: 100px;
    }

    .contact {
        margin-left: 40px;
    }

    form {
        margin-left: 35px;
    }

    /* Media query untuk tampilan mobile */
    @media screen and (max-width: 768px) {
        .contact {
            margin-top: 20px;
            margin-left: 0;
        }
    }

    /* Media query untuk tampilan mobile yang lebih kecil */
    @media screen and (max-width: 480px) {
        .contact {
            margin-top: 20px;
            margin-left: 0;
        }
    }
</style>

<body>

    <!-- Navbar Section -->
    <?php include ('Template/navbar.php'); ?>

    <!-- Table Section -->
    <div class="table"></div>
    <h2 class="text-3xl font-regular text-center text-gray-900 dark:text-white mb-5">Data Prestasi Mahasiswa</h2>

    <!-- Search Form -->
    <form method="get" action="<?= base_url('/prestasi') ?>" class="mb-6 mt-8 text-left">
        <div class="flex">
            <input type="text" name="keyword" value="<?= esc($keyword) ?>"
                class="border px-4 py-2 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-300 flex-grow"
                placeholder="Masukkan keyword...">
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
        </div>
    </form>
    <!-- End Search Form -->

    <div class="table-container relative overflow-x-auto max-w-screen-xl mx-auto px-4 py-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Program Studi</th>
                    <th scope="col" class="px-6 py-3">Kampus</th>
                    <th scope="col" class="px-6 py-3">Prestasi</th>
                    <th scope="col" class="px-6 py-3">Kegiatan</th>
                    <th scope="col" class="px-6 py-3">Tahun</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Tingkat</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = ($currentPage - 1) * $perPage + 1;
                foreach ($prestasi as $row): ?>
                    <tr class="table-row bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $i++ ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['nama'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['prodi'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['kampus'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['prestasi'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['kegiatan'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['tahun'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['kategori'] ?>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['tingkat'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="<?php echo base_url('/blog/' . $row['id']); ?>"><i
                                    class="fas fa-arrow-right fa-xl"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- End Table Section -->

    <!-- Pagination Links -->
    <div class="pagination-container mt-4 text-left">
        <?= $pager->links('prestasi', 'pagination') ?>
    </div>
    <!-- End Pagination Links -->

    <!-- Footer Section -->
    <?php include ('Template/footer.php'); ?>

    <!-- Contact JS -->
    <script>
        function smoothScroll(target) {
            var targetElement = document.querySelector(target);
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        }
    </script>
    <!-- End Contact JS -->

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>