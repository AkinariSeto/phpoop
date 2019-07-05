<?php

require_once "Config.php";

class Category extends Config {

    public function selectALL() {
        // query
        $sql = "SELECT * FROM categories ORDER BY updated_at DESC";
        // execute or the query
        $result = $this-> conn->query($sql);
        // create an empty array
        $rows = array();
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function selectOne($id){
        // query
        $sql = "SELECT * FROM categories WHERE category_id=$id";
        // execute or run the query
        $result = $this->conn->query($sql);

        if($result) {
            return $result->fetch_assoc();
        } elseif($result->conn->error) {
            echo "Error" . $this->conn->error;
        }
    }

        public function save($category_name) {

            //md5がパスワードをコンピュータが決めるコード
            $new_password = md5($password);
            $sql = "INSERT INTO categories(category_name)
                    VALUES('$categoryname')";
                    // excute or the query
                    $result = $this->conn->query($sql);

                    if($result) {
                        return true;
                    } else {
                        echo "Error: " . $this->conn->error;
                    }

       
    }
    public function update($id, $categoryname) {
        $sql = "UPDATE categories SET category_name='$categoryname' WHERE category_id=$id";
                // excute or run the query
                $result = $this->conn->query($sql);
                if($result) {
                    return true;
                }else {
                    echo "Error: " . $this->conn->error;
                }
    }

    public function delete($id) {
        $sql = "DELETE FROM categories WHERE category_id=$id";
        // execute or the query
        $result = $this->conn->query($sql);

        if($result) {
            return true;
        } else {
            echo "Error: " . $this->conn->error;
        }
    }


}

