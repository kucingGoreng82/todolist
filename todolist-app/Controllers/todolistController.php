<?php

namespace App\Controllers;

use App\Models\todolistModel;
use App\Controllers\BaseController;

class todolistController extends BaseController
{
    public function index()
    {
        $todoModel = new todolistModel();

        // Assuming you have user id stored in session after login
        $userId = session()->get('id');
        
        $data['todolist'] = $todoModel->getByUser($userId);

        return view('todo_list', $data);
    }

    public function add()
    {
        $todoModel = new todolistModel();

        $data = [
            'kegiatan' => $this->request->getPost('kegiatan'),
            'status'   => 'pending',
            'id'  => session()->get('id')
        ];

        $todoModel->save($data);

        return redirect()->to('/todo');
    }

    public function complete($idkegiatan)
    {
        $todoModel = new todolistModel();

        $todoModel->update($idkegiatan, ['status' => 'completed']);

        return redirect()->to('/todo');
    }

    public function delete($idkegiatan)
    {
        $todoModel = new todolistModel();

        $todoModel->delete($idkegiatan);

        return redirect()->to('/todo');
    }
}
