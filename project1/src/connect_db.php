<?php
    include "bean.php"; 

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

    // function getData($query){
    //     $conn = null;
    //     $st = null;
    //     try {
    //         $conn = connectDb();
    //         $st = $conn->prepare($query);
    //         $obj = new Object();
    //         $st = setFetchMode(PDO::FETCH_INTO, $obj);
    //         $st = execute();
    //     } catch (PDOException $e){
    //         echo "<script>console.log('[ERROR]\t" . $e->getMessage()."')</script>";
    //     } finally {
    //         $conn = null;
    //         return $st;
    //     }
    // }
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
    
?>