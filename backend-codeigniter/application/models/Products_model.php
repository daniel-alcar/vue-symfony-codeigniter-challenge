<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Products_model extends CI_Model{

        private $table = 'products';

        public function index(){

            return $this->db->get($this->table)->result();
        }


        public function show($id){

            return $this->db->where('id', $id)->get($this->table)->row();

        }

        public function store($data){

            return $this->db->insert($this->table, $data);

        }
    }

?>