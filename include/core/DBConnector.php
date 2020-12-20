<?php

namespace MyApp {

    class DBConnector
    {
        private static $conn = null;
        public static function OpenConnection() {
            return self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }
        public static function CloseConnection() {
            if(self::$conn != null){
                mysqli_close(self::$conn);
            }
        }
    }
}

