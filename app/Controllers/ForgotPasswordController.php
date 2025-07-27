<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;
use SendGrid\Mail\Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('forgot_password');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $usersModel = new UsersModel();
        $user = $usersModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $resetToken = bin2hex(random_bytes(16)); // Generate a random reset token
        $resetUrl = site_url("reset_password/{$resetToken}");

        // Store the reset token in the database (optional)
        $usersModel->update($user['id'], ['reset_token' => $resetToken]);

        // Send reset email using SendGrid
        $emailContent = new Mail();
        $emailContent->setFrom("rangga.virgii@gmail.com", "Presma UBSI");
        $emailContent->setSubject("Password Reset Request");
        $emailContent->addTo($email);
        $emailContent->addContent("text/html", "Click <a href='{$resetUrl}'>here</a> to reset your password.");

        $sendgrid = new \SendGrid("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"); // Replace with your actual SendGrid API key
        try {
            $response = $sendgrid->send($emailContent);
            if ($response->statusCode() == 202) {
                return redirect()->to('/login')->with('message', 'Reset link has been sent to your email.');
            } else {
                return redirect()->back()->with('error', 'Failed to send email.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    public function resetPassword($token)
    {
        // Cek apakah token valid
        $usersModel = new UsersModel();
        $user = $usersModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Invalid or expired reset token.');
        }

        return view('reset_password', ['token' => $token]);
    }

    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $newPassword = $this->request->getPost('password');
        
        // Cek apakah token valid
        $usersModel = new UsersModel();
        $user = $usersModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Invalid or expired reset token.');
        }

        // Hash password baru
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password dan reset token
        $usersModel->update($user['id'], [
            'password' => $hashedPassword,
            'reset_token' => null  // Hapus token reset setelah berhasil diubah
        ]);

        return redirect()->to('/login')->with('message', 'Your password has been successfully updated.');
    }
}
