<?php
if ($_SERVER['REQUEST_METHOD'] == "GET")  header("Location:../home.php");
require_once("../libs/fpdm/fpdm.php");

/**
 * This function will generate a pdf
 * @param String $filename
 * @param Array $fields
 * @return String filename
 */
function generatePDF($template, $fields): string
{   
    if(!is_dir("../files/enrollees-forms")) mkdir("../files/enrollees-forms");
    $filename = date("Y_d_i_s") . time() . ".pdf";

    $pdf = new FPDM($template);
    $pdf->useCheckboxParser = true; // Checkbox parsing is ignored (default FPDM behaviour) unless enabled with this setting
    $pdf->Load($fields);
    $pdf->Merge();
    $pdf->Output('F', "../files/enrollees-forms/$filename");
    return $filename;
}
