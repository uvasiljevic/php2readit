<?php


namespace app\Controllers;
use app\Models\Registration;
use app\Models\Login;

class LoginController extends Controller{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertUser(){
        if(isset($_POST["send"])) {
            $regModel = new Registration($this->db);

            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordmd5 = md5($password);
            $reFirstName =  "/^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/";
            $reLastName =  "/^[A-ZŽĆČŠĐ][a-zđžćčš]{1,19}(\s[A-ZŽĆČŠĐ][a-zđžćčš]{1,19})*$/";
            $valid = true;
            if(!preg_match($reFirstName, $firstName)){
                $valid = false;
            }
            if(!preg_match($reLastName, $lastName)){
                $valid = false;
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $valid = false;
            }
            if(empty($password)){
                $valid = false;
            }
            if($valid){
                try{
                    $reg = $regModel->registration($firstName,$lastName,$email,$passwordmd5);
                    if ($reg) {
                        http_response_code(201);
                    } else {
                        http_response_code(500);
                    }
                }catch (\PDOException $ex) {
                    echo 'Error: ' . $ex->getMessage();
                }

            }


        }

    }

    public function findUser(){
        if(isset($_POST["send"])) {
            $logModel = new Login($this->db);

            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordmd5 = md5($password);
            $valid = true;
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $valid = false;
            }
            if(empty($password)){
                $valid = false;
            }
            if($valid){


                try {
                    $log = $logModel->login($email, $passwordmd5);
                    if ($log) {
                        $_SESSION['user'] = $log;
                        http_response_code(200);
                    } else {
                        http_response_code(409);
                    }
                } catch (\PDOException $ex) {
                    echo 'Error: ' . $ex->getMessage();
                }


            }



        }
    }

    public function logout(){

        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
            header("Location: index.php?page=home");
        }
        else{
            header("Location: index.php?page=home");
        }

    }

}