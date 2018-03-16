<?php

class Android extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        //Nothing to see here.
        
    }

    public function validate_user(){
        //Client is loggin in
        $dataClient = array(
            'client_username' => $this->input->post('username'),
            'client_password' => sha1($this->input->post('password')),
        );
        $accountDetailsClient = $this->Login_model->getinfo("client", $dataClient);
        
        if (!$accountDetailsClient) {
            //OOPS no accounts like that!
            $user = array(
                "success" => false,
                "result" => "Invalid Account",
                "client_id" => "0"
            );
            
            echo json_encode($user);
        } else {
            $accountDetailsClient = $accountDetailsClient[0];
            if ($accountDetailsClient->client_username == $dataClient['client_username']) {
                if ($accountDetailsClient->client_status == 0) {
                    //OOPS user is blocked by the admin. Please contact the admin.
                    $user = array(
                    "success" => false,
                    "result" => "Account is blocked",
                    "client_id" => "0"
                );
                echo json_encode($user);
                } else {
                    if ($accountDetailsClient->client_isVerified == 0) {
                        //OOPS user is not verified yet.
                        $user = array(
                            "success" => false,
                            "result" => "Account is not yet verified",
                            "client_id" => "0"
                        );
                        echo json_encode($user);
                    } else {
                        $user = array(
                            "success" => true,
                            "result" => "Successfully found the user",
                            "client_id" => $accountDetailsClient->client_id
                        );
                        echo json_encode($user);
                    }
                }
            }
        }
    }
}
