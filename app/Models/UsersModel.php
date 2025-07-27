<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomor', 'username', 'password', 'nama', 'nim', 'prodi', 'kampus', 'telp', 'email', 'posisi', 'role', 'sertifikat', 'reset_token', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
    public function deleteAdmin($id)
    {
        return $this->delete($id); // Menggunakan fungsi delete bawaan CodeIgniter
    }

    public function editAdmin($id, $data)
    {
        // Jalankan query update
        $result = $this->db->table($this->table)
            ->where('id', $id)
            ->update($data);

        return $result;
    }

    public function resetPassword($id, $newPassword)
    {
        // Menyiapkan data untuk memperbarui password
        $data = [
            'password' => $newPassword,  // Menggunakan password yang sudah di-hash
            'updated_at' => date('Y-m-d H:i:s') // Opsional, memperbarui timestamp
        ];

        // Memperbarui password dengan mencocokkan user ID
        return $this->update($id, $data);
    }
}