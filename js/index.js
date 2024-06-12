
// FORMS ----------------------------------------------------------------------

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

// FAQS ----------------------------------------------------------------------

const details = document.querySelectorAll('details');

let ds = [...details];

ds.forEach(elm => {
    elm.addEventListener('click', function(e) {
        e.shiftKey || ds.filter(i => i != elm).forEach( i => i.removeAttribute('open'))
    })
})

// AGENDAR ----------------------------------------------------------------------

const   date      = document.querySelector("input#date"),
        horarios  = ["12:00", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"], 
        lunes     = {
            dia: 1,
            horarios: horarios[11]
        },
        martes    = {
            dia: 2,
            horarios: horarios[10]
        },
        miercoles = {
            dia: 3,
            horarios: [...horarios]
        },
        jueves    = {
            dia: 4,
            horarios:[...horarios]
        },
        viernes   = {
            dia: 5,
            horarios: [...horarios]
        },
        ul        = document.querySelector(".horarios");

date.addEventListener("change", function(e) {
    const day = new Date(e.target.value).getDay();

    if(day == lunes.dia || day == martes.dia || day == miercoles.dia || day == jueves.dia || day == viernes.dia) {
        ul.innerHTML = `<li>${miercoles.horarios}</li>`;
        return;
    }
    console.log("hola?=")
    ul.innerHTML = "";
})