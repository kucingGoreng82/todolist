<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class dashboard extends Controller{
    public function index(){
        $session = session();
        if (!$session->get('login')) {
            return redirect()->to('\login');
        }
        return view('dashboard');
    }
}
?>