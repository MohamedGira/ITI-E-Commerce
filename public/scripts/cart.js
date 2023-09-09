function increase(id) {
    document.getElementById(id).value =
        parseInt(document.getElementById(id).value) + 1;
    updateTotal();
}
function decrease(id) {
    if (document.getElementById(id).value > 1)
        document.getElementById(id).value =
            parseInt(document.getElementById(id).value) - 1;
    updateTotal();
}
function updateTotal() {
    var total = 0;
    var prices = document.getElementsByClassName("price");
    var quantities = document.getElementsByClassName("quantity");

    for (var i = 0; i < prices.length; i++) {
        total +=
            parseFloat(
                prices[i].innerHTML.trim().replace("$", "").replace(",", "")
            ) * parseFloat(quantities[i].value);
    }
    document.getElementById("total").innerHTML = `$${total.toFixed(2)}`;
}

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

function removeItem(id) {
    document.getElementById(`${id}_item`).remove();
    let cartArr = JSON.parse(getCookie("cart")) || [];
    cartArr = cartArr.filter((item) => item != id);
    setCookie("cart", JSON.stringify(cartArr), 1);
    updateTotal();
    notify("Item removed from cart", "green");

    if (cartArr.length == 0)
        document.getElementById("checkout").setAttribute("disabled", true);
    return;
}
updateTotal();
