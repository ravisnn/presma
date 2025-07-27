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
    section {
        background-color: #fff;
    }

    html {
        scroll-behavior: smooth;
    }

    .contact {
        margin-left: 40px;
    }

    .hero {
        margin-top: 60px;
    }

    image {
        margin: auto;
    }


    /* Media query untuk tampilan mobile */
    @media screen and (max-width: 768px) {
        .contact {
            margin-top: 20px;
            margin-left: 0;
        }

        .image {
            margin-left: 100px;
        }
    }

    /* Media query untuk tampilan mobile yang lebih kecil */
    @media screen and (max-width: 480px) {
        .contact {
            margin-top: 20px;
            margin-left: 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    }
</style>

<body>

    <!-- Navbar Section -->
    <?php include ('Template/navbar.php'); ?>

    <!-- Hero Section -->
    <section>
        <div class="hero mx-auto max-w-screen-3xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
                <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:order-last lg:h-full">
                    <img alt="" src="<?php echo base_url(); ?>assets/Img/Prestasi Mahasiswa.jpg"
                        class="absolute inset-0 h-full w-full object-cover" />
                </div>

                <div class="lg:py-24">
                    <h2 class="text-3xl font-regular sm:text-4xl">Presma UBSI</h2>

                    <p class="mt-4 text-gray-600">
                        Selamat datang di Presma UBSI, platform untuk mendokumentasikan dan merayakan berbagai prestasi
                        yang telah diraih oleh mahasiswa Universitas Bina Sarana Informatika.
                    </p>

                    <a href="<?php echo site_url('login') ?>">
                        <button type="button"
                            class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-m px-6 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Login
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section-->

    <!-- Visi and Mission Section-->
    <section class="bg-white dark:bg-gray-800 py-20 mb-8">
        <div class="max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 justify-center">
                <!-- Visi Section -->
                <div
                    class="bg-transparent dark:bg-gray-900 p-6 rounded-lg border border-2 border-solid border-black mr-3">
                    <h2 class="text-3xl font-regular text-gray-800 dark:text-white text-center mb-4">Visi</h2>
                    <p class="font-regular text-gray-800 dark:text-gray-300">Menjadi lembaga pendidikan
                        yang
                        mempersiapkan
                        mahasiswa
                        menjadi pemimpin masa depan yang berprestasi dan berkontribusi secara positif dalam masyarakat.
                    </p>
                </div>
                <!-- End Visi Section -->

                <!-- Misi Section -->
                <div class="bg-transparent dark:bg-gray-900 p-6 rounded-lg border border-2 border-solid border- ml-3">
                    <h2 class="text-3xl font-regular text-gray-800 dark:text-white text-center mb-4">Misi</h2>
                    <ul class="font-regular text-gray-800 list-disc pl-6">
                        <li class="dark:text-gray-300">Memberikan pendidikan berkualitas yang
                            mempersiapkan mahasiswa untuk menghadapi tantangan di dunia nyata.</li>
                        <li class="dark:text-gray-300">Mendorong inovasi dan penelitian yang menghasilkan
                            solusi yang berdampak bagi masyarakat.</li>
                        <li class="dark:text-gray-300">Menyediakan lingkungan belajar yang inklusif dan
                            mendukung.</li>
                        <li class="dark:text-gray-300">Membina sikap kepemimpinan, etika, dan tanggung
                            jawab sosial pada mahasiswa.</li>
                    </ul>
                </div>
                <!-- End Misi Section -->
            </div>
        </div>
    </section>
    <!-- End Visi and Mission Section -->

    <!-- Footer Section -->
    <?php include ('Template/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

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

</body>

</html>