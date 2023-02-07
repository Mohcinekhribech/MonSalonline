<?php

class day {
    public function today(){
        header('Access-Control-Allow-Origin: *');
        $day=['today'=>date("Y-m-d")];
        echo json_encode($day);

    }
    public function max(){
        return date("Y-m-d");
    }
}