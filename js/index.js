
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

const   date         = document.querySelector("input#date"),
        select       = document.querySelector(".ul-form select"),
        labelSelect  = document.querySelector(".label-cotizacion"),
        itemHorarios = document.querySelector(".item-horarios"),
        horarios     = ["12:00", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"], 
        ul           = document.querySelector(".horarios"),
        dias         = [
            { horarios: [ horarios[10] ] },
            { horarios: [ horarios[9]  ] },
            { horarios: [ ...horarios  ] },
            { horarios: [ ...horarios  ] },
            { horarios: [ ...horarios  ] }
        ];

date.addEventListener("change", function(e) {
    const day = new Date(e.target.value).getDay();

    if(dias[day]) {
        let listHorarios = [];
        dias[day].horarios.forEach(horario => {
            listHorarios.push(`<li>                                
                                <input type="radio" id="${horario}" value="${horario}" name="horarios">
                                <label for="${horario}">
                                    ${horario}
                                </label>
                            </li>`)
        })

        itemHorarios.classList.remove("not-visible")
        ul.innerHTML = listHorarios.join("")
        listHorarios = []
        return;
    }

    itemHorarios.classList.add("not-visible");
    ul.innerHTML = "";
})

select.addEventListener("change", function(e) {
    if(e.target.value) {
        labelSelect.classList.remove("not-visible");
        return;
    }

    labelSelect.classList.add("not-visible");
})