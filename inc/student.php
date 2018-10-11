
<?php
    include "DataBase.php";
    class Student{
        private $table = 'tbl_user';
        private $name;
        private $dep;
        private $email;
        private $roll;

        public function setName($name){
            $this->name = $name;
        }
        
        public function setDep($dep){
            $this->dep = $dep;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setId($roll){
            $this->roll = $roll;
        }
        //insert data
        public function insert(){
            $sql = "INSERT INTO $this->table(name, email, dep, roll) VALUES (:name, :email, :dep, :roll)";
            $stmt = DataBase::prepareOwn($sql);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':dep',$this->dep);   
            $stmt->bindParam(':roll',$this->roll);
            return $stmt->execute();
        }
        //update data
        public function readByID($id){
            $sql = "SELECT * FROM $this->table WHERE id=:id";
            $stmt = DataBase::prepareOwn($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function update($id){
            $sql = "UPDATE $this->table SET name=:name, email=:email, dep=:dep, roll=:roll WHERE id=:id";
            $stmt = DataBase::prepareOwn($sql);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':dep',$this->dep);   
            $stmt->bindParam(':roll',$this->roll);
            $stmt->bindParam(':id',$id);
            return $stmt->execute();
        }

        //read data
        public function readAll(){
            $sql = "SELECT * FROM $this->table";
            $stmt = DataBase::prepareOwn($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        //delete data
        public function delete($id){
            $sql = "DELETE FROM $this->table WHERE id=:id";
            $stmt = DataBase::prepareOwn($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
    }

?>