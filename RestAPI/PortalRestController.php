<?php

class PortalRestController {

    public PDO $pdo;
    function __construct()
    {
        //echo 123;
        $this->pdo = new PDO("mysql:host=localhost;dbname=portal_db;charset=utf8", "root", "");
    }

    public function process($id=null) {
        $method = $_SERVER['REQUEST_METHOD'];
        echo $method;
        echo "process: id=$id, method=$method";

        $data = [];
        if ($id){
            if ($method == 'GET') {
                $data = $this->list($id);
                //$this->retrieve($id);
            } elseif ($method == 'PUT') {
                $data = $this->update($id);
            } elseif ($method == 'DELETE') {
                $data = $this->remove($id);
            }
        } else {
            if ($method == 'GET') {
                $data = $this->list($id);
            } elseif ($method == 'POST') {
                $data = $this->create($id);
            } 
        }

        header('Content-type: application/json');
        echo json_encode($data ?? []);
    }

    public function list() {
        //echo "list";
        $query = $this->pdo->query("SELECT * FROM portal_characters");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create() {
        echo "create";
    }

    public function retrieve($id) {
        echo "retrieve";
    }

    public function update($id) {
        echo "update";
    }

    public function remove($id) {
        echo "remove";
    }
}