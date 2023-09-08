let bannerInput = document.getElementById("banner");
bannerInput.addEventListener("change", () => {
    let bannerPerview = document.getElementById("bannerPerview");
    bannerPerview.innerHTML = "";
    const [file] = bannerInput.files;
    if (file) {
        bannerPerview.innerHTML += `<img src=${URL.createObjectURL(
            file
        )} alt="banner" class="w-24 aspect-square object-cover rounded-md" />`;
    }
});

let form = document.getElementById("edit-category");

form.addEventListener("submit", async (e) => {
    e.preventDefault();
    let data = new FormData(form);
    
    let res = await fetch(`/categories/${data.get("cat_id")}`, {
        method: "POST",
        body: new FormData(e.target),
    });
    if (res.status.toString().startsWith("2")) {
        notify("Category updated Successfully.", "green");
        setTimeout(() => {
            window.location.href = "/home";
        }, 3000);
    } else {
        try{
        let body = await res.json();
        notify(body.message, "red");
        body.errors &&
            Object.entries(body.errors).forEach(([key, value]) => {
                notify(`${key}: ${value}`, "red");
            });
        }catch(err){
            notify("Something went wrong", "red");
        }
    }
});
