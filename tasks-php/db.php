<?php

//Lab 05
//Implement a class called Database that have methods :
class Database{

    private $connection = null;

    //1- connect-> takes the connection credentials,
    public function connect( $dbhost = "localhost", $dbname = "itidb", $username = "root", $password    = "pass"){

        try{

            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }

    }

    // insert accepts table names and columns names.
    // Insert a row/s in a Database Table
    public function Insert( $table = "" , $columns = [] ){
        try{
            $col_values="";
            $col_names="";
            foreach ($columns as $key => $value) {
               $col_values= $col_values.'"'.$value.'" ,';
               $col_names = $col_names.$key.',';
            }
            $col_values = rtrim($col_values, ", ");
            $col_names = rtrim($col_names, ", ");

            $sql = "INSERT into ".$table." ( ".$col_names ." ) VALUES ($col_values)";
            $query = $this->connection->prepare($sql)   ;
            $query->execute();

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    //function select that accepts table name and retrieves the data from it,
    public function Select( $table ){
        try{
            $query=$this->connection->prepare('Select * FROM '.$table);
            $query->execute();
            $users=$query->fetchAll(PDO::FETCH_ASSOC);
            return $users ;

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    //Function update that accepts the table name and the id of the
    //record needed to be updated and the fields values.
    // Update a row/s in a Database Table
    public function update( $table, $id, $updates ){
        try{
            $col_names="";
            $col_values=[];
            foreach ($updates as $key => $value) {
                $col_names = $col_names.$key.'=?, ';
                array_push($col_values,$value);
            }
            $col_names = rtrim($col_names, ", ");
            echo $col_names ;
            $sql = "UPDATE ".$table." SET ".$col_names ." where  id = ".$id;

//            $full_name=$updates['full_name'];
//            $username=$updates['username'];
//            $email=$updates['email'];
//            $birth_date=$updates['birth_date'];
//            $city=$updates['city'];
//
//            $sql= "UPDATE users SET full_name=?,username=?,email=?,birth_date=?,city=? WHERE id=?";
            $query=$this->connection->prepare($sql);
            echo $sql ;
//            $query->execute([$full_name,$username,$email,$birth_date, $city,$id]);
            $query->execute($col_values);

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
    //Function called delete, that accepts the table name and the id of the record needed to deleted.
    // Remove a row/s in a Database Table
    public function delete( $table , $id ){
        try{

            $query=$this->connection->prepare("DELETE FROM $table WHERE id=?");
            $query->execute([$id]);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }



}