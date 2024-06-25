import paises from '../paises.json' with { type: 'json' };

// LOADER ----------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', function() {
    const media = Array.from(document.querySelectorAll('img, video'));
  
    Promise.all(media.map(function(m) {
      return new Promise(function(res, rej) {
        if(m.tagName == 'IMG') {
          m.addEventListener('load', res);
        }
        if(m.tagName == 'VIDEO') {
          m.addEventListener('loadeddata', res);
        }
        setTimeout(function() {
          res();
        }, 3000)
      })
    }))
    .then(function() {
      document
        .querySelectorAll('#preloader')
        .forEach(function(preloader) {
          preloader.classList.add('hidden');
          document.body.classList.remove('is-loading');
        });
    });
});

// SCROLL ----------------------------------------------------------------------

document.querySelectorAll('[data-scroll]').forEach(function(root) {
    console.log(root)

    const scrollable = root.querySelectorAll('[data-scrollable]');
    
    root
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
        console.log("HOLA")

    if (root.dataset.scroll == 'auto') {
        const AUTO_DELAY = 5000;
    
        var scroll_in_reverse = false;
    
        setInterval(function () {
            // if (root.matches(':hover')) {
            //     return;
            // }
    
            scrollable.forEach(function (_scrollable) {
                console.log("HOLA")
                const _child = _scrollable.querySelector(':first-child');
                if (!_child) { return; }

                _scrollable.scrollLeft += _child.clientWidth * direction;

                var direction = 1;

                if (_scrollable.scrollWidth - _scrollable.scrollLeft - _scrollable.clientWidth < 1) {
                    scroll_in_reverse = true;
                }

                if (_scrollable.scrollLeft == 0) {
                    direction = 1;
                    scroll_in_reverse = false;
                }

                if (scroll_in_reverse) {
                    direction = direction * -1;
                }

                _scrollable.scrollLeft += _child.clientWidth * direction;
            });

        }, AUTO_DELAY);
    }
})

// FORMS ----------------------------------------------------------------------

const form       = document.querySelectorAll('[data-form]'),
      formInputs = document.querySelectorAll('[data-form] input, [data-form] textarea'),
      button     = document.querySelectorAll('[data-form] button');

Array.from(formInputs).forEach(elm => {
    elm.addEventListener('change', function(evt) {
        if(elm.value || !elm.value) {
            elm.classList.toggle('input-active');
        }
    });
});

// PAISES ----------------------------------------------------------------------

document
    .querySelectorAll('#unete, #agendar, #cotiza')
    .forEach(function(root) {
        root
            .querySelectorAll('[data-paises]')
            .forEach(function(row) {

                let selectPaises = `<select name="paises" id="paises" requiered>
                            <option value="">Selecciona un pais</option>`;

                if(paises && paises.length > 0) {
                    paises.forEach(function(pais) {
                        selectPaises += `<option value="+${pais.phone_code}" data-pais="${pais.nombre}">${pais.nombre}</option>`;
                    })
                }
                
                selectPaises += '</select>';

                row.innerHTML = selectPaises;
            });

        root
            .querySelectorAll('#paises')
            .forEach(function(row) {
                row.addEventListener('change', function() {
                    console.log("entra", row)
                    root
                        .querySelectorAll('#codigo-pais')
                        .forEach(function(input) {
                            input.value = row.value;
                    });
                    
                    root
                    .querySelectorAll('#pais')
                    .forEach(function(input) {
                        const option = row.querySelector(`option[value="${row.value}"]`);

                        if(option) {
                            input.value = option.dataset.pais;
                        }
                    })
                });
            });
});

// AGENDAR ----------------------------------------------------------------------

document
    .querySelectorAll('#agendar')
    .forEach(function(root) {
        const btnEnviar = root.querySelectorAll('[data-enviar]');

        btnEnviar.forEach(function(btn) {
            btn.addEventListener('click', function() {
                const input = root.querySelectorAll('#background-popup');

                input.forEach(function(row) {
                    row.checked = false;
                });
            });
        });
    });

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

        if(!activeLink) return;

        if(currentHash) {
            const visibleHash = document.getElementById(`${currentHash.replace('#', '')}`);

            if(visibleHash) {
                activeLink = visibleHash;
            }
        }

        activeLink.classList.toggle("active");

        shiftTabs(activeLink.id);
});