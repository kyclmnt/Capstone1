$(document).ready(()=>{
    const table_options = {
        columnDefs: [
                {
                    target: 0,
                    visible: false
                }
            ]
        }
    
    
    loadData(base_url + "api/enrollees.php", $("#table"), ()=>$("#table").DataTable().column(0).visible(0));
    
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
            tbody += `<td><input type="checkbox" id="stud_id_${student['id']}" value="${student['id']}" name="stud_id[]"> 
                            <label for="stud_id_${student['id']}">${student['id'].padStart(6,"0")}
                        </td>`;
            tbody += `<td class='text-center' onclick='viewRecord(${student['id']})'><span class='primary text-underline cursor-pointer'>${student['name']}</span></td>`;
            tbody += `<td>${student['strand']}</td>`;
            tbody += `<td>${student['gradelevel']}</td>`;
            tbody += "</tr>";
        }

        tbody += "</tbody>";
        
        table.html(thead + tbody);  
        new DataTable("#" + table.attr("id"));
        
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
        const form_content = `
        <div id="form-header">
            <h1>${student['name']}</h1>
            <section id="form-buttons">
                <button type='button' id="btn-cancel" onclick="toggle_inputs()" class='hide'>Cancel</button>
                <button type='button' id="btn-edit" onclick="toggle_inputs()">Edit</button>
                <input type='submit' value='Save' name='save' id="btn-save" onclick="" class='hide'/>
            </section>
            
        </div>

        <div id="form-body">
            <input type='hidden' name='id' class='hide' value='${student['id']}'>
            <span>Basic Information</span>
            <section>
                <div>
                    <span>LRN</span>
                    <span>${student['lrn']}</span>
                    <input type='text' name='lrn' class='hide' value='${student['lrn']}' placeholder='LRN'>
                </div>
                <div>
                    <span>Grade & Strand</span>
                    <span> ${student['gradelevel']} - ${(student['strand'] || student['track'])}</span>
                    <input type='text' class='hide' name='gradelevel' value='${student['gradelevel']}' placeholder='Grade Level'>
                    <input type='text' class='hide' name='${(student['strand'] ? 'strand' : 'track')}' value='${(student['strand'] || student['track'])}' placeholder='Track / Strand'>
                </div>
            </section>
            
            <span>Personal Data</span>
            <section id="personal-info">
                <div>
                    <span>Sex</span>
                    <span>${student['sex']}</span>
                    <div class=' flex justify-center items-center gap-md hide'>
                        <label for="male">
                            Male
                        </label>
                        <input type='radio' id="male" class='hide' name='sex' value='M' ${(student['sex'] == "Male" ? "checked" : "")}>
                    </div>
                    <div class=' flex justify-center items-center gap-md hide'>
                        <label for="female">
                            Female
                        </label>
                        <input type='radio' id="female" class='hide' name='sex' value='F' ${(student['sex'] == "Female" ? "checked" : "")}>
                    </div>
                    
                </div>
                <div>
                    <span>Nationality</span>
                    <span>Filipino</span>
                    <input type='text' class='hide' value='${student['addr']}'>
                </div>
                <div>
                    <span>Religion</span>
                    <span>Catholic</span>
                    <input type='text' class='hide' value='${student['addr']}'>
                </div>
                <div>
                    <span>Date of Birth</span>
                    <span>June 28, 2003</span>
                    <input type='text' class='hide' value='${student['addr']}'>
                </div>
                <div>
                    <span>Address</span>
                    <span>${student['addr']}</span>
                    <input type='text' class='hide' name='addr' value='${student['addr']}'>
                </div>
            </section>
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
            const result = data.result.status;
            
            loadData(base_url + "api/enrollees.php", $("#table"));
            showToast(result); // 
        })
    })

    
}
