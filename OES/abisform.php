<?php
require "./template/constants.php";
require "./db/conn.php";
require "./template/head.php";


load_header("ABIS | Enrollment Form", ["header","abisform", "footer"], ["abisform"], false);
?>
<main>
    <form action="./abisform.php" method="POST" class="border border-dark" id="abis-form-container">
        <div class="main d-flex flex-column gap-3 p-3">
            <div class="head d-flex align-items-center justify-center gap-4">
                <img src="./assets/images/DEPED.png" alt="" style="width:10%;height:100% !important" ;>
                <h1 class="h2">Enhance Basic Education Enrollment Form</h1>
            </div>

            <div class="d-flex gap-4">
                <span class="d-flex flex-column" style="width: 50%;">
                    <div>
                        <span class="d-flex align-items-center gap-3">
                            <p class="year">School Year</p>
                            <input type="numeric" class="schoolyear form-control" name="from" required />
                            <input type="numeric" class="schoolyear form-control" name="to" required />
                        </span>
                    </div>

                    <div class="d-flex flex-column">
                        <p class="grade">Grade Level to Enroll</p>
                        <select class="gradelevel form-control">
                            <option>Choose an option</option>
                            <option id="grade11" value="grade11" name="gradelevel">Grade 11</option>
                            <option id="grade12" value="grade12" name="gradelevel">Grade 12</option>
                        </select>
                    </div>
                </span>
                <div class="box p-4" style="width: 50%;">
                    <b>Check the Appropriate Box Only</b>
                    <span class="d-flex">
                        <div class="lrn flex-grow-1">
                            <p>1. With LRN?</p>
                            <span>
                                <input type="radio" class="Ylrn form-check-input" name="withlrn" id="Ylrn" value="yes">
                                <label for="Ylrn">Yes</label>
                            </span>
                            <span>
                                <input type="radio" class="Ylrn form-check-input" name="withlrn" id="Nlrn" value="no">
                                <label for="Nlrn">No</label>
                            </span>
                        </div>

                        <div class="return flex-grow-1">
                            <p>2. Returning (Balik Aral)</p>
                            <span>
                                <input type="radio" class="Yreturn form-check-input" name="returning" id="Yreturn" value="yes">
                                <label for="Yreturn">Yes</label>
                            </span>
                            <span>
                                <input type="radio" class="Yreturn form-check-input" name="returning" id="Nreturn" value="no">
                                <label for="Nreturn">No</label>
                            </span>

                        </div>
                    </span>

                </div>
            </div>

            <div class="d-flex flex-column">
                <p class="instruction"><b>Instructions</b></p>
                <p class="instr"><i>Print legibly all information in <b>CAPITAL letters.</b> Submit accomplished form to the Person-in-Charge/Registrar/Class Adviser</i></p>
            </div>

            <br>
            <br>

            <p class="learner highlight"><b>LEARNER INFORMATION</b></p>

            <div class="learner-information d-flex flex-column gap-3">
                <span class="d-flex form-group">
                    <label class="PSA form-label" for="PSANo" style="width: 50%;">PSA Birth Certificate No. (if available upon registration)</label>
                    <input type="numeric" id="PSANo" style="width: 50%;" class="PSANo form-control" name="psa">
                </span>
                <span class="d-flex form-group">
                    <label class="LRN" style="width: 50%;">Learner Reference No. (LRN)</label>
                    <input type="numeric" style="width: 50%;" class="LRNNo form-control" name="lrn" minlength="12" />
                </span>
                <div id="name form-group d-flex flex-column align-items-center">
                    <p class="name">Full Name</p>
                    <div class="enrollee-name-inputs d-flex gap-3">
                        <input type="text" class="enrollee-lname form-control" name="lastname" id="lname" placeholder="Last Name" />
                        <input type="text" class="enrollee-fname form-control" name="firstname" id="fname" placeholder="First Name" />
                        <input type="text" class="enrollee-mname form-control" name="middlename" id="mname" placeholder="Middle Initial">
                        <input type="text" class="enrollee-extname form-control" name="extname" id="extname" placeholder="Extension Name e.g. Jr., III (if applicable)">
                    </div>
                </div>
                <div class="d-flex">
                    <span class="d-flex form-group align-items-center flex-grow-1">
                        <p class="pob ">Place of Birth</p>
                        <input type="text" class="place form-control" name="placeofbirth" id="placeofbirth">
                    </span>


                    <span class="d-flex form-group align-items-center flex-grow-1">
                        <p class="mothertounge">Mother Tounge</p>
                        <input type="text" class="c form-control" name="mothertongue" id="mothertongue">
                    </span>
                </div>

                <div class="d-flex gap-3">
                    <span class="d-flex align-items-center form-group flex-grow-1">
                        <p class="date">Birthdate (dd/mm/yyyy)</p>
                        <input type="date" class="d form-control" name="birthdate" id="date" />
                    </span>
                    <span class="d-flex align-items-center form-group flex-grow-1">
                        <p class="sex">Sex</p>
                        <select class="sx form-control">
                            <option>Choose an option</option>
                            <option name="sex" id="male" value="M">Male</option>
                            <option name="sex" id="female" value="F">Female</option>
                        </select>
                    </span>

                    <span class="d-flex align-items-center form-group flex-grow-1">
                        <p class="age">Age</p>
                        <input type="number" class="a form-control" name="age" id="age">
                    </span>
                </div>

                <span class="d-flex flex-column form-group">
                    <div class="indi d-flex gap-3">
                        <p>Belonging to any Indigenous Peoples (IP) Community/Indigenous Cultural Community?</p>
                        <div class="d-flex gap-4">
                            <span class="d-flex gap-2">
                                <input type="radio" class="form-check-input" name="indegenous" id="yIP" value="yes">
                                <label for="yIP">Yes</label>
                            </span>
                            <span class="d-flex gap-2">
                                <input type="radio" class="form-check-input" name="indegenous" id="nIP" value="no">
                                <label for="nIP">No</label>
                            </span>
                        </div>
                    </div>
                    <span class="d-flex flex-column  justify-center form-group">
                        <label for="specify">If Yes, Please specify:</label>
                        <input type="text" class="spec form-control" name="ipspecify" id="specify">
                    </span>
                </span>



                <span class="d-flex flex-column form-group">
                    <div class="d-flex gap-3">
                        <p class="4Ps">Is your family a beneficiary of 4Ps?</p>
                        <div class="y4Ps d-flex gap-4">
                            <span class="d-flex gap-2">
                                <input type="radio" class="form-check-input" name="4ps" id="y4Ps" value="yes">
                                <label for="y4ps">Yes</label>
                            </span>
                            <span class="d-flex gap-2">
                                <input type="radio" class="form-check-input" name="4ps" id="n4Ps" value="no">
                                <label for="n4Ps">No</label>
                            </span>
                        </div>
                    </div>
                    <span class="d-flex flex-column justify-center">
                        <label for="idnum">If Yes, write the 4Ps Household ID Number below:</label>
                        <input type="numeric" class="form-control" name="4psID" id="idnum">
                    </span>
                </span>
            </div>

            <div class="current-address d-flex flex-column">
                <p class="address highlight"><b>Current Address</b></p>
                <div class="d-flex flex-wrap gap-2">
                    <span class="d-flex align-items-center">
                        <label for="housenum">House No./Street</label>
                        <input type="text" class="form-control" name="Chousenum" id="housenum" />
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="streetname">Street Name</label>
                        <input type="text" class="form-control" name="Cstreet" id="street" />
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="barangay">Barangay</label>
                        <input type="text" class="form-control" name="Cbrgy" id="brgy" />
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="municipality">Municipality/City</label>
                        <input type="text" class="form-control" name="Ccity" id="city" />
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" name="Cprovince" id="prov">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="Ccountry" id="country" />
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="zipcode">Zip Code</label>
                        <input type="numeric" class="form-control" name="Czipcode" id="zip" />
                    </span>
                </div>
            </div>

            <div class="perm-address d-flex flex-column">
                <p class="addr highlight"><b>Permanent Address </b><i>(Same with your current address?)</i></p>
                <span class="d-flex gap-3">
                    <span>
                        <input type="radio" class="form-check-input" name="perma" id="Ycurrent">
                        <label for="Ycurrent">Yes</label>
                    </span>
                    <span>
                        <input type="radio" checked class="form-check-input" name="perma" id="Ncurrent">
                        <label for="Ncurrent">No</label>
                    </span>
                </span>
                <div class="d-flex flex-wrap gap-2">
                    <span class="d-flex align-items-center">
                        <label for="housenum">House No./Street</label>
                        <input type="text" class="form-control" disabled name="Phousenum" id="housenum">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="streetname">Street Name</label>
                        <input type="text" class="form-control" disabled name="Pstreet" id="street">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="barangay">Barangay</label>
                        <input type="text" class="form-control" disabled name="Pbrgy" id="brgy">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="municipality">Municipality/City</label>
                        <input type="text" class="form-control" disabled name="Pcity" id="city">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" disabled name="Pprovince" id="prov">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" disabled name="Pcountry" id="country">
                    </span>
                    <span class="d-flex align-items-center">
                        <label for="zipcode">Zip Code</label>
                        <input type="numeric" class="form-control" disabled name="Pzipcode" id="zip">
                    </span>
                </div>
            </div>

            <div class="parent-information">
                <p class="parent highlight"><b> PARENT'S/GUARDIAN'S INFORMATION </b></p>
                <div class="faname" class="d-flex flex-column justify-content-center">
                    <p class="name">Father's Name</p>
                    <span class="d-flex gap-3">
                        <input type="text" class="form-control" name="Flastname" id="lname" placeholder="Last Name" />
                        <input type="text" class="form-control" name="Ffirstname" id="fname" placeholder="First Name" />
                        <input type="text" class="form-control" name="Fmiddlename" id="mname" placeholder="Middle Name" />
                        <input type="numeric" class="form-control" name="Fcontact" id="contact" placeholder="Contact Number">
                    </span>
                </div>

                <div id="moname" class="d-flex flex-column justify-content-center">
                    <p class="name">Mother's Maiden Name</p>
                    <span class="d-flex gap-3">
                        <input type="text" class="form-control" name="Mlastname" id="lname" placeholder="Last Name" />
                        <input type="text" class="form-control" name="Mfirstname" id="fname" placeholder="First Name" />
                        <input type="text" class="form-control" name="Mmiddlename" id="mname" placeholder="Middle Name" />
                        <input type="numeric" class="form-control" name="Mcontact" id="contact" placeholder="Contact Number">
                    </span>
                </div>

                <div id="gname" class="d-flex flex-column justify-content-center">
                    <p class="name">Guardian's Name</p>
                    <span class="d-flex gap-3">
                        <input type="text" class="form-control" name="Glastname" id="lname" placeholder="Last Name" />
                        <input type="text" class="form-control" name="Gfirstname" id="fname" placeholder="First Name" />
                        <input type="text" class="form-control" name="Gmiddlename" id="mname" placeholder="Middle Initial" />
                        <input type="numeric" class="form-control" name="Gcontact" id="contact" placeholder="Contact Number" />
                    </span>
                </div>
            </div>

            <div class="returning-learner d-flex flex-column gap-3">
                <p class="lastgrd highlight"><b>For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</b></p>

                <div class="d-flex gap-3">
                    <span class="flex-grow-1">
                        <label for="lastgrd">Last Grade Level Completed</label>
                        <input type="text" class="form-control" name="lastgrdlvl" id="lastgrd">
                    </span>
                    <span class="flex-grow-1">
                        <label for="lastSY">Last School Year Completed</label>
                        <input type="text" class="form-control" name="lastschoolyr" id="lastSY">
                    </span>
                </div>
                <div class="d-flex gap-3">
                    <span class="flex-grow-1">
                        <label for="lastschool">Last School Attended</label>
                        <input type="text" class="form-control" name="lastschool" id="lastschool">
                    </span>
                    <span class="" style="width: 40%;">
                        <label for="schoolid">School ID</label>
                        <input type="numeric" class="form-control" name="schoolid" id="schoolid">
                    </span>
                </div>
            </div>

            <div class="learners-shs">
                <p class="highlight"><b>For Learners in Senior High School</b></p>
                <div class="d-flex gap-3">
                    <span class="d-flex align-items-center flex-grow-1 gap-3">
                        <p class="semester">Semester</p>
                        <select class="form-control">
                            <option>Choose an option</option>
                            <option name="semester" id="first">1st Sem</option>
                            <option name="semester" id="second">2nd Sem</option>
                        </select>
                    </span>
                    <span class="d-flex align-items-center flex-grow-1 gap-3">
                        <label for="track">Track</label>
                        <input type="text" class="form-control" name="track" id="track">
                    </span>
                    <span class="d-flex align-items-center flex-grow-1 gap-3">
                        <label for="strand">Strand</label>
                        <input type="text" class="form-control" name="strand" id="strand">
                    </span>
                </div>
            </div>

            <div class="preferred-learning-modality d-flex flex-column gap-3">
                <p class="pref highlight"><b>Preferred Distance Learning Modality/ties</b></p>
                <div class="choose">
                    <i>Choose all that applies</i>
                </div>

                <div class="check d-flex">
                    <div class="flex-grow-1 d-flex flex-column gap-3">
                        <span>
                            <input type="checkbox" class="form-check-input" name="modularprint" id="modularp">
                            <label for="modularp">Modular(Print)</label>
                        </span>
                        <span>
                            <input type="checkbox" class="form-check-input" name="online" id="online">
                            <label for="online" class="one">Online</label>
                        </span>
                        <span>
                            <input type="checkbox" class="form-check-input" name="radio" id="radio">
                            <label for="radio" class="two">Radio-Based Instruction</label>
                        </span>
                    </div>
                    <div class="flex-grow-1 d-flex flex-column gap-3">
                        <span>
                            <input type="checkbox" class="form-check-input" name="blended" id="blended">
                            <label for="blended">Blended</label>
                        </span>
                        <span>
                            <input type="checkbox" class="form-check-input" name="modulardigital" id="modulard">
                            <label for="modulard" class="three">Modular(Digital)</label>
                        </span>
                        <span>
                            <input type="checkbox" class="form-check-input" name="eductv" id="educationtv">
                            <label for="educationtv" class="four">Educational Television</label>
                        </span>
                    </div>
                    <div class="flex-grow-1 d-flex flex-column gap-3">
                        <span>
                            <input type="checkbox" class="form-check-input" name="homeschool" id="homeschooling">
                            <label for="homeschooling">Homeschooling</label>
                        </span>
                        <span>
                            <input type="checkbox" class="form-check-input" name="facetoface" id="facetoface">
                            <label for="facetoface" class="five">Face to Face</label>
                        </span>
                    </div>
                </div>

            </div>


            <p class="pledge m-5">
                <i> I hereby certify that the above information given are true and
                    correct to the best of my knowledge and I allow the Department of Education to
                    use my child's details to create and/or update his/her profile in the Learner Information System.
                    The information herein shall be treated as confidential in compliance with the Data Privacy Act of 2012.
                </i>
            </p>

            <button class="btn" name="submit" type="submit">Submit</button>

        </div>
    </form>
</main>


<?php
require "./template/footer.php";
load_footer([], false);
?>
