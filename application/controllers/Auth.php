<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m', 'auth', true);
    }

    public function index()
    {
        redirectIfLoggedIn();

        $data['title'] = "Please login";
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login_view', $data);
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // cek verifikasi
            if (strlen($user['verify_at']) == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan verifikasi email anda!</div>');
                redirect('index.php/auth');
            }

            // cek passwordnya
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama'  => $user['nama'],
                    'email' => $user['email']
                ];
                $this->session->set_userdata($data);
                redirect('index.php/admin/dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('index.php/auth');
            }
        } else {
            // jika usernya tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account dengan email ini tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $data['title'] = "Registration";
        $rules = $this->auth->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $this->load->view('register_view', $data);
        } else {
            $this->auth->registration();

            $this->_sendemail($this->input->post('email'));
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda sudah dibuat. Silahkan verifikasi email anda!</div>');
            redirect('index.php/auth');
        }
    }

    public function verify($token)
    {
        $email = $this->isValidVerification($token);

        if ($email) {
            $this->auth->verified($email);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email anda sudah terverifikasi!</div>');
            redirect('index.php/auth');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Verifikasi tidak valid</div>');
        redirect('index.php/auth');
    }

    private function createVerifyUrl($email)
    {
        $this->load->library('encryption');
        $this->load->helper('url');

        $data = serialize([
            'exp' => date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 days')),
            'email' => $email
        ]);

        $token = base64_encode($this->encryption->encrypt($data));

        return site_url("auth/verify/{$token}");
    }

    private function isValidVerification($token)
    {
        $this->load->library('encryption');

        $data = unserialize($this->encryption->decrypt(base64_decode($token)));

        if ($data['exp'] < date('Y-m-d')) {
            return false;
        }

        return $data['email'];
    }

    private function _sendemail($email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'dinodesa56@gmail.com',
            'smtp_pass' => 'Dinodesasejomulyo56',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $urlVerification = $this->createVerifyUrl($email);
        $message = implode("\r\n", [
            'Terima kasih telah mendaftar, silahkan verifikasi email anda agar bisa login.',
            '<br/><br/>',
            "<a href='{$urlVerification}' target='_blank'><strong>Verifikasi Email</strong></a>"
        ]);

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('dinodesa56@gmail.com', 'dina');
        $this->email->to($email);
        $this->email->subject('Verifikasi Email');
        $this->email->message($message);
        if ($this->email->send()){
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

    }






    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

















    public function edit($id = null)
    {
        $rules = $this->menu->rules();
        $validation = $this->form_validation->set_rules($rules);

        if ($validation->run() == false) {
            $data['title'] = "Management menu";
            $data['menu'] = $this->menu->getAll();
            $data['editMenu'] = $this->menu->getById($id);
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar', $data);
            $this->load->view('_partials/top-menu');
            $this->load->view('admin/menu/edit');
            $this->load->view('_partials/footer');
        } else {
            $this->menu->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil diupdate!</div>');
            redirect('admin/menu');
        }
    }

    public function hapus($id = null)
    {
        if (!isset($id))
            show_404();
        $delete = $this->menu->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus!</div>');
            redirect('admin/menu');
        }
    }
}
