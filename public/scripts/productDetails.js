let images = [...document.getElementById("images").children].map(
    (el) => el.children[0]
);
let currentImage = document.getElementById("current-image");
let activeIndex = 0;
let purchaseCount = 1;
let count = document.getElementById("count");
images.forEach((el, index) => {
    el.addEventListener("click", () => {
        activeIndex = index;
        changeImage();
    });
    el.style.cursor = "pointer";
});
function changeImage() {
    images.forEach((el) => el.classList.remove("active-image"));
    images[activeIndex].classList.add("active-image");
    images[activeIndex].scrollIntoView(false, {
        behavior: "smooth",
        block: "center",
    });
    currentImage.src = images[activeIndex].src;
}
changeImage();
function next() {
    (activeIndex < images.length - 1 && ++activeIndex) || (activeIndex = 0);
    changeImage();
}
function previous() {
    (activeIndex > 0 && --activeIndex) || (activeIndex = images.length - 1);
    changeImage();
}

/* document.getElementById('prevBtn').addEventListener('click',previous);
document.getElementById('nextBtn').addEventListener('click',next);

document.getElementById('more').addEventListener('click',()=>{
    purchaseCount++;
    count.innerHTML=purchaseCount;
})
document.getElementById('less').addEventListener('click',()=>{
    purchaseCount>1&&purchaseCount--;
    count.innerHTML=purchaseCount;
}) */

let addToCartForm = document.getElementById("addToCartForm");
function getCookie(name) {
    let cookieArr = document.cookie.split(";");

    for (let i = 0; i < cookieArr.length; i++) {
        let cookiePair = cookieArr[i].split("=");

        if (name == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }

    return null;
}
function setCookie(name, value, days) {
    let d = new Date();
    d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
    let cookieArr = document.cookie.split(";");
    let cookieStr =
        name +
        "=" +
        encodeURIComponent(value) +
        ";expires=" +
        d.toGMTString() +
        "; path=/";
    let isset = false;
    if (cookieArr.length > 0) {
        for (let i = 0; i < cookieArr.length; i++) {
            let cookiePair = cookieArr[i].split("=");

            if (name == cookiePair[0].trim()) {
                cookieArr[i] = cookieStr;
                document.cookie = cookieStr;
                isset = true;
                break;
            }
        }
    }
    if (!isset) {
        console.log(cookieStr);
        document.cookie = cookieStr;
    }
}
addToCartForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let cartArr = JSON.parse(getCookie("cart"))||[];
    if(!cartArr.includes(document.getElementById("product_id").value))
    {   
        cartArr.push(document.getElementById("product_id").value);
        setCookie("cart", JSON.stringify(cartArr), 1);
        alert("Product added to cart")
        return;
    }
    alert("Product already in cart")    
});
