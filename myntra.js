let bagItems;

onLoad();
function onLoad(){
  let bagItemsStr=localStorage.getItem('bagItems');
  bagItems=bagItemsStr ? JSON.parse(bagItemsStr):[];
  innerHTMLContent();
  displayBagIcon();
}

function addToBag(itemId){
  // console.log(itemId);
  bagItems.push(itemId);
  localStorage.setItem('bagItems',JSON.stringify(bagItems)); //set item
  displayBagIcon();
}
function displayBagIcon(){
  let bagItemCountElement = document.querySelector('.bag-item-count');
  if(bagItems.length === 0){
    bagItemCountElement.style.visibility = 'hidden';
  }else{
    bagItemCountElement.innerHTML= bagItems.length;
    bagItemCountElement.style.visibility = 'visible';
  }
}

function innerHTMLContent(){
// Selecting the itemContainer
let itemContainerElement =document.querySelector('.items-container');
//Objectl
if(itemContainerElement === null) return;
let innerHTML='';
items.forEach(item => {
  innerHTML += 
              `<div class="item-container">
                <img src="${item.image}" alt="item-image" class="item-image">
                <div class="rating">
                  ${item.rating.stars} ⭐ | ${item.rating.count}K
                </div>
                <div class="company-name">${item.company}</div>
                <div class="item-name">${item.item_name}</div>
                <div class="price">
                  <span class="current-price">${item.current_price}</span>
                  <span class="original-price">${item.original_price}</span>
                  <span class="discount-price">(${item.discount_percentage}% OFF)</span>
                </div>
                <button class="btn-add-bag btn btn-success" onclick="addToBag(${item.id})">Add to Bag</button>
              </div>`
});
  
//Changing the innerHTML
itemContainerElement.innerHTML=innerHTML;  
}
