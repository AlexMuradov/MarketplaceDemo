//  preloader
window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
        document.body.classList.add('loaded');
        document.body.classList.remove('loaded_hiding');
    }, 500);
}
//  preloader

///главный__календарь
console.clear();

let alterClass = function () {
    let ww = $(window).width();
    let wh = $(window).height();
    return {
        width: ww,
        height: wh,
        outerWidth: $(window).outerWidth()
        // outerWidthTrue: $(window).outerWidth(true),
    };
};

$(window).resize(function () {
    let wh = alterClass();
    console.log(wh);
});

alterClass(); //Fire it when the page first loads:

document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ["interaction", "dayGrid", "timeGrid", "list", "moment", "rrule"],
        defaultView: "dayGridMonth",
        themeSystem: "standard",
        locale: "ru",
        selectable: true,
        height: 450,
        editable: false,
        navLinks: false,

        // ALLOW "MORE" LINK WHEN TOO MANY EVENTS
        eventLimit: true,

        /* HEADER */
        header: {
            left: "prev,next",
            center: "title",
            right: "btnReload,dayGridMonth"
        },

        views: {
            listDay: {
                buttonText: "День"
            },
            listWeek: {
                buttonText: "Неделя"
            }
        },

        /* HEADER */
        buttonText: {
            today: "Сегодня"
        },

        /* HEADER */
        customButtons: {
            btnReload: {
                text: "↻",
                click: function () {
                    // calendar.refetchEvents();
                    // document.location.reload();
                    console.log("btnReload...");
                }
            }
        },

        /* EVENT TIME FORMAT */
        eventTimeFormat: {
            hour: "2-digit",
            minute: "2-digit"
        },

        events: [{
                title: "All Day Event",
                start: "2019-06-01"
            },
            {
                title: "Long Event",
                start: "2019-06-07",
                end: "2019-06-10"
            },
            {
                groupId: "999",
                title: "Repeating Event",
                start: "2019-06-09T16:00:00"
            },
            {
                groupId: "999",
                title: "Repeating Event",
                start: "2019-06-16T16:00:00"
            },
            {
                title: "Conference",
                start: "2019-06-11",
                end: "2019-06-13"
            },
            {
                title: "Meeting",
                start: "2019-06-12T10:30:00",
                end: "2019-06-12T12:30:00"
            },
            {
                title: "Lunch",
                start: "2019-06-12T12:00:00"
            },
            {
                title: "Meeting",
                start: "2019-06-12T14:30:00"
            },
            {
                title: "Birthday Party",
                start: "2019-06-13T07:00:00"
            },
            {
                title: "Click for Google",
                url: "http://google.com/",
                start: "2019-06-28"
            },

            {
                title: "recurring ",

                // FREQ:
                // YEARLY = 0
                // MONTHLY = 1
                // WEEKLY = 2
                // DAILY = 3
                rrule: {
                    dtstart: "2019-06-28T08:30:01"
                },

                // rrule: {
                //   dtstart: "2020-01-01T08:30:01",
                //   until: "2020-02-21",
                //   freq: 1,
                //   interval: 1,
                //   count: 1,
                //   // byweekday: ["MO", "TU", "WE", "TH", "FR"],
                //   // count: 100,
                // },
                color: "green"
            }
        ]
    });

    calendar.render();
});
//главный__календарь

//второй__календарь

document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar-two");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ["interaction", "dayGrid", "timeGrid", "list", "moment", "rrule"],
        defaultView: "dayGridMonth",
        themeSystem: "standard",
        locale: "ru",
        selectable: true,
        height: 450,
        editable: false,
        navLinks: false,

        // ALLOW "MORE" LINK WHEN TOO MANY EVENTS
        eventLimit: true,

        /* HEADER */
        header: {
            left: "prev,next",
            center: "title",
            right: "btnReload,dayGridMonth"
        },

        /* HEADER */
        views: {
            listDay: {
                buttonText: "День"
            },
            listWeek: {
                buttonText: "Неделя"
            }
        },

        /* HEADER */
        buttonText: {
            today: "Сегодня"
        },

        /* HEADER */
        customButtons: {
            btnReload: {
                text: "↻",
                click: function () {
                    // calendar.refetchEvents();
                    // document.location.reload();
                    console.log("btnReload...");
                }
            }
        },


        /* EVENT TIME FORMAT */
        eventTimeFormat: {
            hour: "2-digit",
            minute: "2-digit"
        },

        events: [{
                title: "All Day Event",
                start: "2019-06-01"
            },
            {
                title: "Long Event",
                start: "2019-06-07",
                end: "2019-06-10"
            },
            {
                groupId: "999",
                title: "Repeating Event",
                start: "2019-06-09T16:00:00"
            },
            {
                groupId: "999",
                title: "Repeating Event",
                start: "2019-06-16T16:00:00"
            },
            {
                title: "Conference",
                start: "2019-06-11",
                end: "2019-06-13"
            },
            {
                title: "Meeting",
                start: "2019-06-12T10:30:00",
                end: "2019-06-12T12:30:00"
            },
            {
                title: "Lunch",
                start: "2019-06-12T12:00:00"
            },
            {
                title: "Meeting",
                start: "2019-06-12T14:30:00"
            },
            {
                title: "Birthday Party",
                start: "2019-06-13T07:00:00"
            },
            {
                title: "Click for Google",
                url: "http://google.com/",
                start: "2019-06-28"
            },

            {
                title: "recurring ",

                // FREQ:
                // YEARLY = 0
                // MONTHLY = 1
                // WEEKLY = 2
                // DAILY = 3
                rrule: {
                    dtstart: "2019-06-28T08:30:01"
                },

                // rrule: {
                //   dtstart: "2020-01-01T08:30:01",
                //   until: "2020-02-21",
                //   freq: 1,
                //   interval: 1,
                //   count: 1,
                //   // byweekday: ["MO", "TU", "WE", "TH", "FR"],
                //   // count: 100,
                // },
                color: "green"
            }
        ]
    });

    calendar.render();
});
//второй календарь


// Добавить/Удалить__элементы(add__item-five.html)
$(".button__add").click(function () {
    var $toAdd = $("input[name=checkListItem]").val();
    $(".list").append('<div class="item"><div class="item-close">' + $toAdd + '</div></div>');
});
//instead of using .click to remove use document on click.
//click is the event, .item is the selector
$(document).on('click', '.item', function () {
    $(this).remove();
});
// Добавить/Удалить__элементы(add__item-five.html)


// Добавить/Удалить__input
var x = 0;

function addInput() {
    var profile = document.getElementById('bedroom__code');
    var div = document.createElement('div');
    div.id = 'input' + ++x;
    div.innerHTML = '<div class="sleeping__arrangements-item sleeping__arrangements-add"><div class="sleeping__arrangements-title"><p>Bedroom 1</p></div><ul class="dropdown__noactive"><li class="dropdown-item"><p class="c-gray">Double(King)</p><div class="count"><button type="button" class="count-btn count-minus"></button><input type="text" class="input-count count__adults"value="1"readonly=""><button type="button" class="count-btn count-plus"></button></div></li><li class="dropdown-item"><p class="c-gray">Double(Queen)</p><div class="count"><button type="button" class="count-btn count-minus"></button><input type="text" class="input-count count__adults"value="0"readonly=""><button type="button" class="count-btn count-plus"></button></div></li><li class="dropdown-item"><p class="c-gray">Single</p><div class="count"><button type="button" class="count-btn count-minus"></button><input type="text" class="input-count count__adults"value="0"readonly=""><button type="button" class="count-btn count-plus"></button></div></li><li class="dropdown-item"><p class="c-gray">Sofa</p><div class="count"><button type="button" class="count-btn count-minus"></button><input type="text" class="input-count count__adults"value="0"readonly=""><button type="button" class="count-btn count-plus"></button></div></li></ul></div>';
    profile.appendChild(div);
}

function delInput() {
    var div = document.getElementById('input' + x);
    div.remove();
    --x;
}
// Добавить/Удалить__input

// активные/не_активные__элементы(шаг8)
function toggleBilling() {
    var billingItems = document.querySelectorAll('#dis1 input[type="text"]');
    for (var i = 0; i < billingItems.length; i++) {
        billingItems[i].disabled = !billingItems[i].disabled;
    }
}
// активные/не_активные__элементы(шаг8)


// like__btn
$('.like-btn').on('click', function () {
    $(this).toggleClass('active');
    $(this).addClass('block');
});
$('.like-btn').on('mouseout', function () {
    $(this).removeClass('block');
});
// like__btn


//акардеон
(function () {
    var d = document,
        accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
        setAria,
        setAccordionAria,
        switchAccordion,
        touchSupported = ('ontouchstart' in window),
        pointerSupported = ('pointerdown' in window);

    skipClickDelay = function (e) {
        e.preventDefault();
        e.target.click();
    }

    setAriaAttr = function (el, ariaType, newProperty) {
        el.setAttribute(ariaType, newProperty);
    };
    setAccordionAria = function (el1, el2, expanded) {
        switch (expanded) {
            case "true":
                setAriaAttr(el1, 'aria-expanded', 'true');
                setAriaAttr(el2, 'aria-hidden', 'false');
                break;
            case "false":
                setAriaAttr(el1, 'aria-expanded', 'false');
                setAriaAttr(el2, 'aria-hidden', 'true');
                break;
            default:
                break;
        }
    };
    //function
    switchAccordion = function (e) {
        console.log("triggered");
        e.preventDefault();
        var thisAnswer = e.target.parentNode.nextElementSibling;
        var thisQuestion = e.target;
        if (thisAnswer.classList.contains('is-collapsed')) {
            setAccordionAria(thisQuestion, thisAnswer, 'true');
        } else {
            setAccordionAria(thisQuestion, thisAnswer, 'false');
        }
        thisQuestion.classList.toggle('is-collapsed');
        thisQuestion.classList.toggle('is-expanded');
        thisAnswer.classList.toggle('is-collapsed');
        thisAnswer.classList.toggle('is-expanded');

        thisAnswer.classList.toggle('animateIn');
    };
    for (var i = 0, len = accordionToggles.length; i < len; i++) {
        if (touchSupported) {
            accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
        }
        if (pointerSupported) {
            accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
        }
        accordionToggles[i].addEventListener('click', switchAccordion, false);
    }
})();
//акардеон


// галерея__модальное__окно
document.addEventListener("DOMContentLoaded", function () {
    var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
    console.log(scrollbar);
    document.querySelector('[href="#openModal"]').addEventListener('click', function () {
        document.body.style.overflow = 'hidden';
        document.body.style.overflow = 'hidden';
        document.querySelector('#openModal').style.marginLeft = scrollbar;
    });
    document.querySelector('[href="#close__window"]').addEventListener('click', function () {
        document.body.style.overflow = 'visible';
        document.querySelector('#openModal').style.marginLeft = '0px';
    });
});
// галерея__модальное__окно

//slick__slider-начала(главная)
$(document).ready(function () {
    $('.slider').slick({
        arrows: true,
        dots: false,
        slidesToShow: 1,
        // autoplay: true,
        speed: 1000,
        autoplaySpeed: 800,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});
//slick__slider-конец(главная)
//slick__slider-начала(главная)
$(document).ready(function () {
    $('.slider__two').slick({
        arrows: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 3,

        // autoplay: true,
        speed: 1000,
        autoplaySpeed: 800,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });
});
//slick__slider-конец(главная)

//адаптив__к_мобильной__версии__слайдера-начало
$(document).ready(function () {
    var w = $(window).width(); // Получаем ширину окна
    if (w <= 768) { // Если ширина окна меньше, либо равна 600
        $('.modal-dialog').height($('.modal-dialog').width() / 1.5); // Копируем содержимое правой колонки в левую
        $(window).resize(function () {
            $('.modal-dialog').height($('.modal-dialog').width() / 1.5);
        });
    }
});
//адаптив__к_мобильной__версии__слайдера-конец
//slick__slider-конец