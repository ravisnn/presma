<!-- Sidebar -->
<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <i class="fas fa-bars w-6 h-6" aria-hidden="true"></i>
</button>

<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-blue-700 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="<?php echo site_url('dashboard_mahasiswa') ?>"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-800 dark:hover:bg-gray-700 group">
                    <i
                        class="fas fa-tachometer-alt w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-lg group hover:bg-gray-800 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i
                        class="fas fa-user w-5 h-5 text-white transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Mahasiswa</span>
                    <i class="fas fa-chevron-down w-3 h-3"></i>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="<?php echo site_url('cek_prestasi') ?>"
                            class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-file-alt w-5 h-5 me-2"></i>Cek Prestasi
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('report') ?>"
                            class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-800 dark:text-white dark:hover:bg-gray-700">
                            <i class="fas fa-comment-alt w-5 h-5 me-2"></i>Kritik dan Saran
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('logout') ?>"
                    class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-800 dark:hover:bg-gray-700 group">
                    <i
                        class="fas fa-sign-out-alt w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"></i>
                    <span class="ms-3">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- End Sidebar -->
