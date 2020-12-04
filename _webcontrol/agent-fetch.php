<?php
session_start();
require("../conn.php");
$out='';
if(isset($_POST['search']) AND $_POST['search']=='Fetch'){
    $id = $conn->real_escape_string($_POST['id']);
    $sql=$conn->query("SELECT * FROM _security WHERE drank='agent' AND dlocation='$id'");
    if($sql->num_rows>0){
        $out .='
        <div class="form-group">
                <label for="agent">Choose Agent</label>
                    <select name="agent" id="agent" required class="form-control form-control-sm">
                    <option value="">Choose agent </option>';
        while($ram=$sql->fetch_assoc()):
            $out .='<option value="'.$ram['userid'].'">'.$ram['uname'].'</option>';
        endwhile;
        $out .=' </select>
                
        </div>';
    }

    echo $out;
}else if(isset($_POST['search']) AND $_POST['search']=='FetchOrder'){
    $id = $conn->real_escape_string($_POST['id']);
    $sql=$conn->query("SELECT * FROM login INNER JOIN dcart ON dcart.userid=login.userid WHERE  dcart.dorder_status='confirmed' AND dcart. dlocation='$id' OR dcart.dorder_status='dispatched' AND dcart. dlocation='$id' ORDER BY dcart.id DESC");
    if($sql->num_rows>0){
        
        while($row=$sql->fetch_assoc()):
            $out .='<tr>
            <td>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input checkMe" name="works['. $row['id'].']" value="'. $row['id'].'" id="customCheck'. $row['id'].'">
                  <label class="custom-control-label" for="customCheck'. $row['id'].'">Check this</label>
                </div>              
            </td>
            <td>'.$row['dcompany'].'</td>
            <td>'.$row['dname'].'</td>
            <td>'.number_format($row['dtotal']).'</td>
            <td>'. $row['dpayment_status'].'</td>                      
            <td>'. $row['dorder_status'].'</td>
            <td>'.$row['created_date'].'</td>
            
            </td>
          </tr>';
        endwhile;         
    }

    echo $out;
}