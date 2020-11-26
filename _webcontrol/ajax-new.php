<?php
require '../conn.php';

if($_SERVER['REQUEST_METHOD']=="POST"){

    $id = $conn->real_escape_string($_POST['id']);
    function sendUpdate($status, $id){
        GLOBAL $conn;
        $conn->query("UPDATE _security SET dstatus='$status' WHERE userid='$id'");
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="approveStore"){
        $conn->query("UPDATE _security SET status='offline' WHERE userid='$id'");
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="storeUn"){
        // $conn->query("UPDATE _security SET dstatus='unban' WHERE userid='$id'");
        sendUpdate('unban', $id);
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="storeBan"){
        // $conn->query("UPDATE _security SET dstatus='ban' WHERE userid='$id'");
        sendUpdate('ban', $id);
    }

    if(isset($_POST['Message']) AND $_POST['Message']=="storeDel"){
        $conn->query("DELETE FROM _security WHERE userid='$id'");
    }
}


