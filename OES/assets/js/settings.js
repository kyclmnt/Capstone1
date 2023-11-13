$(document).ready(() => {
  $("header a.nav-link").each(function (i) {
    $(this).removeClass("active");
  });

  $("a#settings").addClass("active");
  showUserProfile();
});

function showUserProfile() {
  
  $("form").off("submit");
  $("form").removeClass("hide");
  $("#table_wrapper").addClass("hide");
  console.log($(".form-body").has("#user-profile").length < 1);
  if ($(".form-body").has("#user-profile").length < 1) {
    $("form > div.form-title").html(`
              <h2>Account</h2>
        `);
    $("form > div.form-body").html(`
          <div id="user-profile" class="d-flex justify-center flex-column align-items-center gap-2"> 
              <input type="hidden" name="id" value="${uid}">
              <span>
                  <label for="fname" class="form-label">First Name</label>
                  <input type="text" class="form-control" placeholder="Firstname" id="fname" name="fname" value="${
                    fname ?? ""
                  }">
              </span>
              <span>
                  <label for="lname" class="form-label">Last Name</label>
                  <input type="text" class="form-control" placeholder="Lastname" id="lname" name="lname" value="${
                    lname ?? ""
                  }">
              </span>
              <span>
                  <label for="uname" class="form-label">Email</label>
                  <input type="text" class="form-control" placeholder="Email" id="email" name="email" value="${
                    email ?? ""
                  }">
              </span>
              <span>
                  <button type="submit" class="btn btn-success">Save</button>
              </span>
          </div>
          `);

    $("form").on("submit", function (e) {
      e.preventDefault();
        
      
      showModal(
        "Update Profile",
        "Are you sure to update your profile ?",
        ["no", "yes"],
        "g",
        function () {
          const form = new FormData(document.querySelector("form"));
          submit(base_url + "api/update-account.php", form, (data) => {
            showToast(data.result);
            fname = data.result.user.fname;
            lname = data.result.user.lname;
            email = data.result.user.email;

            
          });
        }
      );
    });
  }
}

function showUserPassword() {
  $("form").off("submit");
  $("form").removeClass("hide");
  
  $("#table_wrapper").addClass("hide");
  console.log($(".form-body").has("#user-password-cont").length);
  if ($(".form-body").has("#user-password-cont").length < 1) {
    $("form > div.form-title").html(`
        <h2>Password</h2>
    `);

    $("form > div.form-body").html(`
    <div id="user-password-cont" class="d-flex justify-center flex-column align-items-center gap-2"> 
        <input type="hidden" name="id" value="${uid}">
        <span>
            <label for="oldpass" class="form-label">Old Password</label>
            <input type="text" class="form-control" placeholder="Old Password" id="oldpass" name="oldpass">
        </span>
        <span>
            <label for="newpass" class="form-label">New Password</label>
            <input type="text" class="form-control" placeholder="New Password" id="newpass" name="newpass">
        </span>
        <span>
            <label for="re-enter-pass" class="form-label">Re-Enter Password</label>
            <input type="text" class="form-control" placeholder="Re-Enter Password" id="re-enter-pass" name="re-enter-pass">
        </span>
        <span>
            <button type="submit" class="btn btn-success">Save</button>
        </span>
    </div>
    `);

    $("form").on("submit", function (e) {
      e.preventDefault();

      showModal(
        "Update Password",
        "Are you sure to update your password ?",
        ["no", "yes"],
        "g",
        function () {
          const form = new FormData(document.querySelector("form"));
          submit(base_url + "api/update-password.php", form, (data) => {
            showToast(data.result);
          });
        }
      );
    });
  }
}

function createUser() {
  $("form").off("submit");
  $("form").removeClass("hide");
  $("#table_wrapper").addClass("hide");

  if ($(".form-body").has("#new-user").length < 1) {
    $("form > div.form-title").html(`
            <h2>Create User</h2>
        `);

    $("form > div.form-body").html(`
        <div id="new-user" class="d-flex justify-center flex-column align-items-center gap-2"> 
            <input type="hidden" name="id" value="${uid}">
            <span id="user-firstname">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname">
            </span>
            <span id="user-lastname">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname">
            </span>
            <span id="user-email">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Email" id="email" name="email">
            </span>
            <span id="user-role">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role">
                    <option value="A">Admin</option>
                    <option value="F">Faculty</option>
                    <option value="S">Student</option>
                </select>
            </span>
            <span id="user-password">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
            </span>
            <span id="user-confirmation-password">
                <label for="re-enter-pass" class="form-label">Re-Enter Password</label>
                <input type="password" class="form-control" placeholder="Re-Enter Password" id="re-enter-pass" name="re-enter-pass">
            </span>
            <span>
                <button type="submit" class="btn btn-success">Create</button>
            </span>
        </div>
        `);

    $("form").on("submit", function (e) {
      e.preventDefault();
      $("#user-password > ul").remove();
      const form = new FormData(document.querySelector("form"));
      submit(base_url + "api/create-user.php", form, (data) => {
        let message = data.result.message;
        console.log(message)
        message = message.search(/\[/) >= 0 ? message.replaceAll(/[\[\]]/g, "").split(",") : message;  
        
        if(typeof message === "object") {
          
          let error_list = "<ul>";
          message.forEach(error=>{
            error_list += "<li> <span class='text-danger'>"+error+"</span> </li>";
          })
          error_list += "</ul>";
          $("#user-password").append(error_list);
        } else {
          showToast(data.result);
        }
      });
    });
  }
}

function viewUsers() {
  $("form").addClass("hide");
  $("table").removeClass("hide");

  if ($.fn.DataTable.isDataTable("#table")) {
    $("#table").DataTable().destroy();
    $("#table" + " tbody").remove();
  }
  const form = new FormData();
  form.append("uid", uid);
  submit(base_url + "api/all-users.php", form, (result) => {
    const users = result.data;
    let columns = [];

    let thead = "<thead><tr>";
    let tbody = "<tbody>";

    for (let user of users) {
      tbody += "<tr>";
      for (let key of Object.keys(user)) {
        tbody += `<td>${user[key]}</td>`;
        if (!columns.includes(key)) columns.push(key);
      }
      tbody += "</tr>";
    }

    thead += columns.map((h) => `<th>${h}</th>`).join("");
    thead += "</thead></thead>";

    tbody += "</tbody>";
    $("table").html(thead + tbody);

    $("table").dataTable();
  });
}
