const urlParams = new URLSearchParams(window.location.search);
const success = urlParams.get("success");
if (success) {
    notify(success, "green");
    
}
const error = urlParams.get("error");
if (error) {
    notify(error, "red");
}
