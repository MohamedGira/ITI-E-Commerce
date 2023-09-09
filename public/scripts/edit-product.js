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
let imagesInput = document.getElementById("images");
imagesInput.addEventListener("change", () => {
    let imagesPerview = document.getElementById("imagesPerview");
    imagesPerview.innerHTML = "";
    const [file] = imagesInput.files;
    Array.from(imagesInput.files).forEach((file) => {
        imagesPerview.innerHTML += `<img src=${URL.createObjectURL(
            file
        )} alt="images" class="w-24 aspect-square object-cover rounded-md" />`;
    });
});
let form = document.getElementById("edit-product");

form.addEventListener("submit", async (e) => {
    e.preventDefault();
    let data = new FormData(form);
    var markedCheckbox = document.getElementsByName('category[]');  
    let categories=[]
    for (var checkbox of markedCheckbox) {  
        if (checkbox.checked)  
         categories.push(checkbox.value);
    }  
    let res = await fetch(`/products/${data.get("prod_id")}`, {
        method: "POST",
        body: new FormData(e.target),
    });
    if (res.status.toString().startsWith("2")) {
        notify(
            "Product updated. Updating its categories",
            "green"
        );
        let res2 = await fetch("/products-categories/put", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                categories: categories,
                product_id: data.get("prod_id"),
            }),
        });
        if (res2.status.toString().startsWith("2")) {
            notify("Product updated Successfully", "green");
            setTimeout(() => {
                window.location.href = "/home";
            }, 3000);
        } else {
            notify("Couldnt link product, try updating it later", "red");
        }
    } else {
        try {
            let body = await res.json();
            notify(body.message, "red");
            body.errors &&
                Object.entries(body.errors).forEach(([key, value]) => {
                    notify(`${key}: ${value}`, "red");
                });
        } catch (err) {
            notify("Something went wrong", "red");
        }
    }
});
