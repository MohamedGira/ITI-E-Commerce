let profileImage=document.getElementById("profileImage");
let data=document.getElementById('data');
let form=document.getElementById('editForm');
let showForm=document.getElementById('showForm');
let cancel=document.getElementById('cancel')
let reset=document.getElementById('reset');
let originalSrc=profileImage.src
showForm.addEventListener("click",()=>{
    data.classList.add('hidden')
    showForm.classList.add('hidden')
    form.classList.remove('hidden')
})
cancel.addEventListener("click",()=>{
    data.classList.remove('hidden')
    showForm.classList.remove('hidden')
    form.classList.add('hidden')
    reset.click()
})
reset.addEventListener('click',()=>{
    profileImage.src=originalSrc
})


profileImage.addEventListener('mouseover',()=>{
    profileImage.style.filter='blur(3px) grayscale(100%)'  
})
profileImage.addEventListener('mouseout',()=>{
    profileImage.style.filter='blur(0px) grayscale(0%)'  
})
profileImage.addEventListener("click",()=>{
    showForm.click()
    document.getElementById('imageInput').click()
})

document.getElementById('imageInput').addEventListener('change',()=>{
    PreviewImage();
})
function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("imageInput").files[0]);
    oFReader.onload = function (oFREvent) {
        profileImage.src = oFREvent.target.result;
    };
};



