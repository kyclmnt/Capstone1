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
      $("#abis-form-container ").trigger("reset");
      window.scrollTo({ top: 0 });
    });
  });
}
