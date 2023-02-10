<?php
require_once('../app/core/Controller.php');
class RDV extends Controller{
    public function create()
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        $data = json_decode(file_get_contents("php://input"));
        $RDV = $this->model('RDVModel');
        $clientId = intval($data->clientId);
        //create RDV
        if ($RDV->create($clientId,$data->client_date,$data->hour)) {
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
    public function read($date,$hour){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        $RDV = $this->model('RDVModel');
        $stmt = $RDV->read($date, $hour);
        if($stmt){
            $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode(
                array('clientId' => $stmt['clientId'])
            );
        }else{
            echo json_encode(
                array('message' => 'RDV Not Found')
            );
        }
    }
}