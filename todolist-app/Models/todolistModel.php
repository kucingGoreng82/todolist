<?php
namespace App\Models;
use CodeIgniter\Model;

class todolistModel extends Model{
    protected $table = 'todolist';
    protected $primaryKey = 'idKegiatan';
    protected $allowedFields = ['kegiatan','status','id'];
    // protected $returnType = 'array';
    
    public function getByUser($userId){
        return $this->where('id',$userId)->findAll();
    }
}
?>