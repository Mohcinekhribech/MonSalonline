<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('phpmailer/src/Exception.php');
require_once('phpmailer/src/PHPMailer.php');
require_once('phpmailer/src/SMTP.php');
require_once('../app/core/Controller.php');
class client extends Controller
{

    public function create()
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        $post = $this->model('clientModel');
        $data = json_decode(file_get_contents("php://input"));
        
        $post->email = $data->email;
        $post->Nom = $data->Nom;
        $post->Prenom = $data->Prenom;
        $post->Num_tel = $data->Num_tel;
        $post->Referance = uniqid(md5($data->Nom . $data->Prenom . $data->Num_tel), false);
        
        //create post
        if ($post->create()) {
            $email =new PHPMailer(true);
            $email->isSMTP();
            $email->Host = 'smtp.gmail.com';
            $email->SMTPAuth = true;
            $email->Username = 'mohcinekhribche123@gmail.com';
            $email->Password = 'duvdpymzhifeyily';
            $email->SMTPSecure = 'ssl';
            $email->Port = 465;
            $email->setFrom('mohcinekhribche123@gmail.com');
            $email->addAddress($post->email);
            $email->Subject = 'Your Referance';
            $email->Body = 'Your Referance : ' . $post->Referance;
            $email -> send();
            echo 'done';
            
        } else {
            echo json_encode(
                array('message' => 'Post Not Created')
            );
        }
    }
    public function delete($id)
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        $post = $this->model('clientModel');

        if ($post->delete($id)) {
            echo json_encode(
                array('message' => 'Post Deleted')
            );
        } else {
            echo json_encode(
                array('message' => 'Post Not Deleted')
            );
        }
    }
    public function read()
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        $post = $this->model('clientModel');
        //Blog post query 
        $result = $post->read();
        // Get row count
        $num = $result->rowCount();

        //check if iny posts
        if ($num > 0) {
            //Post array
            $post_arr = array();
            //$posts_arr['data'] = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $post_item = array(
                    'client_date' => $client_date,
                    'Nom' => $Nom,
                    'Prenom' => $Prenom,
                    'Num_tel' => $Num_tel,
                    'Referance' => $Referance
                );

                //Push to "data"
                array_push($post_arr, $post_item);
            }

            //Turn to json & output
            echo json_encode($post_arr);
        } else {
            // No Posts
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }
    }
    public function read_single($id)
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        $post = $this->model('clientModel');
        //get Id
        $id = isset($id) ? $id : die();

        //get post 
        $row = $post->read_single($id);


        //create array
        $post_arr = array(
            'Nom' => $post->Nom,
            'Prenom' => $post->Prenom,
            'Num_tel' => $post->Num_tel,
            'Referance' => $post->Referance
        );
        //json
        echo json_encode($post_arr);
    }
    public function update()
    {
        //Headers
        header('Access-Control-Allow-Origin: *');
        $post = $this->model('clientModel');
        $data = json_decode(file_get_contents("php://input"));
        $post->clientId = $data->clientId;
        $post->Nom = $data->Nom;
        $post->Prenom = $data->Prenom;
        $post->Num_tel = $data->Num_tel;
        $post->Referance = $data->Referance;
        //create post
        if ($post->update()) {
            echo json_encode(
                array('message' => 'Post Updated')
            );
        } else {
            echo json_encode(
                array('message' => 'Post Not Updated')
            );
        }
    }
}
