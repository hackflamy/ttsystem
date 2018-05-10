<?php 
    class Admin {
        public $username;
        public $lastname;
    
        function __construct($username, $lastname){
            $this->username = $username;
            $this->lastname = $lastname;
        }

        public static function createLecturer($lastname,$initials){
            $lastname = strtolower($lastname);
            $username = $lastname.strtolower($initials)."@tut.ac.za";
            $conn = Db::getInstance($_SESSION["user"], $_SESSION["pass"]);
            $statement = 'CREATE USER "'.$username.'" IDENTIFIED BY "'.$lastname.'"';    
            $objParse = oci_parse($conn, $statement);
            oci_execute($objParse);
        }

        public static function createStudent($username){
            $user = $username."@tut.ac.za";
            $conn = Db::getInstance($_SESSION["user"], $_SESSION["pass"]);
            $statement = 'CREATE USER "'.$user.'" IDENTIFIED BY "'.$username.'"';
            $objParse = oci_parse($conn, $statement);
            oci_execute($objParse);
        }

        public static function removeUser($username){
            $username = strtolower($username);
            $conn = Db::getInstance($_SESSION["user"], $_SESSION["pass"]);
            $statement = 'DROP USER "'.$username.'"';
            $objParse = oci_parse($conn, $statement);
            oci_execute($objParse);
        }

        public static function resetPassword($username, $password){
            $username = strtolower($username);
            $conn = Db::getInstance($_SESSION["user"], $_SESSION["pass"]);
            $statement = 'ALTER USER "'.$username.'" IDENTIFIED BY "'.$password.'"';
            $objParse = oci_parse($conn, $statement);
            oci_execute($objParse);
        }

        public static function viewLecturer(){
            $conn = Db::getInstance($_SESSION["user"], $_SESSION["pass"]);
            $statement = "SELECT lect_usernames, lect_lastname||' '||lect_intials 
                            FROM tbllecture";
            $objParse = oci_parse($conn, $statement);
            oci_execute($objParse);

            $list = array();
            while($rows = oci_fetch_array($objParse)){
                $list[] = new Admin($rows[0], $rows[1]);
            }
            return $list;
        }
    }
?>