<?php
require "../template/constants.php";
require "../db/conn.php";
require "./generate_pdf.php";

$checkboxes = ["modularprint", "online", "radio", "blended", "modulardigital", "eductv", "homeschool", ""];
$radio_inputs = ["withlrn", "returning", "perma", "indegenous", "4ps", "sex"];
$inputs_to_be_split = ["from", "to", "gradelevel","lrn", "lastname", "firstname", "middlename", "extname", "4psID","birthdate", "schoolid"];
$data = array();

$sql_data = "";
foreach ($_POST as $key => $val) {
    
    if (!empty(trim($val)) && $key != "submit") {
        if (!empty($sql_data)) $sql_data .= ",";
        $sql_data .= "`" . $key . "`=\"" . $val . "\"";
        
        
        // Adding data to be dislplayed in pdf
        if(in_array($key, $inputs_to_be_split)) : // explode other data in $_POST for individual letter display in pdf
            if($key == "birthdate") :
                $date_nums = array_reverse(explode("-",$val));
                $val = implode("",$date_nums);
            endif;
    
            $sub_keys = str_split(strtoupper($val));
    
            for($i = 0; $i < count($sub_keys); $i++) {
                $data["{$key}_{$i}"] = $sub_keys[$i];
                
            }
        elseif(in_array($key, $radio_inputs)):
            $key == "sex" ? $data["{$key}_".($val == "M" ? "male" : "female").""] = "X" : $data["{$key}_{$val}"] = "X";
            // echo "{$key}_{$val}";
        else:
            $data["{$key}"] = in_array($key, $checkboxes) ? "X"  : strtoupper($val);
             
        endif;
    }
    
}



$conn->begin_transaction();

try {
    $sql = "INSERT INTO tb_form SET {$sql_data}";
    $conn->query($sql);
    $conn->commit();


    $data['currentdate'] = date("m/d/Y");
    $filename = generatePDF('../files/pdf-template/enrollment-form-template.pdf', $data);

    echo json_encode(['result'=>['status'=>"success", 'message' => 'Inserted successfully!!', 'filename' => $filename]]);
} 
catch(mysqli_sql_exception $sql_exception) {
    $conn->rollback();
    echo json_encode(['result'=>['status'=>"error", 'message' => mysqli_error($conn)]]);
    die();
} 
catch (Error $e) {
    echo json_encode(['result'=>['status'=>'error', 'message'=>$e->getMessage()]]);
    die();
}


?>