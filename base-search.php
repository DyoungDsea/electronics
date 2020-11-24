<?php

require("conn.php");
$out ='';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['search']) AND $_POST['search']=="fetch"){
       $search = $conn->real_escape_string($_POST['id']);

       $sql = $conn->query("SELECT * FROM products WHERE dpname LIKE '%$search%' OR dcategory LIKE '%$search%' OR dsub_cat LIKE '%$search%' OR dbrand LIKE '%$search%' OR dpdesc LIKE '%$search%' OR dldesc LIKE '%$search%' OR dspec LIKE '%$search%' ORDER BY RAND() LIMIT 10");
       if($sql->num_rows>0){
           while($row=$sql->fetch_assoc()):
            $out .= '<a class="suggestions__item suggestions__product" style="display:block;" href="shop-list?search='.urlencode($row['dpname']).'">
                        <div class="suggestions__product-info">
                            <div class="suggestions__product-name">'.$row['dpname'].'</div>
                        </div>
                    </a>';

           endwhile;
       }
    }

    echo $out;
}