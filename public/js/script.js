document.addEventListener("DOMContentLoaded", function(){
    addOrRemoveClass();

// Function to add or remove class based on screen size
function addOrRemoveClass() {
    if (window.matchMedia('(max-width: 992px)').matches) {
      // Screen width is greater than or equal to 768px
      document.querySelector('.open-sidebar').classList.add('show');
      document.querySelector('#lg-screen-sidebar').style.display = 'none';
      
    } else {
      // Screen width is less than 768px
      document.querySelector('.open-sidebar').classList.remove('show');
      document.querySelector('#lg-screen-sidebar').style.display = 'block';
    }
  }
  
// Call the function initially

  
// Listen for screen size changes
window.addEventListener('resize', addOrRemoveClass);

const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});


// Product page script
let openSidebarEl = document.getElementById("open-sidebar");
const sidebarEl = document.querySelector(".sidebar");
const closeSidebarEl = document.getElementById("close-sidebar");

let openCartSidebar = document.getElementById("open-cart-sidebar");
const cartSidebar = document.querySelector("#cart-sidebar");
const closeCartSidebar = document.getElementById("close-cart-sidebar");

openCartSidebar.addEventListener("click",()=>{
    cartSidebar.style.transform = "translate(0px)";
    document.body.style.overflow = "hidden";
});

closeCartSidebar.addEventListener("click", ()=>{
    cartSidebar.style.transform = "translate(310px)";
    document.body.style.overflow = "auto";
});

openSidebarEl.addEventListener("click",()=>{
    sidebarEl.style.transform = "translate(0px)";
    document.body.style.overflow = "hidden";
});

closeSidebarEl.addEventListener("click",()=>{
    sidebarEl.style.transform = "translate(-310px)";
    document.body.style.overflow = "auto";
});



  
});