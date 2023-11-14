<?php
require "../template/constants.php";
require "../db/conn.php";
require "./generate_pdf.php";

$radio_inputs = ["withlrn"];
$inputs_to_be_split = ["from", "to", "gradelevel","lrn", "lastname", "firstname", "middlename", "extname", "4psID","birthdate", "schoolid"];
$data = array();

$sql_data = "";
foreach ($_POST as $key => $val) {
    if (!empty(trim($val)) && $key != "submit") {
        if (!empty($sql_data)) $sql_data .= ",";
        $sql_data .= "`" . $key . "`=\"" . $val . "\"";
    }

    // Adding data to be dislplayed in pdf
    if(in_array($key, $inputs_to_be_split)) : // explode other data in $_POST for individual letter display in pdf
        if($key == "birthdate") :
            $date_nums = array_reverse(explode("-",$val));
            $val = implode("",$date_nums);
        endif;

        $sub_keys = str_split($val);

        for($i = 0; $i < count($sub_keys); $i++) {
            $data["{$key}_{$i}"] = $sub_keys[$i];
        }
    elseif(in_array($key, $radio_inputs)):
        $data["{$key}_{$val}"] = true;
        // echo "{$key}_{$val}";
    else:
        if($key!="submit" && !empty(trim($val))) $data["{$key}"] = $val;
    endif;
}

$conn->begin_transaction();

try {
    $sql = "INSERT INTO tb_form SET {$sql_data}";
    $conn->query($sql);
    $conn->commit();

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