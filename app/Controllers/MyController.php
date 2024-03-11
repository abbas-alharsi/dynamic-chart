<?php
namespace App\Controllers;
use App\Models\MyModel;

class MyController extends BaseController {
    protected $myModel;
    public function __construct(){
        $this->myModel = new MyModel();
    }
    public function myView(){
        $year = date('Y');
        $data['title'] = 'My App';
        $data['salesRow'] = $this->myModel->getData($year);
        return view('myView',$data);
    }
    public function updateChart($year) {
        $data = $this->myModel->getData($year);
        $res;
        if(intval(sizeof($data)) < 1) {
            $res = array(
                'status'=>'error',
                'msg'=>''
            );
        } else {
            $res = array(
                'status'=>'success',
                'msg'=>'',
                'data'=>$data
            );
        }
        echo json_encode($res);
    }
}