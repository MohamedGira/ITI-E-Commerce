document.getElementsByTagName(
    "body"
)[0].innerHTML += `<div class="fixed z-70 mt-28 top-0 right-0 w-80 mr-10 flex flex-col gap-1" id="notification-list"></div>`;
function notify(message, color) {
    let uniq = Math.floor(Math.random() * 1000000);
    let list = document.getElementById("notification-list");

    let notification = `
<div id="${uniq}" class="notification rounded-md py-2 px-3 text-xl " style="color:${color}; border:1px solid ${color}" >
    <p>${message}</p>
</div>
`;
    list.innerHTML += notification;
    setTimeout(() => {
        document.getElementById(uniq).remove();
    }, 3000);
}
