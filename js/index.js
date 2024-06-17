// SCROLL ----------------------------------------------------------------------

const scrollable = document.querySelectorAll('[data-scrollable]');

document
    .querySelectorAll('[data-arrow]')
    .forEach(function (arrow) {
        arrow.addEventListener('click', function (evt) {
            evt.preventDefault();

            const direction = Number(arrow.dataset.arrow);
            scrollable.forEach(function (_scrollable) {
                const _child = _scrollable.querySelector(':first-child');
                if (!_child) { return; }

                _scrollable.scrollLeft += _child.clientWidth * direction;
            });
        });
    });

// FORMS ----------------------------------------------------------------------

const form       = document.querySelectorAll('[data-form]'),
      formInputs = document.querySelectorAll('[data-form] input[type="text"], [data-form] textarea'),
      button     = document.querySelectorAll('[data-form] button');

Array.from(formInputs).forEach(elm => {
    elm.addEventListener('change', function(evt) {
        if(elm.value || !elm.value) {
            elm.classList.toggle('input-active');
        }
    });
});

button.forEach(function (btn) {
    btn.addEventListener("click", function(evt) {
        // formInputs.forEach(function (input) {
        //     input.value = "";
        // })
    })
})

// FAQS ----------------------------------------------------------------------

document
    .querySelectorAll("#faq")
    .forEach(function() {
        const details = document.querySelectorAll('details');
        
        let ds = [...details];
        
        ds.forEach(elm => {
            elm.addEventListener('click', function(e) {
                e.shiftKey || ds.filter(i => i != elm).forEach( i => i.removeAttribute('open'))
            });
        });
    });

// AGENDAR ----------------------------------------------------------------------

document
    .querySelectorAll("#agendar")
    .forEach(function() {
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
});

// INDEX ---------------------------------------------------------------------------------

document
    .querySelectorAll("#servicios")
    .forEach(function() {
        const allLinks = document.querySelectorAll(".tabs a"),
              allTabs  = document.querySelectorAll(".tab-content");
        
        const shiftTabs = (linkId) => {
            allTabs.forEach((tab, i) => {
                if(tab.id.includes(linkId)) {
                    allTabs.forEach((tabItem) => {
                        if(document.body.clientWidth < 960) {
                            tabItem.style = `transform: translateY(-${i*33.125}em);`;
                        } else {
                            tabItem.style = `transform: translateY(-${i*24}em);`;
                        }
                    });
                }
            });
        }

        allLinks.forEach((elem) => {
            elem.addEventListener("click", function(e) {
                e.preventDefault();
                
                const linkId = elem.id;
                const hrefLinkClick = elem.href;
                
                allLinks.forEach((link, i) => {
                    if(link.href == hrefLinkClick) {
                        link.classList.add("active");
                    } else {
                        link.classList.remove("active");
                    }
                });

                shiftTabs(linkId);
            });
        });

        const currentHash = window.location.hash;

        let activeLink = document.querySelector(".tabs a");

        if(currentHash) {
            const visibleHash = document.getElementById(`${currentHash.replace('#', '')}`);

            if(visibleHash) {
                activeLink = visibleHash;
            }
        }

        activeLink.classList.toggle("active");

        shiftTabs(activeLink.id);
});