<?php

require_once "Config.php";

class Item extends Config {

    public function selectALL() {
        // query
        $sql = "SELECT * FROM items 
                INNER JOIN categories ON items.category_id=categories.category_id
                ORDER BY items.item_id DESC";
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
        $sql = "SELECT * FROM items WHERE item_id=$id";
        // execute or run the query
        $result = $this->conn->query($sql);

        if($result) {
            return $result->fetch_assoc();
        } elseif($result->conn->error) {
            echo "Error" . $this->conn->error;
        }
    }

        public function save($itemname, $itemdescription, $itemprice) {

            //md5がパスワードをコンピュータが決めるコード
            $new_password = md5($password);
            $sql = "INSERT INTO categories(item_name, item_description, item_price)
                    VALUES('$itemname', '$itemdescription', '$itemprice')";
                    // excute or the query
                    $result = $this->conn->query($sql);

                    if($result) {
                        return true;
                    } else {
                        echo "Error: " . $this->conn->error;
                    }

       
    }
    public function update($id, $itemname, $itemdescription, $itemprice) {
        $sql = "UPDATE categories SET item_name='$itemname', item_description='$itemdescrption', item_price='$itemprice', WHERE item_id=$id";
                // excute or run the query
                $result = $this->conn->query($sql);
                if($result) {
                    return true;
                }else {
                    echo "Error: " . $this->conn->error;
                }
    }

    public function delete($id) {
        $sql = "DELETE FROM items WHERE item_id=$id";
        // execute or the query
        $result = $this->conn->query($sql);

        if($result) {
            return true;
        } else {
            echo "Error: " . $this->conn->error;
        }
    }


}

