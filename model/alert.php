<?php 
class Alert{

        function __contruct() {

        }

        public static function alertMessage($message) {
            if($message[1] == 'TT512'){
                self::alertError($message[0]);
            }else if($message[1] == 'TT132'){
                self::alertSuccess($message[0]);
            }else {
                self::alertError($message[0]);
            }
        }
        public static function alertError($message){

            echo '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>'.$message.'</p>
                </div>';
        } 

        public static function alertSuccess($message){
            echo '<div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>'.$message.'</p>
                </div>';
        }
    }
?>