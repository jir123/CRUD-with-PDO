
<?php include 'lib/header/header.php'?>
<?php

    spl_autoload_register(function($class_name){
        include "inc/".$class_name.".php";
    });
    // include 'inc/student.php';
?>


<div class="container">
        <div class="mainleft">
        <?php
            $user = new Student();
            if(isset($_POST['create'])){
                $name = $_POST['name'];
                $dep = $_POST['dep'];
                $email = $_POST['email'];
                $roll = $_POST['roll'];

                $user->setName($name);
                $user->setDep($dep);
                $user->setEmail($email);
                $user->setId($roll);

                if($user->insert()){
                    echo "<span style='color:#4caf50; padding:10px;'><b>Success ! </b>Data Inserted Successfully ...</span>";
                }
            }

            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $dep = $_POST['dep'];
                $email = $_POST['email'];
                $roll = $_POST['roll'];

                $user->setName($name);
                $user->setDep($dep);
                $user->setEmail($email);
                $user->setId($roll);

                if($user->update($id)){
                    echo "<span style='color:#4caf50; padding:10px;'><b>Success ! </b>Data Updated Successfully ...</span>";
                }
            }
        ?>
        
        <?php 
            if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                $id = (int)$_GET['id'];
                if($user->delete($id)){
                    echo "<span style='color:#DC3545; padding:10px;'><b>Success ! </b>Data Updated Successfully ...</span>";
                }
            }
        ?>

        <?php 
            if(isset($_GET['action']) && $_GET['action'] == 'update'){
                $id = (int)$_GET['id'];
                $result = $user->readByID($id);
        ?>
        
            
            <form action="" method="post">
                <frieldset>
                    <legend>Registration</legend>
                    <table>
                    <input type="hidden" name="id" value="<?php echo $result['id'];?>" />
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" name="name" value="<?php echo $result['name'];?>" require="1"/></td>
                        </tr>
                        <tr>
                            <td>Department :</td>
                            <td><input type="text" name="dep" value="<?php echo $result['dep'];?>" require="1"/></td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><input type="text" name="email" value="<?php echo $result['email'];?>" require="1"/></td>
                        </tr>
                        <tr>
                            <td>ID :</td>
                            <td><input type="text" name="roll" value="<?php echo $result['roll'];?>" require="1"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="create" value="Update"/></td>
                        </tr>
                    </table>
                </frieldset>
            </form>

        <?php }else{ ?>
            <form action="" method="post">
                <frieldset>
                    <legend>Registration</legend>
                    <table>
                        <tr>
                            <td>Name :</td>
                            <td><input type="text" name="name" placeholder="Your name ... " require="1"/></td>
                        </tr>
                        <tr>
                            <td>Department :</td>
                            <td><input type="text" name="dep" placeholder="Your department ... " require="1"/></td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td><input type="text" name="email" placeholder="Your email ... " require="1"/></td>
                        </tr>
                        <tr>
                            <td>ID :</td>
                            <td><input type="text" name="roll" placeholder="Yourr id ... " require="1"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="create" value="Submit"/></td>
                        </tr>
                    </table>
                </frieldset>
            </form>
            
        <?php }?>

        </div>
        <div class="sideright">
            <table class="tbl-one">
                <tr>
                    <th>NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>ID</th>
                    <th>Action</th>
                </tr>

                <?php
                    $i = 0;
                    foreach($user->readAll() as $key=>$value){
                        $i++;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['email'];?></td>
                    <td><?php echo $value['dep'];?></td>
                    <td><?php echo $value['roll'];?></td>
                    <td>
                        <?php echo "<a href='index.php?action=update&id=".$value['id']."'>Edit</a>" ?> |
                        <?php echo "<a href='index.php?action=delete&id=".$value['id']."' onClick='return confirm(\"Are you sure to Delete data?\")'>Delete</a>" ;?>
                    </td>
                </tr>
                <?php }?>
                
            </table>
        </div>
    </div>
<?php include 'lib/footer/footer.php'?>