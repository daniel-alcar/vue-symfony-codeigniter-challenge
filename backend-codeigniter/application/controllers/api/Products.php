<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// erro no Intelephense//
/**
 * @property CI_Input $input
 * @property Products_model $Products_model
 */
    class Products extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Products_model');
        }

        public function index(){

            if ($this->input->method() === 'get') {
                
                $products = $this->Products_model->index();

                if(empty($products)){
                    set_status_header(404);

                    echo json_encode(
                        [
                            'payload'=>'null',
                            'error'=>[
                                'message'=> 'Produto nao encontrado'
                            ]
                        ]
                    );
                } else {
                    echo json_encode(
                        [
                            "payload"=>$products
                        ]
                    );

                }


            } else if($this->input->method() === 'post'){
                $this->store();
            }
        }

        public function show($id){
            
            $products = $this->Products_model->show($id);

            if (!$products) {
                
                set_status_header(404);

                echo json_encode(
                    [
                        'payload'=>'null',
                        'error'=>[
                            'message'=>'Produto nao encontrado'
                        ]
                    ]
                );
            } else{
                echo json_encode($products);
            }
            

        }

        public function store(){

            $data = [
                'name'=> $this->input->post('name'),
                'description'=>$this->input->post('description'),
                'price'=> (double) $this->input->post('price'),
                'stock'=>(int) $this->input->post('stock')
            ];

            if (empty($data['name']) || empty($data['description']) || $data['price'] === null || $data['stock'] === null || $data['price'] <= 0 ||$data['stock'] < 0 ){
                set_status_header(400);

                echo json_encode(
                    [
                        'payload'=>'invalid',
                        'erro'=>[
                            'message'=>'Produto invalido'
                        ]
                    ]
                );
            } else {

                $this->Products_model->store($data);

                echo json_encode(
                    [
                        'success'=>'produto cadastrado',
                        'name'=>$data['name'],
                        'description'=>$data['description'],
                        'price'=>$data['price'],
                        'stock'=>$data['stock']
                    ]
                );
            }
        }
    }

?>