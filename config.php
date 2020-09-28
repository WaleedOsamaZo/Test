<?php 

        $dbs = 'mysql:host=localhost;dbname=lido;charset=utf8';
        $user = 'root';
        $pass  = '';
        try 
        {
        $db_connection = new pdo($dbs,$user,$pass);
        }catch(PDOException $ex)
        {
            echo "Error in database Connection : " . $ex->getMessage();
            die();
        }

?>