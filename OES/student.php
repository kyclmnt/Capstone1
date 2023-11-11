<?php
require "./template/head.php";
load_header("Student", ["header", "student", "footer"], ["student"]);

?>
<main>
    <section>
        <div class="students">
            <h1>
                STUDENTS
            </h1>
            <ul class="nav nav-pills d-flex flex-column">
                <li class="nav-item">
                    <button type="button" id="v-pills-students-tab" data-bs-toggle="pill" data-bs-target="#v-pills-students" aria-controls="v-pills-students" class="nav-link active" onclick="toggle_id_column(this)"><i class="fa-regular fa-file"></i> View Students</button>
                </li>
                <?php if($_SESSION['role'] == "A") {?>
                    <li class="nav-item">
                        <button type="button" id="v-pills-deletestudent-tab" data-bs-toggle="pill" data-bs-target="#v-pills-deletestudent" aria-controls="v-pills-deletestudent" class="nav-link " onclick="toggle_id_column(this)"><i class="fa-solid fa-trash-can"></i> Delete Students</button>
                    </li>
                <?php } ?>
                
        </div>

        <div style="flex-grow: 1;" id="view-students">
            <h1>
                View Students
            </h1>
            <table id="table">
            </table>
            <?php echo $_SESSION['role'] == "A" ? '<button id="delete-student-btn" class="hide no-flex-grow" onclick="delete_enrollee()">Delete</button>' : '' ?>
            
        </div>

    </section>

</main>


<?php
require "./template/footer.php";
load_footer([]);
?>