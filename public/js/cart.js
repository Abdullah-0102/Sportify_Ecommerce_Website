document.addEventListener("DOMContentLoaded", ()=>{
    let openCartSidebar = document.getElementById("open-cart-sidebar");
    const cartSidebar = document.querySelector(".cart-sidebar");
    const closeCartSidebar = document.getElementById("close-cart-sidebar");

    openCartSidebar.addEventListener("click", () => {
        // cartSidebar.style.display = "block";
        cartSidebar.style.transform = "translate(0px)";
        document.body.style.overflowX = "hidden";
    });

    closeCartSidebar.addEventListener("click", () => {
        cartSidebar.style.transform = "translate(310px)";
        // cartSidebar.style.display = "none";
        // document.body.style.overflow = "auto";
    });
});