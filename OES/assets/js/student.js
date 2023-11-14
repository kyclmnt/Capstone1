$(document).ready(() => {
  $("header a.nav-link").each(function (i) {
    $(this).removeClass("active");
  });

  $("a#students").addClass("active");

  loadData(base_url + "api/enrollees.php", $("#table"), () =>
    $("#table")
      .DataTable()
      .column(0)
      .visible(role === "A" ? 0 : 1)
  );
});

async function loadData(url = null, table = null, callback = null) {
  if (!url) return;

  if ($.fn.DataTable.isDataTable("#" + table.attr("id"))) {
    $("#" + table.attr("id"))
      .DataTable()
      .destroy();
    $("#" + table.attr("id") + " tbody").remove();
  }
  table.html("");
  await fetch(url)
    .then((response) => response.json())
    .then((data) => {
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
      for (let student of students) {
        tbody += "<tr>";
        tbody += `<td>${
          role === "A"
            ? `<input type="checkbox" id="stud_id_${student["id"]}" value="${student["id"]}" name="stud_id[]">`
            : ""
        } 
                            <label for="stud_id_${student["id"]}">${student[
          "id"
        ].padStart(6, "0")}</label>
                        </td>`;
        tbody += `<td class='text-center' ${
          role === "A" ? `onclick='viewRecord(${student["id"]})'` : ""
        } ><span class=${
          role === "A" ? `'primary text-underline cursor-pointer'` : ""
        }>${student["name"]}</span></td>`;
        tbody += `<td>${student["strand"]}</td>`;
        tbody += `<td>${student["gradelevel"]}</td>`;
        tbody += "</tr>";
      }

      tbody += "</tbody>";
      table.html(thead + tbody);
      $("#" + table.attr("id")).dataTable();

      if (callback) callback();
    })
    .catch((error) => {
      console.log(error);
    });
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
  const form = new FormData(document.getElementById("form-container"));

  $("#form-container input[type='checkbox']").each(function(){
    const cb_name = this.name;
    form.get(cb_name) ?? form.set(cb_name, "off");
  })

  fetch(base_url + "api/update_enrollee.php", {
    method: "post",
    body: form,
  })
    .then((resp) => resp.json())
    .then((data) => {
      const result = data.result;
      // console.log(result);
      // alert(result.status);
      // window.location.reload();
      showToast(result);
    });
}

function viewRecord(record_id) {
  $(".modal-content").addClass("overflow-scroll-Y");
  const form = new FormData();
  form.append("id", record_id);
  fetch(base_url + "api/enrollees.php", {
    method: "post",
    body: form,
  })
    .then((response) => response.json())
    .then((data) => {
      const student = data.data[0];
      console.log(student);
      
      const form_content = `
      <form action="./abisform.php" method="POST" id="form-container">
      <input
        type="hidden"
        class="schoolyear"
        value="${student.id}"
        name="id"
      />
      <div class="main">
          <div class="head d-flex justify-center align-items-center gap-2">
              <img src="./assets/images/DEPED.png" alt="" style="width:65px;height:65px !important" ;>
              <p>Enhance Basic Education Enrollment Form</p>
          </div>
          <span class="d-flex">
              <div class="d-flex flex-column flex-grow-1">
                  <div class="d-flex align-items-center">
                      <p class="year">School Year</p>
                      <span class="d-flex">
                        <input type="numeric" class="schoolyear form-control" value="${student['from']}" name="from" required />
                        <input type="numeric" class="schoolyear form-control" value="${student['to']}" name="to" required />
                      </span>
                  </div>

                  <p class="grade">Grade Level to Enroll</p>
                  <div required class="flex-grow-1">
                      <select class="gradelevel form-control" name='gradelevel'>
                          <option>Choose an option</option>
                          <option id="grade11" ${student['gradelevel'] == "11" ? "selected" : null } name="gradelevel" value="11">Grade 11</option>
                          <option id="grade12" ${student['gradelevel'] == "12" ? "selected" : null } name="gradelevel" value="12">Grade 12</option>
                      </select>
                  </div>
              </div>
              <div class="box p-4">
                  <b>Check the Appropriate Box Only</b>

                  <div class="lrn">
                      <p>1. With LRN?</p>
                      <input type="radio" ${student['withlrn'] == "yes" ? "checked" : null } class="Ylrn  form-check-input" name="withlrn" id="Ylrn" value="yes">
                      <label for="Ylrn">Yes</label>
                      <br>
                      <input type="radio" ${student['withlrn'] == "no" ? "checked" : null } class="Ylrn  form-check-input" name="withlrn" id="Nlrn" value="no">
                      <label for="Nlrn">No</label>
                  </div>

                  <div class="return">
                      <p>2. Returning (Balik Aral)</p>
                      <input type="radio" ${student['returning'] == "yes" ? "checked" : null } class="Yreturn  form-check-input" name="returning" id="Yreturn" value="yes">
                      <label for="Yreturn">Yes</label>
                      <br>
                      <input type="radio"  ${student['returning'] == "no" ? "checked" : null } class="Yreturn  form-check-input" name="returning" id="Nreturn" value="no">
                      <label for="Nreturn">No</label>
                  </div>

              </div>
          </span>


          <p class="instruction"><b>Instructions</b></p>
          <p class="instr"><i>Print legibly all information in <b>CAPITAL letters.</b> Submit accomplished form to the Person-in-Charge/Registrar/Class Adviser</i></p>

          <br>
          <br>

          <hr class="g">
          <div class="d-flex flex-column">

          </div>
          <span>
              <p class="learner"><b>LEARNER INFORMATION</b></p>
              <hr class="i">
              <p class="PSA">PSA Birth Certificate No. (if available upon registration)</p>
              <input type="numeric" class="PSANo form-control" value="${student['psa'] ?? ""}" name="psa">
              <p class="LRN">Learner Reference No. (LRN)</p>
              <input type="numeric" class="LRNNo form-control" value="${student['lrn'] ?? ""}" name="lrn" minlength="12" />
          </span>

          <br>
          <div id="name">
              <p class="name">Full Name</p>
              <span class='d-flex '>
                <input type="text" class="lname form-control" name="lastname" value="${student['lastname'] ?? ""}" id="lname" placeholder="Last Name" />
                <input type="text" class="fname form-control" name="firstname" value="${student['firstname'] ?? ""}" id="fname" placeholder="First Name" />
                <input type="text" class="mname form-control" name="middlename" value="${student['middlename'] ?? ""}" id="mname" placeholder="Middle Initial">
                <input type="text" class="extname form-control" name="extname" value="${student['extname'] ?? ""}" id="extname" placeholder="Extension Name e.g. Jr., III (if applicable)">
              </span
          </div>
          <span class="d-flex">
              <p class="pob">Place of Birth</p>
              <input type="text" class="place form-control" name="placeofbirth" value="${student['placeofbirth'] ?? ""}" id="placeofbirth">
          </span>
          <span class="d-flex">
              <p class="mothertounge">Mother Tounge</p>
              <input type="text" class="c form-control" name="mothertongue" value="${student['mothertongue'] ?? ""}" id="mothertongue">
          </span>
          <span class="d-flex">
              <p class="date">Birthdate (dd/mm/yyyy)</p>
              <input type="date" class="d form-control" name="birthdate" value="${student['birthdate'] ?? ""}" id="date" />
          </span>


          <p class="sex">Sex</p>
          <select class="sx form-control" name="sex">
              <option>Choose an option</option>
              <option name="sex"  ${student['sex'] == "M" ? "selected" : null } id="male" value="M">Male</option>
              <option name="sex" ${student['sex'] == "F" ? "selected" : null } id="female" value="F">Female</option>
          </select>

          <p class="age">Age</p>
          <input type="number" class="a form-control" name="age" value="${student['age'] ?? ""}" id="age">

          <div class="indi">
              <p>Belonging to any Indigenous Peoples (IP) Community/Indigenous Cultural Community?</p>
          </div>
          <div class="ip">
              <input type="radio" name="indegenous" class="form-check-input" id="yIP" value="yes" ${student['indegenous'] == "yes" ? "checked" : null }>
              <label for="yIP">Yes</label>
              <input type="radio" name="indegenous" class="form-check-input" id="nIP" value="no"  ${student['indegenous'] == "no" ? "checked" : null }>
              <label for="nIP">No</label>
          </div>
          <br>
          <div class="specify">
              <label for="specify">If Yes, Please specify:</label>
              <input type="text" class="spec form-control" name="ipspecify" id="specify" value="${student['ipspecify'] ?? ""}">
          </div>

          <p class="4Ps">Is your family a beneficiary of 4Ps?</p>
          <div class="y4Ps">
              <input type="radio" name="4ps"  class="form-check-input" id="y4Ps" ${student['4ps'] == "yes" ? "checked" : null } value="yes">
              <label for="y4ps">Yes</label>
              <input type="radio" name="4ps" class="form-check-input" id="n4Ps" ${student['4ps'] == "no" ? "checked" : null } value="no">
              <label for="n4Ps">No</label>
          </div>
          <br>
          <label for="idnum">If Yes, write the 4Ps Household ID Number below:</label>
          <input type="numeric" name="4psID" class="form-control" id="idnum" value="${student['4psID']}">

          <hr class="j">
          <p class="address"><b>Current Address</b></p>
          <hr class="k">
          <br>
          <div class="housenum">
              <label for="housenum">House No./Street</label>
              <input type="text" name="Chousenum" class="form-control" value="${student['Chousenum']}" id="housenum" />
              <label for="streetname">Street Name</label>
              <input type="text" name="Cstreet" class="form-control" value="${student['Cstreet']}" id="street" />
              <label for="barangay">Barangay</label>
              <input type="text" name="Cbrgy" class="form-control" value="${student['Cbrgy']}" id="brgy" />
          </div>
          <br>
          <label for="municipality">Municipality/City</label>
          <input type="text" name="Ccity" class="form-control" value="${student['Ccity']}" id="city" />
          <label for="province">Province</label>
          <input type="text" name="Cprovince"class="form-control"  value="${student['Cprovince']}" id="prov">
          <label for="country">Country</label>
          <input type="text" name="Ccountry"class="form-control" value="${student['Ccountry']}" id="country" />
          <br>
          
          <div class="zipcode">
              <label for="zipcode">Zip Code</label>
              <input type="numeric" name="Czipcode" class="form-control" id="zip" value="${student['Czipcode']}"/>
          </div>
          <br>
          <br>
          <p class="addr"><b>Permanent Address </b><i>(Same with your current address?)</i></p>
          <input type="radio" class="ycur form-check-input" name="perma" id="addr" ${student['perma'] == "yes" ? "checked" : null }>
          <label for="Ycurrent">Yes</label>
          <input type="radio" class="ycur form-check-input" name="perma" id="addr"  ${student['perma'] == "no" ? "checked" : null }>
          <label for="Ncurrent">No</label>
          <br>
          <br>
          <!--Dapat di na to pwede mafill up-an kapag yes ang sinelect sa permanent add-->
          <div class="housenum">
              <label for="housenum">House No./Street</label>
              <input type="text" name="Phousenum"  class="form-control" id="housenum" value="${student['Phousenum']}">
              <label for="streetname">Street Name</label>
              <input type="text" name="Pstreet" id="street"  class="form-control"  value="${student['Pstreet']}">
              <label for="barangay">Barangay</label>
              <input type="text" name="Pbrgy" id="brgy"  class="form-control"  value="${student['Pbrgy']}">
          </div>
          <br>
          <label for="municipality">Municipality/City</label>
          <input type="text" name="Pcity" id="city" class="form-control" value="${student['Pcity']}">
          <label for="province">Province</label>
          <input type="text" name="Pprovince"  class="form-control" id="prov" value="${student['Pprovince']}">
          <label for="country">Country</label>
          <input type="text" name="Pcountry" class="form-control" id="country" value="${student['Pcountry']}">
          <br>
          <br>
          <label for="zipcode">Zip Code</label>
          <input type="numeric" name="Pzipcode"  class="form-control" id="zip" value="${student['Pzipcode']}">
          <br>
          <br>

          <br>
          <hr class="l">
          <p class="parent"><b> PARENT'S/GUARDIAN'S INFORMATION </b></p>
          <hr class="p">
          <div class="faname">
              <p class="name">Father's Name</p>
              <span class="d-flex">
                <input type="text" name="Flastname"  class="form-control" id="lname" placeholder="Last Name" value="${student['Flastname']}" />
                <input type="text" name="Ffirstname"  class="form-control" id="fname" placeholder="First Name" value="${student['Ffirstname']}" />
                <input type="text" name="Fmiddlename"  class="form-control" id="mname" placeholder="Middle Name" value="${student['Ffirstname']}"/>
              </span>
                <label for="contact">Contact Number</label>
                <input type="numeric" name="Fcontact"  class="form-control" id="contact" value="${student['Fcontact']}">
          </div>

          <div id="moname">
              <p class="name">Mother's Maiden Name</p>
              <span class="d-flex">
                <input type="text" name="Mlastname" class="form-control" id="lname" placeholder="Last Name" value="${student['Mlastname']}" />
                <input type="text" name="Mfirstname" class="form-control" id="fname" placeholder="First Name" value="${student['Mfirstname']}" />
                <input type="text" name="Mmiddlename" class="form-control" id="mname" placeholder="Middle Name" value="${student['Mmiddlename']}"/>
              </span>
              <label for="contact">Contact Number</label>
              <input type="numeric" name="Mcontact" class="form-control" id="contact" value="${student['Mcontact']}">
          </div>

          <div id="gname">
              <p class="name">Guardian's Name</p>
              <span class="d-flex">
                <input type="text" class="plname form-control" name="Glastname" id="lname" placeholder="Last Name"  value="${student['Glastname']}"/>
                <input type="text" class="pfname form-control" name="Gfirstname" id="fname" placeholder="First Name"  value="${student['Gfirstname']}"/>
                <input type="text" class="pmname form-control" name="Gmiddlename" id="mname" placeholder="Middle Initial"  value="${student['Gmiddlename']}"/>
              </span>
              <label for="contact">Contact Number</label>
              <input type="numeric" class="form-control" name="Gcontact" id="contact"  value="${student['Gcontact']}"/>
          </div>
          <br>
          <br>
          <hr class="q">
          <p class="lastgrd"><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>
          <hr class="r">
          <br>
          <label for="lastgrd">Last Grade Level Completed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input type="text" class="form-control" name="lastgrdlvl" id="lastgrd"  value="${student['lastgrdlvl']}">
          <label for="lastSY">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last School Year Completed</label>
          <input type="text" class="form-control" name="lastschoolyr" id="lastSY"  value="${student['lastschoolyr']}">
          <br>
          <br>
          <label for="lastschool">Last School Attended</label>
          <input type="text" class="form-control" name="lastschool" id="lastschool"  value="${student['lastschool']}">
          <label for="schoolid">School ID</label>
          <input type="numeric" class="form-control" name="schoolid" id="schoolid" value="${student['schoolid']}">
          <br>
          <br>
          <hr class="s">
          <p class="shs"><b>For Learners in Senior High School</b></p>
          <hr class="t">
          <br>
          <div>
              <p class="semester">Semester</p>
              <select class="sem form-control">
                  <option>Choose an option</option>
                  <option name="semester" ${student['schoolid'] == 'first' ? "selected" : ""} value="first">1st Sem</option>
                  <option name="semester" ${student['schoolid'] == 'second' ? "selected" : ""} value="second">2nd Sem</option>
              </select>

              <div class="track">
                  <label for="track">Track</label>
                  <input type="text" name="track" id="track" class="form-control" value="${student['track']}">
                  <label for="strand">Strand</label>
                  <input type="text" name="strand" id="strand" class="form-control" value="${student['strand']}">
              </div>
          </div>
          <hr class="u">
          <p class="pref"><b>Preferred Distance Learning Modality/ties</b></p>
          <hr class="v">
          <div class="choose">
              <i>Choose all that applies</i>
          </div>
          <div class="check d-flex">
          <span class="d-flex flex-column">
            <span  class="d-flex">
              <input type="checkbox" class="form-check-input" name="modularprint" id="modularp" ${student['modularprint'] == 'on' ? "checked" : ""}>
              <label for="modularp">Modular(Print)</label>
            </span>
            <span class="d-flex">
              <input type="checkbox" class="one form-check-input" name="online" id="online" ${student['online'] == 'on' ? "checked" : ""}>
              <label for="online" class="one">Online</label>
            </span>
            <span class="d-flex">
              <input type="checkbox" class="two form-check-input" name="radio" id="radio" ${student['radio'] == 'on' ? "checked" : ""}>
              <label for="radio" class="two">Radio-Based Instruction</label>
            </span>
            </span>

          <span class="d-flex flex-column">
            <span class="d-flex">
              <input type="checkbox" class="form-check-input" name="blended" id="blended" ${student['blended'] == 'on' ? "checked" : ""}>
              <label for="blended">Blended</label>
            </span>
            <span class="d-flex">
              <input type="checkbox" class="three form-check-input" name="modulardigital" id="modulard" ${student['modulardigital'] == 'on' ? "checked" : ""}>
              <label for="modulard" class="three">Modular(Digital)</label>
            </span>
            <span class="d-flex">
              <input type="checkbox" class="four form-check-input" name="eductv" id="educationtv"  ${student['eductv'] == 'on' ? "checked" : ""}>
              <label for="educationtv" class="four">Educational Television</label>
            </span >
          </span>
          <span class="d-flex flex-column">
            <span class="d-flex">
              <input type="checkbox" name="homeschool"  class="form-check-input" id="homeschooling"  ${student['homeschool'] == 'on' ? "checked" : ""}>
              <label for="homeschooling">Homeschooling</label>
            </span>
            <span class="d-flex">
              <input type="checkbox" class="five form-check-input" name="facetoface" id="facetoface"  ${student['facetoface'] == 'on' ? "checked" : ""}>
              <label for="facetoface" class="five">Face to Face</label>
            </span>
          </span>
              
          </div>
          <br>
          <br>
          <br>
          <p class="pledge"><i> I hereby certify that the above information given are true and
                  correct to the best of my knowledge and I allow the Department of Education to
                  use my child's details to create and/or update his/her profile in the Learner Information System.
                  The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.</i></p>
      </div>
      </div>
  </form>`;
      showModal("View Record", form_content, ["cancel", "yes"], "g", () => {
        onSubmit();
      });
      // $("#form-container").html(form_content);
      // $("#form-container").removeClass("hide");
    })
    .catch((err) => {
      console.log(err);
    });
}

function toggle_id_column(element) {
  $("#view-students").removeClass("hide"); // show the t ble

  if (element.id == "v-pills-deletestudent-tab") {
    if (!$("#table").DataTable().column(0).visible()) {
      $("#table").DataTable().column(0).visible(1);
      $("#delete-student-btn").removeClass("hide");
    }
  } else {
    console.log(element.id);
    loadData(base_url + "api/enrollees.php", $("#table"), () =>
      $("#table").DataTable().column(0).visible(0)
    );
    $("#delete-student-btn").addClass("hide");
  }

  if ($("#form-container").children()) {
    $("#form-container").addClass("hide");
    $("#form-container").html("");
  }
}

function delete_enrollee() {
  $(".modal-content").removeClass("overflow-scroll-Y");

  showModal(
    "Delete record",
    "Are you sure you want to delete the selected record/s ?",
    ["no", "yes"],
    "r",
    () => {
      const form = new FormData();
      $("input[name='stud_id[]']").each(function () {
        if (this.checked) form.append(this.name, this.value);
      });

      fetch(base_url + "api/delete_enrollee.php", {
        method: "post",
        body: form,
      })
        .then((response) => response.json())
        .then((data) => {
          const result = data.result;

          loadData(base_url + "api/enrollees.php", $("#table"));
          showToast(result);
        });
    }
  );
}
