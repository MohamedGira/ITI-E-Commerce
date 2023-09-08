const TOAST_TIMEOUT = 3000;
document.getElementsByTagName(
    "body"
)[0].innerHTML += `
<div class="fixed z-70 mt-28 top-0 right-0 w-80 mr-10 flex flex-col gap-1" id="notification-list"></div>
`;
function notify(message, color) {
    let uniq = Math.floor(Math.random() * 1000000);
    let list = document.getElementById("notification-list");

    let notification = `
<div id="${uniq}" class="notification rounded-t-md pt-2  text-xl flex flex-col justify-between " style="color:${color}; border:1px solid ${color}" >
    <p class="mx-2">${message}</p>
    <div class="w-full bg-gray-200 h-1 mt-1 absolue bottom-0">
        <div id="${uniq}-progress" class="bg-${color}-600  h-1  cooldown-3">
        </div>
    </div>
</div>
`;
    list.innerHTML += notification;
   
    setTimeout(() => {
        document.getElementById(uniq).remove();
    }, TOAST_TIMEOUT);
}
