<?php

// including constant

include_once("constant.php");

// creating class

class User{

    public $fname;
    public $lname;
    public $email;
    public $password;
    public $phone;
    public $adddress;
    public $dbconn; // database connector /handler


    // initializing construct

    public function __construct(){

        // creating object of mysqli

        $this->dbconn = new MySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

        // check for connectivity error

        if($this->dbconn->connect_error){
            die("failed: ".$this->dbconn->connect_error);
        // }else{
        //     echo "connection successful";
        }
    }


          // creating register method/function

            function registerEditor($fname, $lname, $phone, $email, $password, $address){

                // encrypt password

                $pwd = password_hash($password, PASSWORD_DEFAULT);

                // prepare statement for database

                $statement = $this->dbconn->prepare("INSERT INTO editor (editor_fname, editor_lname, editor_phone, editor_email, editor_password, editor_address) VALUES(?,?,?,?,?,?)");

                // bind parameters
                $statement->bind_param("ssssss",$fname, $lname, $phone, $email, $pwd, $address);

                // execute statement

                $statement->execute();

                // check if input statement is successfully inserted


                if($statement->affected_rows == 1){

                    return true;
                }else{

                    return false.$statement->insert_id;
                }

            }
            // end of signup

            // begin sign in

            function login($email, $password){

                    // prepare statement
                $statement = $this->dbconn->prepare("SELECT * FROM editor WHERE editor_email=?");

                // bind parameters

                $statement->bind_param("s", $email);

                // execute

                $statement->execute();

                // get result 

                $result = $statement->get_result();

                // fetch result

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                

                 // verify password

                    if (password_verify($password, $row['editor_password'])) {

                        // create session if password matches
                        $_SESSION['editor_id'] = $row['editor_id'];
                        $_SESSION['2FA'] = "Gb%JqwF5mt3hcLc&+fe4ZV=DvLWaq#rM+@q4N4r_dw#VB_7&+UJjz7ADzBD?";
                        $_SESSION['lastname']= $row['editor_lname'];
                        $_SESSION['firstname']= $row['editor_fname'];
                        $_SESSION['email'] = $row['editor_email'];

                        return true;
                        
                        }else{

                            // here, the password doesn't match
                            return false;
                        }
                    }else{
                        return false;//here, the email checked is not in the databse
                }
            }
            // end login

            // start logout function 


            function Logout(){
                // session_start();
                session_start();
                session_destroy();

                // redirect to login page
                header('Location:login.php');
            }

 


            //end logout function



            // begin sign in

            function adminLogin($email, $password){

                // prepare statement
                $statement = $this->dbconn->prepare("SELECT * FROM admin WHERE email=?");

                // bind parameters

                $statement->bind_param("s", $email);

                // execute

                $statement->execute();

                // get result 

                $result = $statement->get_result();

                // fetch result

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
            

             // verify password

                if (password_verify($password, $row['password'])) {

                    // create session if password matches
                    $_SESSION['editor_id'] = $row['id'];
                    $_SESSION['2FA'] = "Gb%JqwF5mt3hcLc&+fe4ZV=DvLWaq#rM+@q4N4r_dw#VB_7&+UJjz7ADzBD?";
                    $_SESSION['lastname']= $row['lname'];
                    $_SESSION['firstname']= $row['fname'];
                    $_SESSION['email'] = $row['email'];

                    return true;
                    
                    }else{

                        // here, the password doesn't match
                        return false;
                    }
                }else{
                    return false;//here, the email checked is not in the databse
            }
        }
        // end login

            
    }



?>