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

    .blog {
        margin-top: 100px;
    }

    .blog-h3,
    .blog-p,
    .icon {
        margin-left: 20px;
    }

    .blog-p {
        text-align: justify;
    }

    .contact {
        margin-left: 40px;
    }

    /* Media query untuk tampilan mobile */
    @media screen and (max-width: 768px) {
        .contact {
            margin-top: 20px;
            margin-left: 0;
        }

        .blog-h3,
        .blog-p,
        .icon {
            margin-left: 0px;
            margin-top: 20px;
        }

        .profile {
            margin-top: 20px;
        }

        .blog-p {
            text-align: justify;
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

    <!-- Blog Section -->
    <section class="blog max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-regular text-center text-gray-900 dark:text-white mb-10">Artikel</h2>
        <div class="grid md:grid-cols-2 gap-10">
            <div>
                <img src="<?= base_url('/assets/Img/' . $prestasi['gambar']) ?>" alt="Blog Image"
                    class="w-full h-auto rounded-lg shadow-md">
            </div>
            <div class="blog-span">
                <h3 class="blog-h3 text-2xl font-regular text-gray-900 dark:text-white mb-4"><?= $prestasi['judul'] ?>
                </h3>
                <div class="flex items-center mb-2">
                    <i class="icon fas fa-user-circle fa-xl text-gray-600 dark:text-gray-400 text-lg"></i>
                    <span class="profile ml-2 text-gray-900 dark:text-gray-800 text-xl"><?= $prestasi['nama'] ?></span>
                </div>
                <p class="blog-p text-gray-900 dark:text-gray-300 mb-6">
                    <?= $prestasi['isi'] ?>
                </p>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->

    <!-- Footer Section -->
    <?php include ('Template/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>