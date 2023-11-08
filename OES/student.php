<?php
require "./template/head.php";
load_header("Student",["header", "student", "footer"], ["student"]);

?>
    <main>
        <section>
            <div class="students">
                <h1>
                    STUDENTS
                </h1>   
                <button type="button" id="view-btn" class="btn btn-account bg-transparent active border-none p-md cursor-pointer" onclick="toggle_id_column(this)"><i class="fa-regular fa-file" ></i> View Students</button>
                <button type="button" id="delete-btn" class="btn btn-account p-md bg-transparent border-none cursor-pointer" onclick="toggle_id_column(this)"><i class="fa-solid fa-trash-can"></i> Delete Students</button>
                </i>
            </div>

            <div style="flex-grow: 1;" id="view-students">
                <h1> 
                    View Students
                </h1>
                <table id="table">
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
                    
                </table>
                <button id='delete-student-btn' class="hide no-flex-grow" onclick='delete_enrollee()'>Delete</button>
            </div>
            
            <form id="form-container" class="hide" method="post" ></form>
            
        </section>
        
    </main>

    
<?php
    require "./template/footer.php";
    load_footer([]);
?>