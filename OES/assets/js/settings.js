$(document).ready(()=>{
    $("#form-container").on("submit", function(e){
        e.preventDefault();

        const form = new FormData(document.getElementById("form-container"));

        fetch(base_url + "api/update-account.php",{
            method : "post",
            body : form
        })
        .then(response=>response.json())
        .then(data=>{
            const result = data.result;
            alert(result.status);
        })
        .catch(err=>{
            console.log(err);
        })
    })
})
