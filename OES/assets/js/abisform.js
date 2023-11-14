$(document).ready(function () {
  ABIS_FORM.onSubmit();
  ABIS_FORM.copyCurrentAddress();
});

const ABIS_FORM = {
  
  __pdf_filename__ : "",

  copyCurrentAddress : function() {
    $("#Ycurrent").on("change", function () {
      $(".perm-address > div  input").each(function () {
        const id = $(this).attr("id");
        const current_address_val = $(
          ".current-address > div  input#" + id
        ).val();
  
        $(this).val(current_address_val);
        $(this).prop("disabled", false);
  
        $(".current-address > div  input").each(()=>{
          $(this).on("keypress", () => {
            this.togglePermanentAddress(() => {
              $("#Ncurrent").prop("checked", true);
              $("#Ycurrent").prop("checked", false);
            });
          });
        });
      });
    });
    $("#Ncurrent").on("change", () => {
      this.togglePermanentAddress(() => {
        $(".current-address > div  input").each(function () {
          $(this).off("keypress");
        });
      });
    });
  },
  togglePermanentAddress : function (callback = null) {
    console.log("sasa");
    $(".perm-address > div  input").each(function () {
      $(this).prop("disabled", true);
    });
  
    if (callback) callback();
  },
  
  onSubmit : function() {
    $("#abis-form-container ").on("submit", (e)=>{
      e.preventDefault();
  
      const form = new FormData(document.getElementById("abis-form-container"));
  
      submit(base_url + "api/enroll.php", form, (response) => {
        showToast(response.result);
  
        window.scrollTo({ top: 0 });
        $("#abis-form-container ").trigger("reset");
        
        if(response.result.status == "success") {     
          this.__pdf_filename__ = response.result.filename; 
          
          DELAY_EVENT(()=>this.displayPDF(this.__pdf_filename__), 2000)
        }
      });
    });
  },
  
  displayPDF : function(filename){
    const pdf_viewer_window = window.open("", "_blank");
    const file_link = base_url + "files/enrollees-forms/" + filename;
    
    pdf_viewer_window.document.title = "PDF"; 
    // pdf_viewer_window.document.head.innerHTML += ` <link href="${base_url}assets/libraries/bootstrap/bootstrap.min.css" rel="stylesheet">`;

    // pdf_viewer_window.document.body.innerHTML += `<a href="${file_link}" download class="btn btn-primary"> Download File </a>`;
    pdf_viewer_window.document.body.innerHTML += `<embed src="${file_link}" type="application/pdf" width="100%" height="100%">`
  }
  
}



