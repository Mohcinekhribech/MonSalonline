<?php
require_once('../app/core/Controller.php');
class RDV extends Controller{
    public function create()
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        $data = json_decode(file_get_contents("php://input"));
        $RDV = $this->model('RDVModel');

        //create RDV
        if ($RDV->create($data->clientId,$data->client_date)) {
            echo json_encode(
                array('message' => 'RDV Created')
            );
        } else {
            echo json_encode(
                array('message' => 'RDV Not Created')
            );
        }
    }
    public function delete(){
        header('Access-Control-Allow-Origin: *');
        $data = json_decode(file_get_contents("php://input"));
        $RDV = $this->model('RDVModel');
        //create RDV
        if ($RDV->delete($data->RDVID)) {
            echo json_encode(
                array('message' => 'RDV Deleted')
            );
        } else {
            echo json_encode(
                array('message' => 'RDV Not Deleted')
            );
        }
    }
}