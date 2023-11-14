$(document).ready(function () {
  onSubmit();
  copyCurrentAddress();
});

function copyCurrentAddress() {
  $("#Ycurrent").on("change", function () {
    $(".perm-address > div  input").each(function () {
      const id = $(this).attr("id");
      const current_address_val = $(
        ".current-address > div  input#" + id
      ).val();

      $(this).val(current_address_val);
      $(this).prop("disabled", false);

      $(".current-address > div  input").each(function () {
        $(this).on("keypress", () => {
          togglePermanentAddress(() => {
            $("#Ncurrent").prop("checked", true);
            $("#Ycurrent").prop("checked", false);
          });
        });
      });
    });
  });
  $("#Ncurrent").on("change", () => {
    togglePermanentAddress(() => {
      $(".current-address > div  input").each(function () {
        $(this).off("keypress");
      });
    });
  });
}

function togglePermanentAddress(callback = null) {
  console.log("sasa");
  $(".perm-address > div  input").each(function () {
    $(this).prop("disabled", true);
  });

  if (callback) callback();
}

function onSubmit() {
  $("#abis-form-container ").on("submit", function (e) {
    e.preventDefault();

    const form = new FormData(document.getElementById("abis-form-container"));

    submit(base_url + "api/enroll.php", form, (response) => {
      showToast(response.result);

      window.scrollTo({ top: 0 });
      $("#abis-form-container ").trigger("reset");

      DELAY_EVENT(()=>{
        const pdf_viewer_window = window.open("", "_blank");
        const file_link = base_url + "files/enrollees-forms/" + response.result.filename;
        
        pdf_viewer_window.document.title = "PDF";

        pdf_viewer_window.document.body.innerHTML += `<a href="${file_link}" download> Download File </a>`;
        pdf_viewer_window.document.body.innerHTML += `<embed src="${file_link}" type="application/pdf" width="100%" height="100%">`
      }, 5000)
    });
  });
}
