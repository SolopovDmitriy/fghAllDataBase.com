<?php

namespace MyApp {

    /**
     * Class DBEngine
     * @package MyApp
     */
    class DBEngine
    {
        /**
         * @var string
         */
        private $tableName = '';

        /**
         * DBEngine constructor.
         * @param string $tableName имя таблицы
         */
        public function __construct($tableName = '')
        {
            if (mb_strlen($tableName) <= 2) {
                throw  new \Exception("Недостаточное количество символов");
            }
            if (!$this->isTableExists($tableName)) {
                throw  new \Exception("Указанная таблица не существует");
            }

            $this->tableName = $tableName;
        }

        /**
         * @description Проверка существования указанной таблицы
         * @param $tableName название таблицы для проверки
         * @return bool true если таблица существует
         */
        private function isTableExists($tableName)
        {
            $query = "SHOW TABLES";
            $result = $this->executeQuery($query);
            if ($result != null) {
                $nameCol = "Tables_in_" . DB_NAME;
                foreach ($result as $key => $value) {
                    //echo $value[$nameCol]."+".$tableName;
                    if (strcmp($value[$nameCol], $tableName) == 0) {
                        $this->tableName = $tableName;
                        return true;
                    }
                }
            }
            return false;
        }

        public function executeQuery($query, $mode = "SELECT")
        {
            $conn = DBConnector::OpenConnection();
            $result = mysqli_query($conn, $query);
            switch ($mode) {
                case "SELECT":
                {
                    if ($result->num_rows > 0) {
                        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    } else {
                        $result = null;
                    }
                    break;
                }
                default:
                {
                    $result = mysqli_affected_rows($conn);
                    break;
                }
            }
            DBConnector::CloseConnection();
            return $result;
        }

        public function getId($filter = [])
        {
            $query = "SELECT id FROM " . $this->tableName . " WHERE ";
            if (count($filter) == 0) return null;
            foreach ($filter as $key => $value) {
                if ($value == null) {
                    $query .= "$key IS NULL AND ";
                } else {
                    $query .= "$key = '$value' AND ";
                }
            }
            $query = mb_substr($query, 0, mb_strlen($query) - 4);
            $query .= " LIMIT 1";
            $result = $this->executeQuery($query);
            if ($result == null) {
                return null;
            } else {
                return intval($result[0]['id']);
            }
        }

        public function getOneRow($id)
        {
            $query = "SELECT * FROM " . $this->tableName . " WHERE id = " . $id;
            $result = $this->executeQuery($query, "SELECT");
            return ($result == null) ? null : $result[0];
        }

        public function getManyRows($filter = [], $orderBy = 'id', $order = "ASC", $limit = 10, $offset = 0)
        {
            $query = "SELECT * FROM " . $this->tableName;
            if (count($filter) > 0) {
                $query .= " WHERE ";
                foreach ($filter as $key => $value) {
                    if ($value == null) {
                        $query .= "$key IS NULL AND ";
                    } else {
                        $query .= "$key = '$value' AND ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 4);
            }
            $query .= " ORDER BY $orderBy $order LIMIT $limit OFFSET $offset";
            return $this->executeQuery($query);
        }

        public function addNewRow($newData = [])
        {
            if (count($newData) == 0) return false;
            $query = "INSERT INTO " . $this->tableName . " (";
            $keys = "";
            $values = "";
            foreach ($newData as $key => $value) {
                $keys .= "$key, ";
                if ($value == null) {
                    $values .= "NULL, ";
                } else {
                    $values .= "'$value', ";
                }
            }
            $keys = mb_substr($keys, 0, mb_strlen($keys) - 2);
            $values = mb_substr($values, 0, mb_strlen($values) - 2);
            $query .= $keys .= ") VALUES (";
            $query .= $values .= ")";
            $affectedRow = $this->executeQuery($query, "INSERT");
            if ($affectedRow == 1) {
                return true;
            } else {
                return false;
            }
        }

        public function updateOneRow($id, $newData = [])
        {
            $query = "UPDATE " . $this->tableName . " SET ";
            if (count($newData) > 0) {
                foreach ($newData as $key => $value) {
                    if ($value == null) {
                        $query .= "$key = NULL, ";
                    } else {
                        $query .= "$key = '$value', ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 2);
                $query .= " WHERE id=$id";
                $affectRow = $this->executeQuery($query, "UPDATE");
                if ($affectRow == 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        public
        function deleteOneRow($id)
        {
            $query = "DELETE FROM " . $this->tableName . " WHERE  id = " . $id;
            $affectRow = $this->executeQuery($query, "DELETE");
            if ($affectRow == 1) {
                return true;
            } else {
                return false;
            }
        }

        public function getCountRows()
        {
            $query = "SELECT COUNT(*) AS count FROM " . $this->tableName;
            $result = $this->executeQuery($query);
            return is_null($result) ? null : $result[0]['count'];
        }
    }
}

