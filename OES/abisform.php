
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <link rel="stylesheet" href="css/abisform.css">
</head>
<body>  
    <form id="form" action="results.html" method="POST"> 
        <div> 
            <label for="schoolyear">School Year</label>
            <input type="numeric" name="schoolyear">
        </div>
        <br>
        <div> 
            Grade level to Enroll
            <div required> 
                <label for ="grade11">Grade 11</label>
                <input type="radio" name="gradelevel" id="grade11" required>     
            </div>
            <div> 
                <label for ="grade12">Grade 12</label>
                <input type="radio" name="gradelevel" id="grade12" required>     
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
                <input type="radio" name="lrn" id="Ylrn">     
            </div>
            <div> 
                <label for ="Nlrn">No</label>
                <input type="radio" name="lrn" id="Nlrn">     
            </div>
            <br>
            2. Returning (Balik-Aral)
            <div> 
                <label for ="Yreturn">Yes</label>
                <input type="radio" name="return" id="Yreturn">     
            </div>
            <div> 
                <label for ="Nreturn">No</label>
                <input type="radio" name="return" id="Nreturn">     
            </div>

        </div>
        <br>
        <div> 
            <label for="PSA">PSA Birth Certificate No. (if available upon registration)</label>
            <input type="text" name="PSA">
            <br>
            <label for="LRN">Learner Reference No. (LRN)</label>
            <input type="text" name="LRN">
        </div>
        <br>
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname"> <br>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname"> <br>
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" id="mname"> <br>
            <label for="extname">Extension Name e.g. Jr., III (if applicable)</label>
            <input type="text" name="extname" id="extname">
        </div>
        <br>
        <div> 
            <label for="pob">Place of Birth(Municipality/City)</label>
            <textarea name="pob" id="pob"> </textarea>
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
            <input type="date" name="date" id="date">
        </div>
        <br>
        <div>
            Sex 
            <div> 
                <label for ="male">Male</label>
                <input type="radio" name="sex" id="male">     
            </div>
            <div> 
                <label for ="female">Female</label>
                <input type="radio" name="sex" id="female">     
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
                <input type="radio" name="IP" id="yIP">
                <label for ="nIP">No</label>
                <input type="radio" name="IP" id="nIP">
                <br>
                <label for="specify">If Yes, Please specify:</label>
                <input type="text" name="specify" id="specify">        
            </div>
        </div>
        <br>
        <div>
            Is your family a beneficiary of 4Ps? 
            <div> 
                <label for ="y4ps">Yes</label>
                <input type="radio" name="4Ps" id="y4Ps">
                <label for ="n4Ps">No</label>
                <input type="radio" name="4Ps" id="n4Ps">
                <br>
                <label for="idnum">If Yes, write the 4Ps Household ID Number below:</label>
                <input type="numeric" name="idnum" id="idnum">        
            </div> 
        </div>
        <br>
        <br>
        Current Address 
        <div> 
            <br>
            <label for="housenum">House No./Street</label>
            <input type="text" name="housenum" id="housenum">
            <label for="streetname">Street Name</label>
            <input type="text" name="street" id="street">
            <label for="barangay">Barangay</label>
            <input type="text" name="brgy" id="brgy">
        </div>
        <div> 
            <label for="municipality">Municipality/City</label>
            <input type="text" name="city" id="city">
            <label for="province">Province</label>
            <input type="text" name="prov" id="prov">
            <label for="country">Country</label>
            <input type="text" name="country" id="country">
            <label for="zipcode">Zip Code</label>
            <input type="numeric" name="zip" id="zip">
        </div>
        <br>
        Permanent Address <i>(Same with your current address?)</i>
                <label for ="Ycurrent">Yes</label>
                <input type="radio" name="addr" id="addr">
                <label for ="Ncurrent">No</label>
                <input type="radio" name="addr" id="addr"> 
        <div> 
            <br>
            <label for="housenum">House No./Street</label>
            <input type="text" name="housenum" id="housenum">
            <label for="streetname">Street Name</label>
            <input type="text" name="street" id="street">
            <label for="barangay">Barangay</label>
            <input type="text" name="brgy" id="brgy">
        </div>
        <div> 
            <label for="municipality">Municipality/City</label>
            <input type="text" name="city" id="city">
            <label for="province">Province</label>
            <input type="text" name="prov" id="prov">
            <label for="country">Country</label>
            <input type="text" name="country" id="country">
            <label for="zipcode">Zip Code</label>
            <input type="numeric" name="zip" id="zip">
        </div>  
        <br>

        <p><b> PARENT'S/GUARDIAN'S INFORMATION </b></p>
        Father's Name          
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" id="mname">
            <label for="contact">Contact Number</label>
            <input type="numeric" name="contact" id="contact">
        </div>
        <br>
        Mother's Maiden Name          
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" id="mname">
            <label for="contact">Contact Number</label>
            <input type="numeric" name="contact" id="contact">
        </div>
        <br>
        Guardian's Name          
        <div> 
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname">
            <label for="mname">Middle Name</label>
            <input type="text" name="mname" id="mname">
            <label for="contact">Contact Number</label>
            <input type="numeric" name="contact" id="contact">
        </div>
        <br>
        
        <p><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>

        <div> 
            <label for="lastgrd">Last Grade Level Completed</label>
            <input type="text" name="lastgrd" id="lastgrd">
            <label for="lastSY">Last School Year Completed</label>
            <input type="text" name="lastSY" id="lastSY">                 
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
            <input type="radio" name="first" id="first">
            <label for ="secondsem">2nd Sem</label>
            <input type="radio" name="second" id="second">                          
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
            <input type="checkbox" name="modularp" id="modularp">
            <br>
            <label for="online">Online</label>
            <input type="checkbox" name="online" id="online">
            <br>
            <label for="radio">Radio-Based Instruction</label>
            <input type="checkbox" name="radio" id="radio">
            <br>
            <label for="blended">Blended</label>
            <input type="checkbox" name="blended" id="blended">
            <br>
            <label for="modulard">Modular(Digital)</label>
            <input type="checkbox" name="modulard" id="modulard">
            <br>
            <label for="educationtv">Educational Television</label>
            <input type="checkbox" name="educationtv" id="educationtv">
            <br>
            <label for="homeschooling">Homeschooling</label>
            <input type="checkbox" name="homeschooling" id="homeschooling">
            <br>
            <label for="facetoface">Face to Face</label>
            <input type="checkbox" name="facetoface" id="facetoface">
        </div>
            
        <br>
        <button>Submit</button>
        











    </form>
    

</body>
