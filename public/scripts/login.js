document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get("message");
    if (myParam) {
            notify(myParam, "red");
    }
});
