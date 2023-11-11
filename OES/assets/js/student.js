$(document).ready(()=>{
    $("header a.nav-link").each(function(i){
        $(this).removeClass("active");
    })

    $("a#students").addClass('active');

    loadData(base_url + "api/enrollees.php", $("#table"), ()=>$("#table").DataTable().column(0).visible(role === "A" ? 0 : 1));
    
    onSubmit();
})

async function loadData(url = null, table = null, callback = null) {
    if(!url) return;
    
    if ($.fn.DataTable.isDataTable( "#" + table.attr("id") ) ) {
        $("#" + table.attr("id")).DataTable().destroy();
        $("#" + table.attr("id") + " tbody").remove();
    }
    table.html('');
    await fetch(url)
    .then(response=>response.json())
    .then(data=>{
        
        let thead = `
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th style="text-align:center;">
                    Name
                </th>
                <th>
                    Strand / Course
                </th>
                <th>
                    Grade
                </th>
            </tr>
        </thead>
        `;
        const students = data.data;
        let tbody = table.html();
        tbody += "<tbody>";
        for(let student of students){
            tbody += "<tr>";
            tbody += `<td>${role === "A" ? `<input type="checkbox" id="stud_id_${student['id']}" value="${student['id']}" name="stud_id[]">` : ""} 
                            <label for="stud_id_${student['id']}">${student['id'].padStart(6,"0")}</label>
                        </td>`;
            tbody += `<td class='text-center' ${role === 'A' ? `onclick='viewRecord(${student['id']})'` : ''} ><span class=${role === "A" ? `'primary text-underline cursor-pointer'` : ""}>${student['name']}</span></td>`;
            tbody += `<td>${student['strand']}</td>`;
            tbody += `<td>${student['gradelevel']}</td>`;
            tbody += "</tr>";
        }

        tbody += "</tbody>";
        table.html(thead + tbody);
        $("#" + table.attr("id")).dataTable();
        
        if(callback) callback();
        
    })
    .catch(error=>{
        console.log(error);
    })
}

function toggle_inputs() {
    $("#btn-edit").toggleClass("hide");
    $("#btn-save").toggleClass("hide");
    $("#btn-cancel").toggleClass("hide");
    $("#form-body input").toggleClass("hide");
    $("#form-body section div div").toggleClass("hide");
    $("#form-body section > div span:nth-child(2)").toggleClass("hide");
}

function onSubmit() {
    document.getElementById("form-container").addEventListener("submit", (e)=>{
        e.preventDefault();

        const form = new FormData(document.getElementById("form-container"));

        fetch(base_url + "api/update_enrollee.php", {
            method : "post",
            body : form
        })
        .then(resp=>resp.json())
        .then(data=>{
            const result = data.result;
            console.log(result);
            alert(result.status)
            window.location.reload();
            })

    });
}

function viewRecord(record_id){
    $("#view-students").addClass("hide");
    const form = new FormData();
    form.append("id", record_id);     
    fetch(base_url + "api/enrollees.php", {
        method : "post",
        body : form
    })
    .then(response=>response.json())
    .then(data=>{
        const student = data.data[0];
        console.log(student);
        const form_content = `
        <hr class="h">
        <div class="main">
        <div class="head">
            <img src="./assets/images/DEPED.png" alt="" style="width:65px;height:65px !important";>
            <p>Enhance Basic Education Enrollment Form</p>
        </div>
            
                <div>
                    <p class="year">School Year</p>
                    <input type="numeric" class="schoolyear" name="schoolyear" value='${student["schoolyear"]??""}' required />
                </div>
                
                <p class="grade">Grade Level to Enroll</p>
                <div required>
                <select class="gradelevel">
                    <option>Choose an option</option>
                    <option id="grade11" ${student["gradelevel"] == "11" ? "selected" : null} name="gradelevel" value="11">Grade 11</option>
                    <option id="grade12" ${student["gradelevel"] == "12" ? "selected" : null} name="gradelevel" value="12">Grade 12</option>
                </select>
                </div>
                <br>
                <div class="box">
                <b>Check the Appropriate Box Only</b>

                <div class="lrn">
                <p>1. With LRN?</p>
                    <input type="radio" class="Ylrn" ${student['withlrn'] == "yes" ? "checked" : ""} name="withlrn" id="Ylrn" value="yes">
                    <label for ="Ylrn">Yes</label>     
                <br>
                    <input type="radio" class="Ylrn" ${student['withlrn'] == "no" ? "checked" : ""} name="withlrn" id="Nlrn"  value="no">
                    <label for ="Nlrn">No</label>    
                </div>

                <div class="return">
                <p>2. Returning (Balik Aral)</p>
                    <input type="radio" ${student['returning'] == "yes" ? "checked" : ""} class="Yreturn" name="returning" id="Yreturn" value="yes">    
                    <label for ="Yreturn">Yes</label>
                <br>
                    <input type="radio" ${student['returning'] == "no" ? "checked" : ""} class="Yreturn" name="returning" id="Nreturn" value="no">    
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
                <input type="numeric" class="PSANo" name="psa" value='${student['psa']}'>
                <p class="LRN">Learner Reference No. (LRN)</p>
                <input type="numeric" class="LRNNo" name="lrn" minlength="12" value='${student['lrn']}' />
    
                <br>
                <div id="name">
                    <p class="name">Full Name</p>
                    <input type="text" class="lname" name="lastname" id="lname" placeholder="Last Name" value='${student['lastname']}' />
                    <input type="text" class="fname" name="firstname" id="fname" placeholder="First Name"  value='${student['firstname']}'/>
                    <input type="text" class="mname" name="middlename" id="mname" placeholder="Middle Initial"  value='${student['middlename']}'>
                    <input type="text" class="extname" name="extname" id="extname" placeholder="Extension Name e.g. Jr., III (if applicable)">
                </div>
                
                <p class="pob">Place of Birth</p>
                <input type="text" class="place" name="placeofbirth" id="placeofbirth">
                <p class="mothertounge">Mother Tounge</p>
                <input type="text" class="c" name="mothertongue" id="mothertongue">
                
                <p class="date">Birthdate (dd/mm/yyyy)</p>
                <input type="date" class="d" name="birthdate" id="date"  />
                
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
                <input type="radio" name="4ps" id="y4Ps" value="yes">
                <label for ="y4ps">Yes</label>
                <input type="radio" name="4ps" id="n4Ps" value="no">
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
                <input type="text" name="Chousenum" id="housenum"  />
                <label for="streetname">Street Name</label>
                <input type="text" name="Cstreet" id="street"  />
                <label for="barangay">Barangay</label>
                <input type="text" name="Cbrgy" id="brgy"  />
                </div>
                <br>
                <label for="municipality">Municipality/City</label>
                <input type="text" name="Ccity" id="city"  />
                <label for="province">Province</label>
                <input type="text" name="Cprovince" id="prov">
                <label for="country">Country</label>
                <input type="text" name="Ccountry" id="country"  />
                <br>
                <br>
                <div class="zipcode">
                <label for="zipcode">Zip Code</label>
                <input type="numeric" name="Czipcode" id="zip"  />
                </div>
                <br>
                <br>
                <p class="addr"><b>Permanent Address </b><i>(Same with your current address?)</i></p>
                    <input type="radio" class="ycur" name="perma" id="addr">
                    <label for ="Ycurrent">Yes</label>
                    <input type="radio" class="ycur" name="perma" id="addr">
                    <label for ="Ncurrent">No</label>
                    <br>
                <br>
                <!--Dapat di na to pwede mafill up-an kapag yes ang sinelect sa permanent add-->
                <div class="housenum">
                <label for="housenum">House No./Street</label>
                <input type="text" name="Phousenum" id="housenum">
                <label for="streetname">Street Name</label>
                <input type="text" name="Pstreet" id="street">
                <label for="barangay">Barangay</label>
                <input type="text" name="Pbrgy" id="brgy">
                </div>
                <br>
                <label for="municipality">Municipality/City</label>
                <input type="text" name="Pcity" id="city">
                <label for="province">Province</label>
                <input type="text" name="Pprovince" id="prov">
                <label for="country">Country</label>
                <input type="text" name="Pcountry" id="country">
                <br>
                <br>
                <label for="zipcode">Zip Code</label>
                <input type="numeric" name="Pzipcode" id="zip">
                <br>
                <br>
                
                <br>
                <hr class="l">
                <p class="parent"><b> PARENT'S/GUARDIAN'S INFORMATION </b></p>
                <hr class="p">
                <div class="faname">
                    <p class="name">Father's Name</p>
                    <input type="text" name="Flastname" id="lname" placeholder="Last Name"  />
                    <input type="text" name="Ffirstname" id="fname" placeholder="First Name"  />
                    <input type="text" name="Fmiddlename" id="mname" placeholder="Middle Name"  />
                    <label for="contact">Contact Number</label>
                    <input type="numeric" name="Fcontact" id="contact">
                </div>
                
                <div id="moname">
                    <p class="name">Mother's Maiden  Name</p>
                    <input type="text" name="Mlastname" id="lname" placeholder="Last Name"  />
                    <input type="text" name="Mfirstname" id="fname" placeholder="First Name"  />
                    <input type="text" name="Mmiddlename" id="mname" placeholder="Middle Name"  />
                    <label for="contact">Contact Number</label>
                    <input type="numeric" name="Mcontact" id="contact">
                </div>
                
                <div id="gname">
                    <p class="name">Guardian's Name</p>
                    <input type="text" class="plname" name="Gcontact" id="lname" placeholder="Last Name"  />
                    <input type="text" class="pfname" name="Gcontact" id="fname" placeholder="First Name"  />
                    <input type="text" class="pmname" name="Gcontact" id="mname" placeholder="Middle Initial" />
                    <label for="contact">Contact Number</label>
                    <input type="numeric" name="Gcontact" id="contact"  />
                </div>
                <br>
                <br>
                <hr class="q">
                <p class="lastgrd"><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>
                <hr class="r">
                <br>
                <label for="lastgrd">Last Grade Level Completed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" name="lastgrdlvl" id="lastgrd">
                <label for="lastSY">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last School Year Completed</label>
                <input type="text" name="lastschoolyr" id="lastSY">
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
                        <option name="semester" id="first">1st Sem</option>
                        <option name="semester" id="second">2nd Sem</option>
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
                    <input type="checkbox" name="modularprint" id="modularp">
                    <label for="modularp">Modular(Print)</label>
                    
                    <input type="checkbox" class="one" name="online" id="online">
                    <label for="online" class="one">Online</label>
                    
                    <input type="checkbox"  class="two" name="radio" id="radio">
                    <label for="radio" class="two">Radio-Based Instruction</label>
                    <br>
                    <input type="checkbox" name="blended" id="blended">
                    <label for="blended">Blended</label>
                    
                    <input type="checkbox" class="three" name="modulardigital" id="modulard">
                    <label for="modulard" class="three">Modular(Digital)</label>
                    
                    <input type="checkbox"  class="four" name="eductv" id="educationtv">
                    <label for="educationtv" class="four">Educational Television</label>
                    <br>
                    <input type="checkbox" name="homeschool" id="homeschooling">
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
        </div>`;
        $("#form-container").html(form_content);
        $("#form-container").removeClass("hide");
    })
    .catch(err=>{
        console.log(err);
    })
}

function toggle_id_column(element) {

    $("#view-students").removeClass("hide"); // show the t ble

    if(element.id == "v-pills-deletestudent-tab") {
        if(!$("#table").DataTable().column(0).visible()) {
            $("#table").DataTable().column(0).visible(1);
            $("#delete-student-btn").removeClass("hide");
        }
    } else {
        console.log(element.id)
        loadData(base_url + "api/enrollees.php", $("#table"), ()=>$("#table").DataTable().column(0).visible(0));
        $("#delete-student-btn").addClass("hide");
    }

    if($("#form-container").children()) {
        $("#form-container").addClass("hide");
        $("#form-container").html("");
    }
    
}

function delete_enrollee() {

    showModal("Delete record", "Are you sure you want to delete the selected record/s ?",["no", "yes"],"r" ,()=>{
        const form = new FormData();
        $("input[name='stud_id[]']").each(function(){
            if(this.checked) form.append(this.name, this.value);
        })
    
    
        fetch(base_url + "api/delete_enrollee.php", {
            method : "post",
            body : form
        })
        .then(response=>response.json())
        .then(data => {
            const result = data.result;
            
            loadData(base_url + "api/enrollees.php", $("#table"));
            showToast(result);
        })
    })

    
}
