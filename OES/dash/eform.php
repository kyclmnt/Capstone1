<?php
require 'conn.php';
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Enrollment Form</title>
    </head>
<link rel="stylesheet" type="text/css"  href="eform.css">
<body>
    <hr class="h">
    <div class="main">
    <div class="head"><p>Enhance Basic Education Enrollment Form</p></div>
        <form id="form" action="./abisform.php" method="POST"> 
            <div>
                <p class="year">School Year</p>
                <input type="numeric" class="schoolyear" name="schoolyear" required />
            </div>
            
            <p class="grade">Grade Level to Enroll</p>
            <div required>
            <select class="gradelevel">
                <option>Choose an option</option>
                <option id="grade11" value="grade11">Grade 11</option>
                <option id="grade12" value="grade12">Grade 12</option>
            </select>
            </div>
            <br>
            <div class="box">
            <b>Check the Appropriate Box Only</b>

            <div class="lrn">
            <p>1. With LRN?</p>
                <input type="radio" class="Ylrn" name="lrn" id="Ylrn" value="yes">
                <label for ="Ylrn">Yes</label>     
            <br>
                <input type="radio" class="Ylrn" name="lrn" id="Nlrn"  value="no">
                <label for ="Nlrn">No</label>    
            </div>

            <div class="return">
            <p>2. Returning (Balik Aral)</p>
                <input type="radio" class="Yreturn" name="return" id="Yreturn" value="yes">    
                <label for ="Yreturn">Yes</label>
            <br>
                <input type="radio" class="Yreturn" name="return" id="Nreturn" value="no">    
                <label for ="Nreturn">No</label>
            </div>
            </div>
            <br>
            <br>
            <p class="PSA">PSA Birth Certificate No. (if available upon registration)</p>
            <input type="numeric" class="PSANo" name="PSA">
            <p class="LRN">Learner Reference No. (LRN)</p>
            <input type="numeric" class="LRNNo" name="LRN" minlength="12"  />
            <br>
            <div id="name">
                <p class="name">Full Name</p>
                <input type="text" class="lname" name="lastname" id="lname" placeholder="Last Name" />
                <input type="text" class="fname" name="firstname" id="fname" placeholder="First Name" />
                <input type="text" class="mname" name="middlename" id="mname" placeholder="Middle Initial">
                <input type="text" class="extname" name="extname" id="extname" placeholder="Extension Name e.g. Jr., III (if applicable)">
            </div>
            
            <p class="pob">Place of Birth</p>
            <input type="text" class="place" name="placeofbirth" id="placeofbirth">
            <p class="mothertounge">Mother Tounge</p>
            <input type="text" class="c" name="mothertongue" id="mothertongue">
            
            <p class="date">Birthdate (dd/mm/yyyy)</p>
            <input type="date" class="d" name="date" id="date"  />
            
            <p class="sex">Sex</p>
            <select class="sx">
                <option>Choose an option</option>
                <option name="sex" id="male" value="M">Male</option>
                <option name="sex" id="female" value="F">Female</option>
            </select>

            <p class="age">Age</p>
            <input type="number" class="a" name="age" id="age">

            <div class="indi">
            <p>Belonging to any Indigenous Peoples (IP) Community/Indigenous Cultural Community?</p>
            </div>
            <div class="ip">
                <input type="radio" name="indegenous" id="yIP" value="yes">
                <label for ="yIP">Yes</label>
                <input type="radio"  name="indegenous" id="nIP" value="no">
                <label for ="nIP">No</label> 
            </div> 
            <br>
            <div class="specify">
                <label for="specify">If Yes, Please specify:</label>
                <input type="text" class="spec" name="ipspecify" id="specify">        
            </div>

            <p class="4Ps">Is your family a beneficiary of 4Ps?</p>
            <div class="y4Ps">
            <input type="radio" name="4Ps" id="y4Ps" value="yes">
            <label for ="y4ps">Yes</label>
            <input type="radio" name="4Ps" id="n4Ps" value="no">
            <label for ="n4Ps">No</label>
            </div>
            <br>
            <label for="idnum">If Yes, write the 4Ps Household ID Number below:</label>
            <input type="numeric" name="4psID" id="idnum">

            <br>
            <br>
            <br>
            <p class="address"><b>Current Address</b></p>
            <br>
            <div class="housenum">
            <label for="housenum">House No./Street</label>
            <input type="text" name="housenum" id="housenum"  />
            <label for="streetname">Street Name</label>
            <input type="text" name="street" id="street"  />
            <label for="barangay">Barangay</label>
            <input type="text" name="brgy" id="brgy"  />
            </div>
            <br>
            <label for="municipality">Municipality/City</label>
            <input type="text" name="city" id="city"  />
            <label for="province">Province</label>
            <input type="text" name="prov" id="prov">
            <label for="country">Country</label>
            <input type="text" name="country" id="country"  />
            <br>
            <br>
            <div class="zipcode">
            <label for="zipcode">Zip Code</label>
            <input type="numeric" name="zip" id="zip"  />
            </div>
            <br>
            <br>
            <p class="addr"><b>Permanent Address </b><i>(Same with your current address?)</i></p>
                <input type="radio" class="ycur" name="addr" id="addr">
                <label for ="Ycurrent">Yes</label>
                <input type="radio" class="ycur" name="addr" id="addr">
                <label for ="Ncurrent">No</label>
                <br>
            <br>
            <!--Dapat di na to pwede mafill up-an kapag yes ang sinelect sa permanent add-->
            <div class="housenum">
            <label for="housenum">House No./Street</label>
            <input type="text" name="housenum" id="housenum">
            <label for="streetname">Street Name</label>
            <input type="text" name="street" id="street">
            <label for="barangay">Barangay</label>
            <input type="text" name="brgy" id="brgy">
            </div>
            <br>
            <label for="municipality">Municipality/City</label>
            <input type="text" name="city" id="city">
            <label for="province">Province</label>
            <input type="text" name="prov" id="prov">
            <label for="country">Country</label>
            <input type="text" name="country" id="country">
            <br>
            <br>
            <label for="zipcode">Zip Code</label>
            <input type="numeric" name="zip" id="zip">
            <br>
            <div id="gname">
                <p class="name">Guardian's Name</p>
                <input type="text" class="plname" name="" placeholder="Last Name"  />
                <input type="text" class="pfname" name="" id="fname" placeholder="First Name"  />
                <input type="text" class="pmname" name="" id="mname" placeholder="Middle Initial">
                <br>
                <label for="contact">Contact Number</label>
                <input type="numeric" name="contact" id="contact"  />
            </div>
            <br>
            <br>
            <p class="lastgrd"><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>
            <br>
            <label for="lastgrd">Last Grade Level Completed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="lastgrd" id="lastgrd">
            <label for="lastSY">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last School Year Completed</label>
            <input type="text" name="lastSY" id="lastSY">
            <br>
            <br>
            <label for="lastschool">Last School Attended&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="lastschool" id="lastschool"> 
            <label for="schoolid">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School ID</label>
            <input type="numeric" name="schoolid" id="schoolid">
            <br>
            <br>
            <p class="shs"><b>For Learners in Senior High School</b></p>
            <br>
            <div >
                <p class="semester">Semester</p>
                <select class="sem">
                    <option>Choose an option</option>
                    <option>1st Sem</option>
                    <option>2nd Sem</option>
                </select>

                
                <p class="track">Track</p>
                    <select class="tr">
                        <option>Choose an option</option>
                        <option>Academic</option>
                        <option>TVL</option>
                    </select>
                
                <p class="strand">Strand</p>
                    <select class="str">
                        <option>Choose an option</option>
                        <option>Accountancy, Business and Management</option>
                        <option>Cookery, Housekeeping and Food and Beverage Services</option>
                        <option>Technical Drafting and Illustration</option>
                        <option>Computer Systems Servicing</option>
                </select>
            </div>
            <br>
            <p class="pref"><b>Preferred Distance Learning Modality/ties</b></p>
            <br>
            <div class="choose">
            <i>Choose all that applies</i>
            </div>
            <div class="check">
                <input type="checkbox" name="modularp" id="modularp">
                <label for="modularp">Modular(Print)</label>
                <br>
                <input type="checkbox" name="online" id="online">
                <label for="online">Online</label>
                <br>
                <input type="checkbox" name="radio" id="radio">
                <label for="radio">Radio-Based Instruction</label>
                <br>
                <input type="checkbox" name="blended" id="blended">
                <label for="blended">Blended</label>
                <br>
                <input type="checkbox" name="modulard" id="modulard">
                <label for="modulard">Modular(Digital)</label>
                <br>
                <input type="checkbox" name="educationtv" id="educationtv">
                <label for="educationtv">Educational Television</label>
                <br>
                <input type="checkbox" name="homeschooling" id="homeschooling">
                <label for="homeschooling">Homeschooling</label>
                <br>
                <input type="checkbox" name="facetoface" id="facetoface">
                <label for="facetoface">Face to Face</label>
            </div>
            <br>
            <button class="button">Submit</button>
        </form>
    </div>
    </div>
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

</html>