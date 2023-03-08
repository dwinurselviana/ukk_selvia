<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;
class MasyarakatController extends BaseController{

    protected $masyarakat;

    function __construct()
    {
        $this->masyarakat = new Masyarakat();
    }
    public function index()
    {
        $data['masyarakat']= $this->masyarakat->findAll();
        return view ('masyarakat_view',$data);
    }
    public function create()
    {
        return view('fmasyarakat_view');
    }
    public function simpan()
    {
        $data= array(
            'nik'=> $this->request->getPost('nik'),
            'nama'=> $this->request->getPost('nama'),
            'username'=> $this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
            'telp'=> $this->request->getPost('telp'),
        );
        $this->masyarakat->insert($data);
        session()->setFlashdata("message","Data Berhasil Disimpan");
        return redirect('masyarakat');
    }
    public function delete($id)
    {
        $this->masyarakat->delete($id);
        session()->setFlashdata("message","Data Berhasil Dihapus");
        return redirect('masyarakat');
    }
    public function edit($id)
    {
        $data= array(
            'nik'=> $this->request->getPost('nik'),
            'nama'=> $this->request->getPost('nama'),
            'username'=> $this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
            'telp'=> $this->request->getPost('telp'),
        );
        $this->masyarakat->update($id,$data);
        session()->setFlashdata("message","Data Berhasil Disimpan");
        return redirect('masyarakat');
    }
}