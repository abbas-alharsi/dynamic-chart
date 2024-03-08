<?php
namespace App\Controllers;
use App\Models\MyModel;

class MyController extends BaseController {
    protected $myModel;
    public function __construct() {
        $this->myModel = new MyModel();
    }
    public function myView(){
        $year = date('Y');
        $data['title'] = 'My App';
        $data['salesRow'] = $this->myModel->getData($year);
        return view('myView', $data);
    }
    public function getData($year) {
        $data = $this->myModel->getData($year);
        $res;
        if(intval(sizeof($data)) < 1) {
            $res = array(
                'status'=>'error',
                'msg'=>"Tidak ditemukan data penjualan pada bulan yang dimaksud ",
                'data'=>$data
            );
        } else {
            $res = array(
                'status'=>'success',
                'msg'=>"Terdapat data penjualan pada bulan yang dimaksud",
                'data'=>$data
            );
        }
        echo json_encode($res);
    }
}