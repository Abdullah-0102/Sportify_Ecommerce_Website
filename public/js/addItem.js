// Learn Template literals: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Template_literals
// Learn about Modal: https://getbootstrap.com/docs/5.0/components/modal/

var modalWrap = null;
/**
 * 
 * @param {string} title 
 * @param {string} description content of modal body 
 * @param {string} yesBtnLabel label of Yes button 
 * @param {string} noBtnLabel label of No button 
 * @param {function} callback callback function when click Yes button
 */
const showModal = (title, description, yesBtnLabel = 'Yes', noBtnLabel = 'Cancel', callback) => {
    if (modalWrap !== null) {
        modalWrap.remove();
    }

    modalWrap = document.createElement('div');
    modalWrap.innerHTML = `
    <div class="modal fade" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title">${title}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>${description}</p>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">${noBtnLabel}</button>
            <button type="button" class="btn btn-primary modal-success-btn" data-bs-dismiss="modal">${yesBtnLabel}</button>
          </div>
        </div>
      </div>
    </div>
  `;

    modalWrap.querySelector('.modal-success-btn').onclick = callback;

    document.body.append(modalWrap);

    var modal = new bootstrap.Modal(modalWrap.querySelector('.modal'));
    modal.show();
}

// document.querySelector("input[value='Send']").addEventListener('click', function(e){
//     e.preventDefault();

//     showModal("File Deletion", "Do you want to proceed?", "Yes", "No", ()=>{
//         alert("OK");
//     })
// });
const colorsBySize = {};
// Event listener for adding color
document.getElementById('add-color').addEventListener('click', function () {
    const colorName = document.getElementById('color-name').value.trim();
    const colorCode = document.getElementById('color-code').value.trim();

    if (colorName !== '' && colorCode !== '') {

        let selectSize = showSizeDialog().innerHTML;
        showModal("Size Selection", selectSize, "Yes", "No", () => {

            const checkedSizes = Array.from(document.querySelectorAll('input[name=size]:checked'))
                .map(checkbox => checkbox.value);

            if (colorName !== '' && checkedSizes.length > 0) {
                colorsBySize[colorName] = { code: colorCode };
                colorsBySize[colorName].sizes = checkedSizes;
                alert(`Color "${colorName}" associated with sizes: ${checkedSizes.join(', ')}`);
                document.getElementById('color-name').value = '';
                document.getElementById('color-code').value = '';
                // document.getElementById('size-dialog').style.display = 'none';
                alert(colorsBySize);
            } else {
                alert('Please select at least one size.');
            }
        });
    } else {
        alert('Please enter both Color Name and Hex Code.');
    }
});


function showSizeDialog() {
    // sizeDialog.style.display = 'block';

    const sizeCheckboxes = document.getElementById('size-checkboxes');
    sizeCheckboxes.innerHTML = '';

    // Create checkboxes for sizes
    const sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL']; // Update with your sizes
    sizes.forEach(size => {
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.name = 'size';
        checkbox.value = size;
        checkbox.id = `size-${size}`;

        const label = document.createElement('label');
        label.appendChild(document.createTextNode(size));

        sizeCheckboxes.appendChild(checkbox);
        sizeCheckboxes.appendChild(label);
        sizeCheckboxes.appendChild(document.createElement('br'));
    });

    return sizeCheckboxes;
}


document.querySelector('input[value=Send]').addEventListener('click', (e) => {
    e.preventDefault();

    submitColorSizeForm();

});


function submitColorSizeForm() {
    const form = document.querySelector("#hidden_form");
    form.method = 'POST';
    form.action = '/insert';
    // form.style.display = 'none';
    // document.body.appendChild(form);

    const title = document.createElement('input');
    title.type = 'hidden';
    title.name = "p_title";
    title.value = document.querySelector("#firstName").value;
    form.appendChild(title);

    const brand = document.createElement('input');
    brand.type = 'hidden';
    brand.name = "p_brand";
    brand.value = document.querySelector("#lastName").value;
    form.appendChild(brand);

    const price = document.createElement('input');
    price.type = 'hidden';
    price.name = "p_price";
    price.value = document.querySelector("#email").value;
    form.appendChild(price);

    const quantity = document.createElement('input');
    quantity.type = 'hidden';
    quantity.name = "p_quantity";
    quantity.value = document.querySelector("#mobile").value;
    form.appendChild(quantity);


    // const path = document.createElement('input');
    // path.type = 'hidden';
    // path.name = "p_path";
    // path.value = document.querySelector('input[type=file]').value;
    // form.appendChild(path);


    // form.appendChild(document.querySelector('input[type=file]'));
    // document.querySelector("input[type='file']").type = 'hidden';

    const category = document.createElement('input');
    category.type = 'hidden';
    category.name = "p_category";
    category.value = document.querySelector("#product-category").value;
    form.appendChild(category);

    const desc = document.createElement('textarea');
    desc.type = 'hidden';
    desc.name = "p_desc";
    desc.value = document.querySelector('textarea[name=description]').value;
    form.appendChild(desc);

    // Get the CSRF token value from the meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Create a hidden input field to hold the CSRF token value
    const csrfInput = document.createElement('input');
    csrfInput.setAttribute('type', 'hidden');
    csrfInput.setAttribute('name', '_token'); // Laravel expects the CSRF token to be named _token
    csrfInput.setAttribute('value', csrfToken);

    // Get the hidden form and append the CSRF token input field to it
    // const hiddenForm = document.getElementById('hiddenForm');
    form.appendChild(csrfInput);

    // Submit the hidden form programmatically
    // hiddenForm.submit();


    // Create and append input fields for each color and its sizes
    Object.keys(colorsBySize).forEach((color, index) => {
        const colorData = colorsBySize[color];
        const colorInput = document.createElement('input');
        colorInput.type = 'hidden';
        colorInput.name = `color[${index}][name]`;
        colorInput.value = color;
        form.appendChild(colorInput);

        const codeInput = document.createElement('input');
        codeInput.type = 'hidden';
        codeInput.name = `color[${index}][code]`;
        codeInput.value = colorData.code;
        form.appendChild(codeInput);

        colorData.sizes.forEach((size, sizeIndex) => {
            const sizeInput = document.createElement('input');
            sizeInput.type = 'hidden';
            sizeInput.name = `color[${index}][sizes][${sizeIndex}]`;
            sizeInput.value = size;
            form.appendChild(sizeInput);
        });
    });

    form.submit();
}
