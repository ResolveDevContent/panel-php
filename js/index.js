
const form       = document.querySelectorAll('[data-form]'),
      formInputs = document.querySelectorAll('[data-form] input[type="text"], [data-form] textarea');

form.forEach(function(formElement) {
    Array.from(formInputs).forEach(elm => {
        elm.addEventListener('change', function(evt) {
            if(elm.value || !elm.value) {
                elm.classList.toggle('input-active');
            }
        })
    })
})