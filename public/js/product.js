document.addEventListener('DOMContentLoaded', function () {

    const colorRadios = document.querySelectorAll('.color-option');
      const sizeOptions = document.querySelectorAll('.size-options');


      // Show size options for the initially selected color when the page loads
      const initiallySelectedColor = document.querySelector('.color-option:checked').value;
      showSizeOptions(initiallySelectedColor);

      function showSizeOptions(color) {
        sizeOptions.forEach(sizeOption => {
          if (sizeOption.dataset.color === color) {
            sizeOption.style.display = 'block';
          } else {
            sizeOption.style.display = 'none';
          }
        });
      }

      colorRadios.forEach(colorRadio => {
        colorRadio.addEventListener('change', function() {
          const selectedColor = this.value;
          showSizeOptions(selectedColor);

          document.querySelectorAll(`input[name="select-size-${selectedColor}"]`).forEach(sizeRadio => {
            sizeRadio.checked = false;
          });
        });


      });

    const prodImgs = document.getElementsByClassName("p-imgs");
    const fml = document.querySelectorAll(".main")[0];

    for (let i = 0; i < prodImgs.length; i++) {
        prodImgs[i].addEventListener('click', function () {
            fml.src = this.src; // Update to use 'fml' variable instead of 'mainImg'
            for(img of prodImgs){
                if(img.classList.contains("clicked")){
                    img.classList.remove("clicked");
                }
                if(!img.classList.contains("scaling-image")){
                    img.classList.add("scaling-image");
                }
            }
            this.classList.add("clicked");
            this.classList.remove("scaling-image")
        });
    }

    const colorLabel = document.querySelector(".color-label");
    const radioInputs = document.querySelectorAll(".select-color .radio")

    
    for (let i = 0; i < radioInputs.length; i++) {
        radioInputs[i].addEventListener('click', function () {
            colorLabel.innerHTML = `COLOR : ${radioInputs[i].getAttribute("value")}`;
        });
    }

    
    const sizeLabel = document.querySelector(".size-label");
    const sizeRadioInputs = document.querySelectorAll(".select-size .radio")

    for (let i = 0; i < sizeRadioInputs.length; i++) {
        sizeRadioInputs[i].addEventListener('click', function () {
            sizeLabel.innerHTML = `Size : ${sizeRadioInputs[i].getAttribute("value")}`;
        });
    }

    let itemCount = 1;
    const decrease = document.querySelector("#item-count>span");
    const value = decrease.nextElementSibling;
    value.innerHTML = itemCount;
    const increse = decrease.nextElementSibling.nextElementSibling;

    decrease.addEventListener('click', ()=>{
        if(itemCount > 1){
            value.innerHTML = --itemCount;
        }
    })

    increse.addEventListener('click', ()=>{
        value.innerHTML = ++itemCount;
    })
});

