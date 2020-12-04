<?php
session_start();
require("../conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['save'])){
        $location = $conn->real_escape_string($_POST['location']);
        $agent = $conn->real_escape_string($_POST['agent']);
        $row = $conn->query("SELECT uname FROM _security WHERE userid='$agent'")->fetch_assoc();
        $name = $row['uname'];
        foreach ($_POST['works'] as $key => $result) {
            echo $result;
            $up = $conn->query("UPDATE dcart SET dagent_id='$agent', dagent_name='$name' WHERE id='$result'");            
        }
        if($up){
            $_SESSION['msgs']="Assigned successfully";
        }else{
            $_SESSION['msg']="Oops! try again later";
        }

        header("Location: assignment");
    }
}