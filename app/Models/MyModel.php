<?php
namespace App\Models;
use CodeIgniter\Model;
use App\Config\Database;

class MyModel extends Model {
    protected $db;
    protected $input;
    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->input = \Config\Services::request();
    }
    public function getData($year) {
        return $this->db->table('sales')->where('year', $year)->get()->getResult();
    }
}