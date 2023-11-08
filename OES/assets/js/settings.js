$(document).ready(()=>{
    $("#form-container").on("submit", function(e){
        e.preventDefault();
        
        showModal("Update Account", "Are you sure to update your account ?", ['no','yes'], "g" ,function(){
            const form = new FormData(document.getElementById("form-container"));

            fetch(base_url + "api/update-account.php",{
                method : "post",
                body : form
            })
            .then(response=>response.json())
            .then(data=>{
                const result = data.result;
                showToast(result.status);
            })
            .catch(err=>{
                console.log(err);
            })
        });
        
    })
})
