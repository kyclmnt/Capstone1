<?php
require "./template/constants.php";
require "./db/conn.php";
require "./template/head.php";


load_header("Abis Form", ["header","abisform", "footer"], [""]);
?>
    <main>
        <form action="./abisform.php" method="POST"> 
        <hr class="h">
        <div class="main">
        <div class="head">
            <img src="./assets/images/DEPED.png" alt="" style="width:65px;height:65px !important";>
            <p>Enhance Basic Education Enrollment Form</p>
        </div>
            
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
                
                <p class="instruction"><b>Instructions</b></p>
                    <p class="instr"><i>Print legibly all information in <b>CAPITAL letters.</b> Submit accomplished form to the Person-in-Charge/Registrar/Class Adviser</i></p>
    
                <br>
                <br>

                <hr class="g">
                <p class="learner"><b>LEARNER INFORMATION</b></p>
                <hr class="i">
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
                    <input type="radio" name="IP" id="yIP" value="yes">
                    <label for ="yIP">Yes</label>
                    <input type="radio"  name="IP" id="nIP" value="no">
                    <label for ="nIP">No</label> 
                </div> 
                <br>
                <div class="specify">
                    <label for="specify">If Yes, Please specify:</label>
                    <input type="text" class="spec" name="specify" id="specify">        
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
                <hr class="j">
                <p class="address"><b>Current Address</b></p>
                <hr class="k">
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
                <br>
                
                <br>
                <hr class="l">
                <p class="parent"><b> PARENT'S/GUARDIAN'S INFORMATION </b></p>
                <hr class="p">
                <div class="faname">
                    <p class="name">Father's Name</p>
                    <input type="text" name="lname" id="lname" placeholder="Last Name"  />
                    <input type="text" name="fname" id="fname" placeholder="First Name"  />
                    <input type="text" name="mname" id="mname" placeholder="Middle Name"  />
                    <label for="contact">Contact Number</label>
                    <input type="numeric" name="contact" id="contact">
                </div>
                
                <div id="moname">
                    <p class="name">Mother's Maiden  Name</p>
                    <input type="text" name="lname" id="lname" placeholder="Last Name"  />
                    <input type="text" name="fname" id="fname" placeholder="First Name"  />
                    <input type="text" name="mname" id="mname" placeholder="Middle Name"  />
                    <label for="contact">Contact Number</label>
                    <input type="numeric" name="contact" id="contact">
                </div>
                
                <div id="gname">
                    <p class="name">Guardian's Name</p>
                    <input type="text" class="plname" name="lname" id="lname" placeholder="Last Name"  />
                    <input type="text" class="pfname" name="fname" id="fname" placeholder="First Name"  />
                    <input type="text" class="pmname" name="mname" id="mname" placeholder="Middle Initial" />
                    <label for="contact">Contact Number</label>
                    <input type="numeric" name="contact" id="contact"  />
                </div>
                <br>
                <br>
                <hr class="q">
                <p class="lastgrd"><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>
                <hr class="r">
                <br>
                <label for="lastgrd">Last Grade Level Completed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="lastgrd" id="lastgrd">
                <label for="lastSY">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last School Year Completed</label>
                <input type="text" name="lastSY" id="lastSY">
                <br>
                <br>
                <label for="lastschool">Last School Attended&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="lastschool" id="lastschool"> 
                <label for="schoolid">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;School ID</label>
                <input type="numeric" name="schoolid" id="schoolid">
                <br>
                <br>
                <hr class="s">
                <p class="shs"><b>For Learners in Senior High School</b></p>
                <hr class="t">
                <br>
                <div >
                    <p class="semester">Semester</p>
                    <select class="sem">
                        <option>Choose an option</option>
                        <option name="first" id="first">1st Sem</option>
                        <option name="second" id="second">2nd Sem</option>
                    </select>

                <div class="track"> 
                    <label for="track">Track</label>
                    <input type="text" name="track" id="track">
                    <label for="strand">Strand</label>
                    <input type="text" name="strand" id="strand">            
                </div>
                </div>
                <hr class="u">
                <p class="pref"><b>Preferred Distance Learning Modality/ties</b></p>
                <hr class="v">
                <div class="choose">
                <i>Choose all that applies</i>
                </div>
                <div class="check">
                    <input type="checkbox" name="modularp" id="modularp">
                    <label for="modularp">Modular(Print)</label>
                    
                    <input type="checkbox" class="one" name="online" id="online">
                    <label for="online" class="one">Online</label>
                    
                    <input type="checkbox"  class="two" name="radio" id="radio">
                    <label for="radio" class="two">Radio-Based Instruction</label>
                    <br>
                    <input type="checkbox" name="blended" id="blended">
                    <label for="blended">Blended</label>
                    
                    <input type="checkbox" class="three" name="modulard" id="modulard">
                    <label for="modulard" class="three">Modular(Digital)</label>
                    
                    <input type="checkbox"  class="four" name="educationtv" id="educationtv">
                    <label for="educationtv" class="four">Educational Television</label>
                    <br>
                    <input type="checkbox" name="homeschooling" id="homeschooling">
                    <label for="homeschooling">Homeschooling</label>
                    
                    <input type="checkbox"  class="five" name="facetoface" id="facetoface">
                    <label for="facetoface" class="five">Face to Face</label>
                </div>
                <br>
                <br>
                <br>
                <p class="pledge"><i>      I hereby certify that the above information given are true and 
                    correct to the best of my knowledge and I  allow the Department of Education to 
                    use my child's details to create and/or update his/her profile in the Learner Information System. 
                    The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.</i></p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <button class="button" name="submit" type="submit">Submit</button>
            
        </div>
        </div>
        </form>
    </main>

    <script>
        $("header").addClass("hide");
    </script>

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

