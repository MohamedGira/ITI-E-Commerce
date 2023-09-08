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

let form = document.getElementById("add-category");
form.addEventListener("submit", async (e) => {
    e.preventDefault();
    let data = new FormData(form);
    let res = await fetch("/categories", {
        method: "POST",
        headers:{'Content-Type':'application/json'},
        body: JSON.stringify({ data }),
    });
    if (res.status.toString().startsWith("2")) {
        notify("Category added Successfully.", "green");
        setTimeout(() => {
            window.location.href = "/home";
        }, 3000);
    } else {
        let body = await res.json();
        notify(body.message, "red");
        body.errors &&
            Object.entries(body.errors).forEach(([key, value]) => {
                notify(`${key}: ${value}`, "red");
            });
    }
});
