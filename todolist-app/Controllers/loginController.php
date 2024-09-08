<?php
namespace App\Controllers;
use App\Models\loginModel;
use CodeIgniter\Controller;

class loginController extends Controller{
    public function index(){
        return view('login');
    }

    public function auth(){
        $session = session();
        $model = new loginModel();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        $data = $model->getUserByName($username);

        if ($data) {
            $pass = $data['password'];
            if ($password == $pass) {
                $sessionData =[
                'id' => $data['id'],
                'username' => $data['username'],
                'login' => TRUE
                ];
                $session -> set($sessionData);
                return redirect()->to('/todolist');
            }else {
                $session->setFlashdata('msg','Password yang Anda Masukkan Salah');
                return redirect()->to('\login');
            }
        }else {
            $session->setFlashdata('msg','Pengguna Tidak Ditemukan');
            return redirect()->to('\login');
        }
    }

    public function logout(){
        session()-> destroy();
        return redirect()->to('\login');
    }
}
?>