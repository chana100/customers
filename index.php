<?php
error_reporting(E_ALL ^ E_NOTICE);

$mysqli = connectToDB();

if($mysqli){
    $customerList = getList($mysqli);
}

$action = $_POST['action'];

if($action=='insertRow'){
    $res= insertRow($mysqli,$_POST);
    print_r($res);
    exit;
}
if($action=='getList'){
    $customerList = getList($mysqli);
    echo $customerList;
    exit;   
}
if($action=='getRowData'){
    $customerData = getCustomerData($mysqli,$_POST['item_id']);
    echo json_encode(array(
        "customerData" => $customerData
    ));
    exit;   
}
if($action=='updateRow'){
    $res= updateRow($mysqli,$_POST);
    print_r($res);
    exit;
}
if($action=='deleteRow'){
    $res= deleteRow($mysqli,$_POST['item_id']);
    print_r($res);
    exit;
}



function connectToDB(){
    $mysqli = @new mysqli('localhost', 'root', '', 'customers');
    $mysqli->set_charset("utf8mb4");
    if (mysqli_connect_errno()) {
        $result->error = 'Connection failed: '.mysqli_connect_error();
        print_r($result);
    }
    else{
        return $mysqli;
    }

}

function getList($mysqli){
    $sql = "SELECT customer_list_tbl.* ,gender_tbl.type_name
            FROM customer_list_tbl 
            join gender_tbl on customer_list_tbl.gender_id = gender_tbl.id";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        $customerList =array();
        for ($x = 0; $x < $result->num_rows; $x++){
            $row = mysqli_fetch_assoc($result);
            $customerList[]=$row;
        }
        $trHtml='';
        foreach ($customerList as $val) {
            $trHtml.= '<tr>
                        <td>'.$val["id"].'</td>
                        <td>'.$val["id_number"].'</td>
                        <td>'.$val["first_name"].' '.$val["last_name"].'</td>
                        <td>'.$val["dob"].'</td>
                        <td>'.$val["type_name"].'</td>
                        <td>'.$val["phone"].'</td>
                        <td>
                            <button data-c-id="'.$val["id"].'" type="button" class="btn btn-info edit">EDIT</button>
                            <button data-c-id="'.$val["id"].'" type="button" class="btn btn-danger del">DEL</button>
                        </td>
                      </tr>';
        }
        return $trHtml;
    } 
    else {
        echo "NO RESULT";
    }
}

function insertRow($mysqli,$data){
   $sql = "INSERT INTO customer_list_tbl (id_number, first_name, last_name, dob, gender_id,phone)
    VALUES (".$data['id_number'].",'".$data['first_name']."','".$data['last_name']."','".$data['dob']."',".$data['gender_id'].", ".$data['phone'].")";
    $result = mysqli_query($mysqli, $sql);
    return $mysqli->affected_rows;
}

function getCustomerData($mysqli,$item_id){
    $sql = "SELECT *
            FROM customer_list_tbl
            where id=".$item_id;
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    else{
        return 'err';
    }
}

function updateRow($mysqli,$data){
    $sql = "UPDATE customer_list_tbl
    SET id_number=".$data['id_number'].", first_name='".$data['first_name']."', last_name='".$data['last_name']."', dob='".$data['dob']."', gender_id=".$data['gender_id'].",phone=".$data['phone']."
    WHERE id=".$data['item_id'];
    $result = mysqli_query($mysqli, $sql);
    return $mysqli->affected_rows;
}

function deleteRow($mysqli,$item_id){
    $sql = "DELETE FROM customer_list_tbl
            WHERE id=".$item_id;
    $result = mysqli_query($mysqli, $sql);
    return $mysqli->affected_rows;
} 