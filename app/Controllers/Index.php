<?php

namespace App\Controllers;
use SendGrid\Mail\Mail;
use SendGrid;

use App\Models\PrestasiModel;
use App\Models\UsersModel;

class Index extends BaseController
    {
    protected $prestasiModel;
    protected $userModel;

    public function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
        $this->userModel = new UsersModel();
    }

    public function php()
    {
        return view('phpinfo');
    }

    public function index()
    {
        return view('index');
    }

    public function prestasi()
    {
        $keyword = $this->request->getVar('keyword');
        $currentPage = $this->request->getVar('page_prestasi') ? (int) $this->request->getVar('page_prestasi') : 1;
        $perPage = 5;

        if ($keyword) {
            $prestasi = $this->prestasiModel
                ->like('nama', $keyword)
                ->orLike('nim', $keyword)
                ->orLike('prodi', $keyword)
                ->orLike('kampus', $keyword)
                ->orLike('prestasi', $keyword)
                ->orLike('kegiatan', $keyword)
                ->orLike('tahun', $keyword)
                ->orLike('kategori', $keyword)
                ->orLike('tingkat', $keyword)
                ->paginate($perPage, 'prestasi', $currentPage);
        } else {
            $prestasi = $this->prestasiModel->paginate($perPage, 'prestasi', $currentPage);
        }

        return view('prestasi', [
            'prestasi' => $prestasi,
            'pager' => $this->prestasiModel->pager,
            'keyword' => $keyword,
            'currentPage' => $currentPage,
            'perPage' => $perPage
        ]);
    }

    public function login()
    {
        helper(['form']);
        return view('login', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function login_action()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'user' => 'required',
            'password' => 'required'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $session = session();
        $username = $this->request->getVar('user');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            return ($user['role'] === 'Admin')
                ? redirect()->to('/dashboard_admin')
                : redirect()->to('/dashboard_mahasiswa');
        }

        return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/index');
    }

    public function dashboard_admin()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            return redirect()->to('/login');
        }

        $usersModel = new UsersModel();
        $prestasiModel = new PrestasiModel();

        // Ambil data user berdasarkan user_id
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            return redirect()->to('/login');
        }

        // Ambil jumlah pengguna dan jumlah prestasi yang dikelola
        $userCount = $usersModel->countAllResults();
        $prestasiCount = $prestasiModel->countAllResults();

        // Kirim data ke view
        echo view('dashboard_admin', [
            'user' => $user,
            'userCount' => $userCount,
            'prestasiCount' => $prestasiCount
        ]);
    }

    public function dashboard_mahasiswa()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            return redirect()->to('/login');
        }

        $usersModel = new UsersModel();
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            return redirect()->to('/login');
        }

        // Menghitung jumlah prestasi
        $prestasiModel = new PrestasiModel();
        $prestasiCount = $prestasiModel->where('nama', $user['nama'])->countAllResults();

        // Menghitung jumlah sertifikat
        $sertifikatList = explode(',', $user['sertifikat']);
        $sertifikatCount = count(array_filter($sertifikatList));

        // Mengirim data ke views
        echo view('dashboard_mahasiswa', [
            'user' => $user,
            'prestasiCount' => $prestasiCount,
            'sertifikatCount' => $sertifikatCount,
        ]);
    }

    public function form()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            return redirect()->to('/login');
        }

        $usersModel = new UsersModel();
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            return redirect()->to('/login');
        }

        echo view('form', ['user' => $user]);
    }
    public function submit()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama harus memiliki minimal 3 karakter.'
                ]
            ],
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required|numeric|is_unique[prestasi.nim]|max_length[8]',
                'errors' => [
                    'required' => 'NIM harus diisi.',
                    'is_unique' => 'NIM tidak boleh sama',
                    'numeric' => 'NIM harus berupa angka.',
                    'max_length' => 'Maksimal 8 digit'
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prodi harus diisi.'
                ]
            ],
            'kampus' => [
                'label' => 'Kampus',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kampus harus diisi.'
                ]
            ],
            'prestasi' => [
                'label' => 'Prestasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prestasi harus diisi.'
                ]
            ],
            'kegiatan' => [
                'label' => 'Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kegiatan harus diisi.'
                ]
            ],
            'tahun' => [
                'label' => 'Tahun',
                'rules' => 'required|numeric|max_length[4]',
                'errors' => [
                    'required' => 'Tahun harus diisi.',
                    'numeric' => 'Tahun harus berupa angka.',
                    'max_length' => 'Maksimal 4 digit'
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus dipilih.'
                ]
            ],
            'tingkat' => [
                'label' => 'Tingkat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tingkat harus dipilih.'
                ]
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.'
                ]
            ],
            'isi' => [
                'label' => 'Isi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Artikel harus diisi.'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'uploaded' => 'Gambar harus diunggah.',
                    'mime_in' => 'Gambar harus berupa file jpg, jpeg, png, atau gif.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getName();  // Dapatkan nama asli file
            $gambar->move('./assets/Img', $gambarName);  // Pindahkan file ke direktori tujuan
        } else {
            return redirect()->back()->withInput()->with('error', 'Gambar tidak valid atau terjadi kesalahan saat mengunggah.');
        }

        $prestasiModel = new PrestasiModel();

        // Hitung nomor urut berdasarkan jumlah data yang ada
        $nomor = $prestasiModel->countAll() + 1;

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'prodi' => $this->request->getPost('prodi'),
            'kampus' => $this->request->getPost('kampus'),
            'prestasi' => $this->request->getPost('prestasi'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'tahun' => $this->request->getPost('tahun'),
            'kategori' => $this->request->getPost('kategori'),
            'tingkat' => $this->request->getPost('tingkat'),
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $gambarName,
            'nomor' => $nomor,

        ];

        $prestasiModel->insert($data);

        return redirect()->to('/table')->with('success', 'Data prestasi berhasil disubmit.');
    }
    public function update()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $id = $this->request->getPost('id');
        $prestasiData = $this->prestasiModel->find($id);
        $existingNIM = $prestasiData['nim'];

        $currentNIM = $this->request->getPost('nim');

        if ($currentNIM == $existingNIM) {
            // Jika NIM saat ini sama dengan NIM yang ada dalam database,
            // aturan validasi hanya 'required' tanpa is_unique
            $rulesnim = 'required';
        } else {
            // Jika NIM saat ini berbeda dengan NIM yang ada dalam database,
            // aturan validasi 'required' dan 'is_unique'
            $rulesnim = 'required|is_unique[prestasi.nim]|max_length[8]';
        }
        $existingTahun = $prestasiData['tahun'];

        $currentTahun = $this->request->getPost('tahun');

        if ($currentTahun == $existingTahun) {
            // Jika NIM saat ini sama dengan NIM yang ada dalam database,
            // aturan validasi hanya 'required' tanpa is_unique
            $rulestahun = 'required';
        } else {
            // Jika NIM saat ini berbeda dengan NIM yang ada dalam database,
            // aturan validasi 'required' dan 'is_unique'
            $rulestahun = 'required|numeric|max_length[4]';
        }

        $validation->setRules([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama harus memiliki minimal 3 karakter.'
                ]
            ],
            'nim' => [
                'label' => 'NIM',
                'rules' => $rulesnim,
                'errors' => [
                    'required' => 'NIM harus diisi.',
                    'is_unique' => 'NIM sudah digunakan.',
                    'numeric' => 'NIM harus berupa angka.'
                ]
            ],
            'prestasi' => [
                'label' => 'Prestasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prestasi harus diisi.'
                ]
            ],
            'kegiatan' => [
                'label' => 'Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kegiatan harus diisi.'
                ]
            ],
            'tahun' => [
                'label' => 'Tahun',
                'rules' => $rulestahun,
                'errors' => [
                    'required' => 'Tahun harus diisi.',
                    'numeric' => 'Tahun harus berupa angka.',
                    'max_length' => 'Maksimal 4 digit'
                ]
            ],
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.'
                ]
            ],
            'isi' => [
                'label' => 'Isi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.'
                ]
            ],
            'gambar' => [
                'label' => 'Gambar',
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'mime_in' => 'Gambar harus berupa file jpg, jpeg, png, atau gif.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id = $this->request->getPost('id');

        // Periksa apakah ID telah disediakan
        if (!$id) {
            // Redirect ke halaman yang sesuai jika ID tidak ada
            return redirect()->to('/table')->with('error', 'ID prestasi tidak valid.');
        }

        $gambar = $this->request->getFile('gambar');

        // Cek apakah gambar baru diunggah
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getName();
            $gambar->move('./assets/Img', $gambarName);
            $data['gambar'] = $gambarName;  // Set gambar baru di data
        } else {
            $data['gambar'] = $this->request->getPost('old_gambar');  // Gunakan gambar lama
        }
        // Lakukan validasi input data jika diperlukan
        // Proses update data menggunakan model
        $data = [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'prodi' => $this->request->getPost('prodi'),
            'kampus' => $this->request->getPost('kampus'),
            'prestasi' => $this->request->getPost('prestasi'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'tahun' => $this->request->getPost('tahun'),
            'kategori' => $this->request->getPost('kategori'),
            'tingkat' => $this->request->getPost('tingkat'),
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $data['gambar'],
        ];

        // Lakukan pengecekan apakah data dengan ID yang sesuai ada dalam database
        $prestasi = $this->prestasiModel->find($id);

        if (!$prestasi) {
            // Redirect ke halaman yang sesuai jika data tidak ditemukan
            return redirect()->to('/table')->with('error', 'Data prestasi tidak ditemukan.');
        }

        // Lakukan proses pembaruan data menggunakan model
        $this->prestasiModel->update($id, $data);

        // Tampilkan SweetAlert success
        return redirect()->to('/table')->with('success', 'Data prestasi berhasil diubah.');
    }
    
    public function delete()
    {
        $id = $this->request->getPost('id'); // Mengambil ID dari POST request
        if ($this->prestasiModel->deletePrestasi($id)) {
            // Redirect atau load view dengan pesan sukses
            return redirect()->to('/table')->with('success', 'Data prestasi berhasil dihapus.');
        } else {
            // Tangani kesalahan
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }

    public function table()
    {
        // Inisialisasi sesi
        $session = session();

        // Ambil user_id dari sesi
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            // Jika tidak ada, redirect ke halaman login
            return redirect()->to('/login');
        }

        // Inisialisasi model UsersModel
        $usersModel = new UsersModel();

        // Ambil data user dari database
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            // Jika tidak ditemukan, redirect ke halaman login
            return redirect()->to('/login');
        }
        $prestasiModel = new PrestasiModel();

        // Ambil keyword dari input pencarian
        $keyword = $this->request->getVar('keyword');

        // Ambil halaman saat ini dari URL
        $currentPage = $this->request->getVar('page_prestasi') ? (int) $this->request->getVar('page_prestasi') : 1;

        // Jumlah item per halaman
        $perPage = 5;

        if ($keyword) {
            // Jika ada keyword pencarian, lakukan pencarian
            $prestasi = $prestasiModel->like('nama', $keyword)
                ->orLike('nim', $keyword)
                ->orLike('prestasi', $keyword)
                ->orLike('kegiatan', $keyword)
                ->orLike('tahun', $keyword)
                ->orLike('kategori', $keyword)
                ->orLike('tingkat', $keyword)
                ->paginate($perPage, 'prestasi', $currentPage);
        } else {
            // Jika tidak ada keyword, ambil semua data dengan pagination
            $prestasi = $prestasiModel->paginate($perPage, 'prestasi', $currentPage);
        }


        // Dapatkan objek pager
        $pager = $prestasiModel->pager;

        // Inisialisasi model PrestasiModel
        $prestasiModel = new PrestasiModel();

        // Tampilkan view 'table' dengan data user dan prestasi
        return view('table', [
            'user' => $user,
            'prestasi' => $prestasi,
            'pager' => $pager,
            'keyword' => $keyword,
            'currentPage' => $currentPage,
            'perPage' => $perPage
        ]);
    }
    public function update_dashboard()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama harus memiliki minimal 3 karakter.'
                ]
            ],
            'email' => [
                'label' => 'email',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi.'
                ]
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');

        // Validasi data jika diperlukan

        // Panggil model untuk memperbarui data
        $this->userModel->update($id, ['nama' => $nama, 'email' => $email, 'role' => $role]);

        // Tampilkan SweetAlert success
        return redirect()->to('/dashboard_admin')->with('success', 'Data admin berhasil diperbarui.');
    }

    public function update_mahasiswa()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $id = $this->request->getPost('id');
        $userData = $this->userModel->find($id);
        $existingEmail = $userData['email'];

        $currentEmail = $this->request->getPost('email');

        if ($currentEmail == $existingEmail) {
            // Jika NIM saat ini sama dengan NIM yang ada dalam database,
            // aturan validasi hanya 'required' tanpa is_unique
            $rulesemail = 'required';
        } else {
            // Jika NIM saat ini berbeda dengan NIM yang ada dalam database,
            // aturan validasi 'required' dan 'is_unique'
            $rulesemail = 'required|is_unique[users.email]';
        }

        $validation->setRules([
            'telp' => [
                'label' => 'telp',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon harus diisi.',
                ]
            ],
            'email' => [
                'label' => 'email',
                'rules' => $rulesemail,
                'errors' => [
                    'required' => 'Email harus diisi.'
                ]
            ]
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data dari form
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $telp = $this->request->getPost('telp');
        $role = $this->request->getPost('role');

        // Validasi data jika diperlukan

        // Panggil model untuk memperbarui data
        $this->userModel->update($id, ['nama' => $nama, 'email' => $email, 'role' => $role, 'telp' => $telp]);

        // Tampilkan SweetAlert success
        return redirect()->to('/cek_prestasi')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function blog($id)
    {
        $prestasiModel = new PrestasiModel();

        $data['prestasi'] = $prestasiModel->find($id);
        return view('blog', $data);
    }

    public function form_admin()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            return redirect()->to('/login');
        }

        $usersModel = new UsersModel();
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            return redirect()->to('/login');
        }

        echo view('form_admin', ['user' => $user]);
    }
    
    public function form_submit_admin()
    {
        $userModel = new UsersModel();
        $nomor = $userModel->countAll() + 1;
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $telp = $this->request->getPost('telp');
        $role = $this->request->getPost('role');
        $nim = $this->request->getPost('nim');
        $prodi = $this->request->getPost('prodi');
        $kampus = $this->request->getPost('kampus');

        // Validasi data required
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama harus memiliki minimal 3 karakter.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi.'
                ]
            ],
            'role' => [
                'label' => 'role',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ],
            'nim' => [
                'label' => 'nim',
                'rules' => 'min_length[8]|is_unique[users.nim]',
                'errors' => [
                    'required' => 'NIM maksimal 8 angka.'
                ]
            ],
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Hash password menggunakan password_hash()
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Load model untuk mengakses database
        $userModel = new UsersModel();

        $sertifikat = $this->request->getFileMultiple('sertifikat');
        $fileNames = [];

        foreach ($sertifikat as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Menyimpan file ke folder assets/Sertifikat dengan nama asli
                $fileName = $file->getName();
                $file->move(ROOTPATH . 'public/assets/Sertifikat', $fileName); // Menyimpan file

                // Menambahkan nama file ke array
                $fileNames[] = $fileName;
            }
        }

        // Gabungkan nama file sertifikat (jika ada lebih dari satu file, digabungkan dengan koma)
        $sertifikatFile = implode(',', $fileNames);

        // Simpan data ke database
        $data = [
            'username' => $username,
            'password' => $hashed_password,
            'nama' => $nama,
            'email' => $email,
            'role' => $role,
            'nomor' => $nomor,
            'nim' => $nim,
            'telp' => $telp,
            'prodi' => $prodi,
            'kampus' => $kampus,
            'sertifikat' => $sertifikatFile // Menyimpan nama file sertifikat
        ];

        // Insert ke database
        $userModel->insert($data);

        // Tampilkan respons atau redirect ke halaman lain
        return redirect()->to(site_url('/table_admin'))->with('success', 'Data admin berhasil disubmit.');
    }

    public function table_admin()
    {
        $session = session();

        // Ambil user_id dari sesi
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            // Jika tidak ada, redirect ke halaman login
            return redirect()->to('/login');
        }

        // Inisialisasi model UsersModel
        $usersModel = new UsersModel();

        // Ambil data user dari database
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            // Jika tidak ditemukan, redirect ke halaman login
            return redirect()->to('/login');
        }

        // Ambil keyword dari input pencarian
        $keyword = $this->request->getVar('keyword');

        // Ambil halaman saat ini dari URL
        $currentPage = $this->request->getVar('page_admin') ? (int) $this->request->getVar('page_admin') : 1;

        // Jumlah item per halaman
        $perPage = 3;

        // Setup pencarian jika ada keyword
        if ($keyword) {
            $admins = $usersModel->like('username', $keyword)
                ->orLike('email', $keyword)
                ->orLike('nama', $keyword)
                ->orLike('role', $keyword)
                ->orlike('nim', $keyword)
                ->orlike('prodi', $keyword)
                ->orlike('kampus', $keyword)
                ->orlike('telp', $keyword)
                ->paginate($perPage, 'admin', $currentPage);
        } else {
            $admins = $usersModel->paginate($perPage, 'admin', $currentPage);
        }

        // Dapatkan objek pager
        $pager = $usersModel->pager;

        // Tampilkan view 'table_admin' dengan data user, admin, pager, dan keyword
        return view('table_admin', [
            'user' => $user,
            'admins' => $admins,
            'pager' => $pager,
            'keyword' => $keyword,
            'currentPage' => $currentPage,
            'perPage' => $perPage
        ]);
    }
    public function delete_admin()
    {
        $id = $this->request->getPost('id'); // Mengambil ID dari POST request
        if ($this->userModel->deleteAdmin($id)) {
            // Redirect atau load view dengan pesan sukses
            return redirect()->to('/table_admin')->with('success', 'Data admin berhasil dihapus.');
        } else {
            // Tangani kesalahan
            return redirect()->back()->with('error', 'Gagal menghapus data.');
        }
    }

    public function update_admin()
    {
        helper(['form', 'url']);

        $validation = \Config\Services::validation();

        $id = $this->request->getPost('id');
        $userData = $this->userModel->find($id);
        $existingEmail = $userData['email'];

        $currentEmail = $this->request->getPost('email');

        if ($currentEmail == $existingEmail) {
            // Jika NIM saat ini sama dengan NIM yang ada dalam database,
            // aturan validasi hanya 'required' tanpa is_unique
            $rulesemail = 'required';
        } else {
            // Jika NIM saat ini berbeda dengan NIM yang ada dalam database,
            // aturan validasi 'required' dan 'is_unique'
            $rulesemail = 'required|is_unique[users.email]';
        }

        $existingUser = $userData['username'];

        $currentUser = $this->request->getPost('username');

        if ($currentUser == $existingUser) {
            // Jika NIM saat ini sama dengan NIM yang ada dalam database,
            // aturan validasi hanya 'required' tanpa is_unique
            $rulesusername = 'required';
        } else {
            // Jika NIM saat ini berbeda dengan NIM yang ada dalam database,
            // aturan validasi 'required' dan 'is_unique'
            $rulesusername = 'required|is_unique[users.username]';
        }

        $existingNim = $userData['nim']; // NIM yang ada di database
        $currentNim = $this->request->getPost('nim'); // NIM yang sedang dimasukkan oleh pengguna

        if ($currentNim == $existingNim) {
            // Jika NIM saat ini sama dengan yang ada di database, aturan hanya 'min_length[8]'
            $rulesnim = 'min_length[8]';
        } else {
            // Jika NIM berbeda, aturan 'required' dan 'is_unique', kecuali jika NIM sama dengan yang ada di database
            $rulesnim = 'min_length[8]|is_unique[users.nim]';
        }

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => $rulesusername,
                'errors' => [
                    'required' => 'Username harus diisi.',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => $rulesemail,
                'errors' => [
                    'required' => 'Email harus diisi.'
                ]
            ],
            'role' => [
                'label' => 'role',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role harus diisi.'
                ]
            ],
            'nim' => [
                'label' => 'nim',
                'rules' => $rulesnim,
                'errors' => [
                    'required' => 'NIM minimal 8 angka.'
                ]
            ],
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $usersModel = new UsersModel();

        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'nim' => $this->request->getPost('nim'),
            'telp' => $this->request->getPost('telp'),
            'prodi' => $this->request->getPost('prodi'),
            'kampus' => $this->request->getPost('kampus'),
        ];

        $password = $this->request->getPost('password');
        if (empty($password) || $password === $userData['password']) {
            // Jika password kosong atau sama dengan password lama, gunakan password lama
            $data['password'] = $userData['password'];
        } else {
            // Jika password berbeda, hash password baru
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $admin = $usersModel->find($id);
        $existingCertificates = !empty($admin['sertifikat']) ? explode(',', $admin['sertifikat']) : [];
        
        // Tangani file sertifikat yang diunggah
        $sertifikat = $this->request->getFileMultiple('sertifikat');
        $fileNames = $existingCertificates; // Mulai dengan data sertifikat lama
        
        if ($sertifikat) {
            foreach ($sertifikat as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getClientName(); // Gunakan nama file asli
                    $targetPath = FCPATH . 'assets/Sertifikat/' . $fileName;
        
                    // Cek jika file dengan nama yang sama sudah ada, tambahkan suffix jika perlu
                    $count = 1;
                    $originalName = pathinfo($fileName, PATHINFO_FILENAME);
                    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        
                    while (file_exists($targetPath)) {
                        $fileName = $originalName . '_' . $count . '.' . $extension;
                        $targetPath = FCPATH . 'assets/Sertifikat/' . $fileName;
                        $count++;
                    }
        
                    $file->move(FCPATH . 'assets/Sertifikat', $fileName);
                    $fileNames[] = $fileName; // Tambahkan nama file baru
                }
            }
        }
        
        // Gabungkan sertifikat lama dan baru
        $data['sertifikat'] = implode(',', $fileNames);
        
        if ($usersModel->update($id, $data)) {
            return redirect()->to('/table_admin')->with('success', 'Data admin berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data admin.');
        }
    }

    public function cek_prestasi()
    {
        $session = session();
        $userId = $session->get('user_id');
    
        // Pastikan user_id ada di sesi
        if (!$userId) {
            return redirect()->to('/login');
        }
    
        $usersModel = new UsersModel();
        $user = $usersModel->find($userId);
    
        // Pastikan user ditemukan di database
        if (!$user) {
            return redirect()->to('/login');
        }
    
        // Ambil keyword pencarian dari parameter GET
        $keyword = $this->request->getGet('keyword');
        $prestasiModel = new PrestasiModel();
    
        // Query dengan kondisi pencarian hanya untuk mahasiswa ini
        $prestasiQuery = $prestasiModel->where('nama', $user['nama']);
        if ($keyword) {
            $prestasiQuery->groupStart()
                          ->like('prestasi', $keyword)
                          ->orLike('kegiatan', $keyword)
                          ->orLike('tahun', $keyword)
                          ->orLike('kategori', $keyword)
                          ->orLike('tingkat', $keyword)
                          ->groupEnd();
        }
    
        // Pagination
        $dataPerPage = 10;
        $prestasi = $prestasiQuery->paginate($dataPerPage, 'prestasi');
        $pager = $prestasiModel->pager;
    
        // Hitung jumlah prestasi berdasarkan nama
        $prestasiCount = $prestasiModel->where('nama', $user['nama'])->countAllResults();
    
        // Ambil daftar sertifikat dari direktori
        $sertifikatPath = WRITEPATH . './assets/Sertifikat'; // Sesuaikan dengan lokasi sertifikat Anda
        $sertifikatFiles = [];
    
        if (is_dir($sertifikatPath)) {
            $sertifikatFiles = array_diff(scandir($sertifikatPath), ['.', '..']);
        }

        // Menghitung jumlah sertifikat
        $sertifikatList = explode(',', $user['sertifikat']);
        $sertifikatCount = count(array_filter($sertifikatList));
    
        echo view('cek_prestasi', [
            'user' => $user,
            'sertifikatFiles' => $sertifikatFiles,
            'prestasiCount' => $prestasiCount,
            'sertifikatCount' => $sertifikatCount,
            'prestasi' => $prestasi,
            'pager' => $pager,
            'keyword' => $keyword
        ]);
    }

    public function report()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Pastikan user_id ada di sesi
        if (!$userId) {
            return redirect()->to('/login');
        }

        $usersModel = new UsersModel();
        $user = $usersModel->find($userId);

        // Pastikan user ditemukan di database
        if (!$user) {
            return redirect()->to('/login');
        }

        echo view('report', ['user' => $user]);
    }

    public function report_submit()
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $usersModel = new UsersModel();
        $user = $usersModel->find($userId);

        if (!$user) {
            return redirect()->to('/login');
        }

        $jenis = $this->request->getPost('jenis');
        $pesan = $this->request->getPost('pesan');

        // Setup SendGrid API
        $sendgrid = new \SendGrid('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');
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom($user['email'], $user['nama']);
        $email->setSubject($jenis);
        $email->addTo('rangga.virgii@gmail.com');  // Ganti dengan email admin
        $email->addContent("text", "
        Jenis: {$jenis}
        Dari: {$user['nama']} ({$user['email']})
        Pesan:
        {$pesan}
        ");

        try {
            $response = $sendgrid->send($email);

            // Memeriksa status code dan respons dari SendGrid
            if ($response->statusCode() == 202) {
                return redirect()->to('/report')->with('success', 'Pesan berhasil dikirim.');
            } else {
                // Ambil detail error lebih lanjut dari response body
                $responseBody = $response->body();
                return redirect()->to('/report')->with('error', 'Gagal mengirim pesan. Status Code: ' . $response->statusCode() . '. Response: ' . $responseBody);
            }
        } catch (\Exception $e) {
            // Menangkap dan menampilkan error exception secara lengkap
            return redirect()->to('/report')->with('error', 'Gagal mengirim pesan. Error: ' . $e->getMessage());
        }
    }
}
