<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-sm">
        <!-- Tombol First dan Previous -->
        <?php if ($pager->hasPreviousPage()): ?>
            <li>
                <a href="<?= $pager->getFirst() ?>"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    First
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPreviousPage() ?>"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Previous
                </a>
            </li>
        <?php endif ?>

        <!-- Tombol Halaman -->
        <?php foreach ($pager->links() as $link): ?>
            <li>
                <a href="<?= $link['uri'] ?>"
                    class="flex items-center justify-center px-3 h-8 leading-tight border text-sm 
                    <?= $link['active'] 
                        ? 'text-blue-600 bg-blue-50 border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:bg-blue-700 dark:text-white' 
                        : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <!-- Tombol Next dan Last -->
        <?php if ($pager->hasNextPage()): ?>
            <li>
                <a href="<?= $pager->getNextPage() ?>"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Last
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>
