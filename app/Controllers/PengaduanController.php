<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
class PengaduanController extends BaseController{
    protected $pengaduans, $tanggapans;
    public function __construct()
    {
        $this->pengaduans = new Pengaduan();
        $this->tanggapans = new Tanggapan();
    }
    public function index()
    {
        if(session()->get('level')=='masyarakat'){
            $data['pengaduan'] = $this->pengaduans->where(['nik'=>session()->get('nik')])->findAll();
        }else{
            $data['pengaduan'] = $this->pengaduans->findAll();
        }
        return view('pengaduan_view',$data);
    }
    public function simpan(){
        $datafile = $this->request->getFile('foto');
        $filename = $datafile->getRandomName();
        $data = [
            'tgl_pengaduan'=>date('Y-m-d H:i:s'),
            'nik'=>session()->get('nik'),
            'isi_laporan'=>$this->request->getPost('isi_laporan'),
            'foto'=>$filename,
            'status'=>'0'
        ];
        $this->pengaduans->insert($data);

        $datafile->move('upload/berkas',$filename);
        return redirect('pengaduan');
    }
    public function hapus($id){
        $this->pengaduans->delete($id);
        return redirect('pengaduan');
    }
}