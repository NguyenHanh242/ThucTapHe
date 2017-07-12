<?php
    require_once 'bean.php'; 

    function connectDb(){
        $servername = "localhost";
        $username = "root";
        $password = "hanhchu";
        $conn = null;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=db_project1", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "connect successfully";
        } catch (PDOException $e){
            //echo "connect fail ".$e->getMessage();
        } finally {
            return $conn;
        }
    }
    function getData($sqlStr){
        $conn= null;
        $stmt= null;
        try {
            $conn = connectDb();
            $stmt = $conn->prepare($sqlStr);
            $obj= new Object();
            // set the resulting array to associative
            $stmt->setFetchMode(PDO::FETCH_INTO, $obj);
            $stmt->execute();
        }
        catch(PDOException $e) {
            //  echo "<script>console.log('[ERROR]\t" . $e->getMessage()."')</script>";
        }finally{
            $conn= null;
            return $stmt;
        }
    }

    function executeStatement($query){
        $conn= null;
        $count = 0;

        try{
            $conn = connectDb();
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $count = $stmt->rowCount();
        } catch (PDOExeption $e){

        } finally {
            $conn = null;
            return $count;
        }
    }

    function login_user($username, $password){
        $data = getData("select * from user where username = '$username' and password = '$password'");
        $user = null;
        foreach($data as $obj){
            $user = $obj;
        }
        return $user;
    }

    function userIsExist($id, $username){
        return executeStatement("select * from user where id = $id and username = $username");
    }
    
?>