<?php 
require 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="eform.css">
</head>
<body>  
    <form action="./abisform.php" method="POST"> 
        <div> 
            <label for="schoolyear">School Year</label>
            <input type="numeric" name="schoolyear">
        </div>
        <br>
        <div> 
            Grade level to Enroll
            <div required> 
                <label for ="grade11">Grade 11</label>
                <input type="radio" name="gradelevel" id="grade11" value="11" required>     
            </div>
            <div> 
                <label for ="grade12">Grade 12</label>
                <input type="radio" name="gradelevel" id="grade12" value="12" required>     
            </div>
        </div>
        <br>
        <div> 
            Check the approriate box only
            <br>
            <br>
            1. With LRN?
            <div> 
                <label for ="Ylrn">Yes</label>
                <input type="radio" name="withlrn" id="Ylrn" value="yes">     
            </div>
            <div> 
                <label for ="Nlrn">No</label>
                <input type="radio" name="withlrn" id="Nlrn" value="no">     
            </div>
            <br>
            2. Returning (Balik-Aral)
            <div> 
                <label for ="Yreturn">Yes</label>
                <input type="radio" name="returning" id="Yreturn" value="yes">     
            </div>
            <div> 
                <label for ="Nreturn">No</label>
                <input type="radio" name="returning" id="Nreturn" value="no">     
            </div>

        </div>
        <br>
        <div> 
            <label for="PSA">PSA Birth Certificate No. (if available upon registration)</label>
            <input type="text" name="psa">
            <br>
            <label for="LRN">Learner Reference No. (LRN)</label>
            <input type="text" name="lrn">
        </div>
        <br>
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="lastname" id="lname"> <br>
            <label for="fname">First Name</label>
            <input type="text" name="firstname" id="fname"> <br>
            <label for="mname">Middle Name</label>
            <input type="text" name="middlename" id="mname"> <br>
            <label for="extname">Extension Name e.g. Jr., III (if applicable)</label>
            <input type="text" name="extname" id="extname">
        </div>
        <br>
        <div> 
            <label for="placeofbirth">Place of Birth(Municipality/City)</label>
            <textarea name="placeofbirth" id="placeofbirth"> </textarea>
        </div>
        <br>
        <div> 
            <label for="mothertongue">Mother Tongue</label>
            <input type="text" name="mothertongue" id="mothertongue">
        </div>
        <br>
        <div> 
            <label for="date">Birthdate (mm/dd/yyyy)</label>
            <br>
            <input type="date" name="birthdate" id="date">
        </div>
        <br>
        <div>
            Sex 
            <div> 
                <label for ="male">Male</label>
                <input type="radio" name="sex" id="male" value="M">     
            </div>
            <div> 
                <label for ="female">Female</label>
                <input type="radio" name="sex" id="female" value="F">     
            </div>
            <br>
            <div> 
                <label for="age">Age</label>
                <input type="number" name="age" id="age">
            </div>
        </div>
        <br>
        <div> 
            Belonging to any Indigenous Peoples (IP) Community/Indigenous Cultural Coummnity? 
            <div> 
                <label for ="yIP">Yes</label>
                <input type="radio" name="indegenous" id="yIP" value="yes">
                <label for ="nIP">No</label>
                <input type="radio" name="indegenous" id="nIP" value="no">
                <br>
                <label for="specify">If Yes, Please specify:</label>
                <input type="text" name="ipspecify" id="specify">        
            </div>
        </div>
        <br>
        <div>
            Is your family a beneficiary of 4Ps? 
            <div> 
                <label for ="y4ps">Yes</label>
                <input type="radio" name="4ps" id="y4Ps" value="yes">
                <label for ="n4Ps">No</label>
                <input type="radio" name="4ps" id="n4Ps" value="no">
                <br>
                <label for="idnum">If Yes, write the 4Ps Household ID Number below:</label>
                <input type="numeric" name="4psID" id="idnum">        
            </div> 
        </div>
        <br>
        <br>
        Current Address 
        <div> 
            <br>
            <label for="housenum">House No./Street</label>
            <input type="text" name="Chousenum" id="housenum">
            <label for="streetname">Street Name</label>
            <input type="text" name="Cstreet" id="street">
            <label for="barangay">Barangay</label>
            <input type="text" name="Cbrgy" id="brgy">
        </div>
        <div> 
            <label for="municipality">Municipality/City</label>
            <input type="text" name="Ccity" id="city">
            <label for="province">Province</label>
            <input type="text" name="Cprovince" id="prov">
            <label for="country">Country</label>
            <input type="text" name="Ccountry" id="country">
            <label for="zipcode">Zip Code</label>
            <input type="numeric" name="Czipcode" id="zip">
        </div>
        <br>
        Permanent Address <i>(Same with your current address?)</i>
                <label for ="Ycurrent">Yes</label>
                <input type="radio" name="perma" id="addr">
                <label for ="Ncurrent">No</label>
                <input type="radio" name="perma" id="addr"> 
        <div> 
            <br>
            <label for="housenum">House No./Street</label>
            <input type="text" name="Phousenum" id="housenum">
            <label for="streetname">Street Name</label>
            <input type="text" name="Pstreet" id="street">
            <label for="barangay">Barangay</label>
            <input type="text" name="Pbrgy" id="brgy">
        </div>
        <div> 
            <label for="municipality">Municipality/City</label>
            <input type="text" name="Pcity" id="city">
            <label for="province">Province</label>
            <input type="text" name="Pprovince" id="prov">
            <label for="country">Country</label>
            <input type="text" name="Pcountry" id="country">
            <label for="zipcode">Zip Code</label>
            <input type="numeric" name="Pzipcode" id="zip">
        </div>  
        <br>

        <p><b> PARENT'S/GUARDIAN'S INFORMATION </b></p>
        Father's Name          
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="Flastname" id="lname">
            <label for="fname">First Name</label>
            <input type="text" name="Ffirstname" id="fname">
            <label for="mname">Middle Name</label>
            <input type="text" name="Fmiddlename" id="mname">
            <label for="contact">Contact Number</label>
            <input type="numeric" name="Fcontact" id="contact">
        </div>
        <br>
        Mother's Maiden Name          
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="Mlastname" id="lname">
            <label for="fname">First Name</label>
            <input type="text" name="Mfirstname" id="fname">
            <label for="mname">Middle Name</label>
            <input type="text" name="Mmiddlename" id="mname">
            <label for="contact">Contact Number</label>
            <input type="numeric" name="Mcontact" id="contact">
        </div>
        <br>
        Guardian's Name          
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="Glastname" id="lname">
            <label for="fname">First Name</label>
            <input type="text" name="Gfirstname" id="fname">
            <label for="mname">Middle Name</label>
            <input type="text" name="Gmiddlename" id="mname">
            <label for="contact">Contact Number</label>
            <input type="numeric" name="Gcontact" id="contact">
        </div>
        <br>
        
        <p><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>

        <div> 
            <label for="lastgrd">Last Grade Level Completed</label>
            <input type="text" name="lastgrdlvl" id="lastgrd">
            <label for="lastSY">Last School Year Completed</label>
            <input type="text" name="lastschoolyr" id="lastSY">                 
        </div>
        <div> 
            <label for="lastschool">Last School Attended</label>
            <input type="text" name="lastschool" id="lastschool"> 
            <label for="schoolid">School ID</label>
            <input type="numeric" name="schoolid" id="schoolid">                         
        </div>
        <br>

        <p><b>For Learners in Senior High School</b></p>

        <div> 
            <label for="semester">Semester</label>
            <label for ="firstsem">1st Sem</label>
            <input type="radio" name="semester" id="first" value="1">
            <label for ="secondsem">2nd Sem</label>
            <input type="radio" name="semester" id="second" value="2">                          
        </div>
        <br>
        <div> 
            <label for="track">Track</label>
            <input type="text" name="track" id="track">
            <label for="strand">Strand</label>
            <input type="text" name="strand" id="strand">            
        </div>
        <br>
        <p><b>Preferred Distance Learning Modality/ties</b></p>
        <i>Choose all that applies</i>
        <div> 
            <label for="modularp">Modular(Print)</label>
            <input type="checkbox" name="modularprint" id="modularp" value="yes">
            <br>
            <label for="online">Online</label>
            <input type="checkbox" name="online" id="online" value="yes">
            <br>
            <label for="radio">Radio-Based Instruction</label>
            <input type="checkbox" name="radio" id="radio" value="yes">
            <br>
            <label for="blended">Blended</label>
            <input type="checkbox" name="blended" id="blended" value="yes">
            <br>
            <label for="modulard">Modular(Digital)</label>
            <input type="checkbox" name="modulardigital" id="modulard" value="yes">
            <br>
            <label for="educationtv">Educational Television</label>
            <input type="checkbox" name="eductv" id="educationtv" value="yes">
            <br>
            <label for="homeschooling">Homeschooling</label>
            <input type="checkbox" name="homeschool" id="homeschooling" value="yes">
            <br>
            <label for="facetoface">Face to Face</label>
            <input type="checkbox" name="facetoface" id="facetoface" value="yes">
        </div>
            
        <br>
        <button id="submit" type= "submit" name= "submit" value= "submit">Submit</button>
        
    </form>


</body>

<?php
if(isset($_POST["submit"])){
    $data = "";
    foreach($_POST as $k=>$v) {
        if(!empty(trim($v))&&$k!="submit"){
            if(!empty($data)) $data.=",";
            $data.= "`".$k."`=\"".$v."\"";
        }

    }

    if($conn==false){
        die(mysqli_connect_error());
    }
    $sql = "INSERT INTO tb_form SET {$data}"; 
    // echo $sql; die;
    if (mysqli_query($conn,$sql)) {
        echo "true";
        die;
        mysqli_close($conn);
    }
}

?>