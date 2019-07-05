<?php

require_once "Config.php";

class User extends Config {

    public function login($username, $password) {
        $hashed_password = md5($password);
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
        // excute or run the query
        $result = $this->conn->query($sql);
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            echo "<script>window.location.replace('users.php');</script>";
        }else {
            echo "<p class='text-danger'>Invalid Username or Password</p>";
        }
        }
    

    public function selectALL() {
        // query
        $sql = "SELECT * FROM users ORDER BY updated_at DESC";
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
        $sql = "SELECT * FROM users WHERE user_id=$id";
        // execute or run the query
        $result = $this->conn->query($sql);

        if($result) {
            return $result->fetch_assoc();
        } elseif($result->conn->error) {
            echo "Error" . $this->conn->error;
        }
    }

        public function save($username, $password, $email, $firstname, $lastname) {

            //md5がパスワードをコンピュータが決めるコード
            $new_password = md5($password);
            $sql = "INSERT INTO users(username, email, password, firstname, lastname)
                    VALUES('$username', '$email', '$new_password', '$firstname', '$lastname')";
                    // excute or the query
                    $result = $this->conn->query($sql);

                    if($result) {
                        return true;
                    } else {
                        echo "Error: " . $this->conn->error;
                    }

       
    }
    public function update($id, $username, $email, $firstname, $lastname) {
        $sql = "UPDATE users SET username='$username', email='$email', firstname='$firstname',
                lastname='$lastname' WHERE user_id=$id";
                // excute or run the query
                $result = $this->conn->query($sql);
                if($result) {
                    return true;
                }else {
                    echo "Error: " . $this->conn->error;
                }
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE user_id=$id";
        // execute or the query
        $result = $this->conn->query($sql);

        if($result) {
            return true;
        } else {
            echo "Error: " . $this->conn->error;
        }
    }


}

