
/**
 * 
 * @param {String} url 
 * @param {HTMLFormElement} form 
 * @param {Function} callback 
 * @returns void
 */
function submit(url = null, form = null, callback = null) {
    if(!url || !callback) return;

    const options = {
        method : form ? "post" : "get",
        body : form
    };

    fetch(url, options)
    .then(resp=>resp.json())
    .then(resp=>{
        if(callback) callback(resp);
    })
    .catch(err=>{
        console.log(err);
    })
}

/**
 * 
 * @param {Function} callback 
 * @param {Integer} sec 
 * @returns void
 */
const DELAY_EVENT = function(callback, sec = 2000) {
    if(!callback) return

    setTimeout(callback, sec);
}