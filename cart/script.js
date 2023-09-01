let products=[
    {id:1,image:"../ecommerce-product-page-main/images/image-product-1.jpg",name:"sneakers",brand:"Mitsubishi",cartCount:1,originalPrice:30,discount:.5},
    {id:2,image:"../ecommerce-product-page-main/images/image-product-1.jpg",name:"sneakers",brand:"Mitsubishi",cartCount:1,originalPrice:30,discount:.5},
    {id:3,image:"../ecommerce-product-page-main/images/image-product-1.jpg",name:"sneakers",brand:"Mitsubishi",cartCount:1,originalPrice:30,discount:.5},
]
function createProduct(product) {
  return `
    <div id="product-${product.id}" class="flex items-center gap-4 w-full">
    <img src="${product.image}" class="w-56 items-center rounded-md" alt="">
    <div class="flex gap-4 w-full justify-between">
        <div>
            <h1 class="text-2xl">${product.name}</h1>
            <p class="text-gray-400">${product.brand}</p>
        </div>
        <div class="flex gap-4 rounded-md bg-gray-100 px-3 items-center">
            <button id="less"
                onclick="decrease(${product.id})"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full w-5  aspect-square">-</button>
            <span id="${product.id}count" class="font-black">${product.cartCount}</span>
            <button id="more"
                onclick="increase(${product.id})"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full w-5  aspect-square">+</button>
        </div>
        <div id="${product.id}price">
            ${product.originalPrice*product.cartCount}
        </div>
    </div>
    </div>
    `;
}
function refreshProduct(id) {
    let product=products.filter(el=>el.id=id)[0]
    document.getElementById(`product-${id}`).innerHTML=
    `
    <img src="${product.image}" class="w-56 items-center rounded-md" alt="">
    <div class="flex gap-4 w-full justify-between">
        <div>
            <h1 class="text-2xl">${product.name}</h1>
            <p class="text-gray-400">${product.brand}</p>
        </div>
        <div class="flex gap-4 rounded-md bg-gray-100 px-3 items-center">
            <button id="less"
                onclick="decrease(${product.id})"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full w-5  aspect-square">-</button>
            <span id="${product.id}count" class="font-black">${product.cartCount}</span>
            <button id="more"
                onclick="increase(${product.id})"
                class="text-orange-400 font-black  transition-colors hover:bg-gray-200 rounded-full w-5  aspect-square">+</button>
        </div>
        <div id="${product.id}price">
            ${product.originalPrice*product.cartCount}
        </div>
    </div>
    `;
    refreshTotal();
}

function refreshTotal(){
    let sum=0
    products.forEach(p=> sum+=p.originalPrice*p.cartCount*(1-p.discount))
    document.getElementById('total').innerHTML=`$${sum.toFixed(2)}`;
}
function increase(id){
    products=products.map(el=>{
        if(el.id==id)
            return {...el,cartCount:el.cartCount+1}
        return el
    })
    refreshProduct(id);
}
function decrease(id){
    products=products.map(el=>{
        if(el.id==id &&el.cartCount>1)
            return {...el,cartCount:el.cartCount-1}
        return el
    })
    refreshProduct(id);
}

products.forEach(product=>document.getElementById('lst').innerHTML+=createProduct(product))
refreshTotal();

