<div class="w-7/12 mt-24 border-l-2 border-grey-600 pl-3 flex flex-col gap-8 w-10">
    <h1 class=" text-orange-400 text-5xl">My Packages</h1>
    <div class="flex flex-col gap-4">
        <div class=" bg-gray-100 flex justify-between p-10 items-center">
            <div class="flex justify-evenly flex-col">
                <h2>Package 1</h2>
                <h2>Ordered At: 1 sep 2023</h2>
                <p>Status: Pending</p>
            </div>
            <div class="cursor-pointer" id="detailsBtn-1" onclick="document.getElementById(`detailsList-1`).classList.toggle('hidden')">
                Details
            </div>
        </div>
        <div id="detailsList-1">
            <a href="">
                <div class="flex gap-4 w-full justify-evenly pb-2 border-b-2">
                    <img src="../ecommerce-product-page-main/images/image-product-1.jpg" class="w-12 items-center rounded-md" alt="">
                    <h1 class="text-xl">Product Name</h1>
                    <p>count</p>
                </div>
            </a>
        </div>
    </div>
</div>