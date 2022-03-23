let _window = $(window);
let _document = $(document);

$(document).ready(function () {

    function pageReady() {
        // вспомогательные скрипты, библиотеки
        legacySupport();
        // activeHeaderScroll();
        // инициализация библиотек
        // initSliders();
        // initPopups();
        // initSelectric();
        // кастомные скрипты
        burgerMenu();
        scrollTop();
        headerHeightFun();
        vhModule();
        faqSlideToggle();
        datePicker();
        accountAccordion();
        stepsForms();
        inputMask();
        inputPhoto();
        sortColumn();
        sectionNavigation();
        $("input[name='additional_info[square]'],input[name='additional_info[rooms]'],input[name='additional_info[floor]'],input[name='additional_info[number]'],input[name='additional_info[zip]'],input[name='additional_info[to][square]'],input[name='additional_info[to][floor]'],input[name='additional_info[to][zip]'],input[name='additional_info[to][number]'],input[name='additional_info[from][square]'],input[name='additional_info[from][rooms]'],input[name='additional_info[from][zip]'],input[name='additional_info[from][number]'],input[name='additional_info[from][floor]']").inputFilter(function(value) {
            return /^\d*$/.test(value);    // Allow digits only, using a RegExp
        });
    }

    (function () {
        document.querySelectorAll('a[href^="#id-"]').forEach(a => {
            a.id = a.getAttribute('href').replace('#id-', 'section-')
            
            a.style.height = '0';
            a.style.overflow = 'hidden';
            a.style.display = 'block';
        })
    })();

    pageReady();

    window.addEventListener('resize', () => {
        headerHeightFun();
    });

    $('.allecheck').click(function () {
        $('input[name^="regions_ids"]').each(function () {
            $(this).attr('checked','checked');
        })
    })

});

(function($) {
    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    };
}(jQuery));

$('#partner-info-form').submit(e => {
    e.preventDefault();

    $('.js-partner-info-check-field').each(function () {
        if ($(this).val() !== $(this).attr('data-initial-value')) {
            e.target.new_request_update.value = true;
        }
    })

    const formData = new FormData(e.target);
    
    fetch(`${e.target.action}`, {
        method: 'POST',
        body: formData
    })
        .then((response) => {
            if (e.target.new_request_update.value === 'true') {
                alert('Die Anfrage auf Änderung der Daten wurde angenommen. Die Informationen werden aktualisiert, sobald sie vom Administrator der Website überprüft wurden.')
            } else {
                alert('Daten aktualisiert');
            }
        })
});

$("#minisearch").keyup(function() {

    // Retrieve the input field text and reset the count to zero
    var filter = $(this).val(),
        count = 0;

    // Loop through the comment list
    $('.acc-billing__inner>div').each(function() {


        // If the list item does not contain the text phrase fade it out
        if ($(this).find('.acc-billing-item__path').text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();  // MY CHANGE

            // Show the list item if the phrase matches and increase the count by 1
        } else {
            $(this).show(); // MY CHANGE
            count++;
        }

    });

});

function sectionNavigation() {
    _document
        .on('click', '[href="#"]', function (e) {
            e.preventDefault();
        })
        .on('click', 'a[href^="#section"]', function () {
            let el = $(this).attr('href');
            $('body, html').animate({
                scrollTop: $(el).offset().top - document.querySelector('.header').offsetHeight - 30
            }, 1000);
            return false;
        })
}

function sortColumn() {
    if(!document.querySelector('.js-temporary-wrap')) return;
    
    const wrap = document.querySelector('.js-temporary-wrap')
    const col_1 = document.querySelector('.reviews__l');
    const col_2 = document.querySelector('.reviews__c');
    const col_3 = document.querySelector('.reviews__r');

    function sort() {
        let i = 1;

        if (wrap.querySelectorAll('.review').length <= 9) {
            document.querySelector('.reviews__btn-more').style.display = 'none';
        }

        [...wrap.querySelectorAll('.review')].slice(0, 9).forEach(current=>{
            if(i === 1) {
                col_1.append(current);
            } else if(i === 2) {
                col_2.append(current);
            } else if(i === 3) {
                col_3.append(current);
                i = 0;
            }
            i++;
        });

    }

    sort();

    document.querySelector('.reviews__btn-more').addEventListener('click', sort)
}

function accountAccordion() {
    // $('.account-sidebar__btn').click(function(){
    //     let accordion = $(this).closest('.account-sidebar__wrap-item');
    //     accordion.toggleClass('account-sidebar__wrap-item_open');
    //     accordion.find('.account-sidebar__sublist').slideToggle();
    // });

    $('.account-sidebar__wrap-item').click(function () {
        if (!$(this).find('.account-sidebar__btn').length) return;

        $(this).toggleClass('account-sidebar__wrap-item_open');
        $(this).find('.account-sidebar__sublist').slideToggle();
    })

    $('.account-sidebar__link, .account-sidebar__sublink').click(function (e) {
        e.stopPropagation()
    })

    $('.account-sidebar__item_current').find('.account-sidebar__btn').click();

    $('.acc-billing-item__btn-info').click(function(){
        let accordion = $(this).closest('.acc-billing-item');
        accordion.toggleClass('acc-billing-item_open');
        accordion.find('.acc-billing-item__slide-content').slideToggle();
    });

    $('.acc-billing-item__btn-offers-company').click(function(){
        let accordion = $(this).closest('.acc-billing-item');
        $(this).toggleClass('acc-billing-item__btn-offers-company_open');
        accordion.find('.acc-billing-item__slide-content2').slideToggle();
    });

    $('.acc-billing-item__btn-cancel2').click(function (e) {
        if (!confirm('Sind Sie sicher, dass Sie den Auftrag löschen wollen?')) {
            e.preventDefault();
        }

        // if($(this).hasClass('acc-billing-item__btn-cancel2_canceled')) return;

        // $(this).addClass('acc-billing-item__btn-cancel2_canceled');
        // $(this).text($(this).data('canceled'));

        // item = $(this).closest('.acc-billing-item');
        // item.find('.acc-billing-item__btn-offers-company').remove();
        // item.find('.acc-billing-item__slide-content2').remove();

    });

}
function activeHeaderScroll() {

    let header = $('header.header');
    _window.on('scroll load', function () {
        if (_window.scrollTop() >= 10) {
            header.addClass('active');
        } else {
            header.removeClass('active');
        }
    });

}
function burgerMenu() {

    let burger = $('.burger');
    let menu = $('.header__nav');
    let arrowSubs = $('.header__sub-arrow');
    let arrowSubs_footer = $('.footer__sub-arrow');

    function changeStateNav() {
        if(window.innerWidth <= 992) {
            menu.addClass('header__nav_transition');
        } else {
            menu.removeClass('header__nav_transition');

            arrowSubs.removeClass('header__sub-arrow_select');
            $('.header__wrap-sub-menu').css({ display: '', });
        }
    }

    window.addEventListener('resize', changeStateNav);
    changeStateNav();

    arrowSubs.click(function(e){
        e.preventDefault();
        $(this).toggleClass('header__sub-arrow_select');
        $(this).parent().next().slideToggle();
    });

    arrowSubs_footer.click(function(e){
        e.preventDefault();
        $(this).toggleClass('footer__sub-arrow_select');
        $(this).parent().next().slideToggle();
    });

    $(document).click(function (e) {

        if (burger.is(e.target) || burger.has(e.target).length === 1) {
            if (menu.hasClass('active')) {
                menu.removeClass('active');
                burger.removeClass('active');

                $('body').removeClass('body_hidden');
            } else {
                menu.addClass('active');
                burger.addClass('active');

                $('body').addClass('body_hidden');
            }
        } else if (!menu.is(e.target) && menu.has(e.target).length === 0 && menu.hasClass('active')) {
            menu.removeClass('active');
            burger.removeClass('active');

            $('body').removeClass('body_hidden');
        }

    });

}
function datePicker() {
    $('[data-toggle="datepicker"]').datepicker({
        startDate: Date,
        language: 'ru-RU',
        autoHide: true,
        format: 'dd-mm-yyyy',
        weekStart: 1,
        daysMin: ['So', 'Mo', 'DI', 'Mi', 'Do', 'Fr', 'Sa'],
        months: ['January', 'February', 'March', 'April', 'May', 'June', 'Jule', 'August', 'September', 'October', 'November', 'December'],
        monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    });
}
function faqSlideToggle() {
    $('.faq-item__btn').click(function(){
        let thisAccor = $(this).closest('.faq-item');
        thisAccor.toggleClass('faq-item_open');
        thisAccor.find('.faq-item__content').slideToggle();
        if(thisAccor.hasClass('faq-item_open')) {
            $(this).text($(this).data('hide-content'))
        } else {
            $(this).text($(this).data('show-content'))
        }
    });
}
function headerHeightFun() {
    if(!document.querySelector('.header')) return;
    let headerHeight = document.querySelector('.header').offsetHeight;
    document.documentElement.style.setProperty('--headerHeight', `${headerHeight}px`);
}
function initPopups() {

    // Magnific Popup
    let startWindowScroll = 0;
    $('.js-popup').magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'popup-buble',
        callbacks: {
            beforeOpen: function () {
                startWindowScroll = _window.scrollTop();
            },
            close: function () {
                _window.scrollTop(startWindowScroll);
            }
        }
    });

    // $.magnificPopup.close();

}
function initSelectric() {
    $('select').selectric({
        maxHeight: 300,
        arrowButtonMarkup: '<b class="button"></b>',

        onInit: function (element, data) {
            var $elm = $(element),
                $wrapper = $elm.closest('.' + data.classes.wrapper);

            $wrapper.find('.label').html($elm.attr('placeholder'));
        },
        onBeforeOpen: function (element, data) {
            var $elm = $(element),
                $wrapper = $elm.closest('.' + data.classes.wrapper);

            $wrapper.find('.label').data('value', $wrapper.find('.label').html()).html($elm.attr('placeholder'));
        },
        onBeforeClose: function (element, data) {
            var $elm = $(element),
                $wrapper = $elm.closest('.' + data.classes.wrapper);

            $wrapper.find('.label').html($wrapper.find('.label').data('value'));
        }
    });
}
function initSliders() {

}
function inputMask() {
    $(".js-card-number").mask("0000 0000 0000 0000");
    $(".js-card-expiry-date").mask("00/00");
    $(".js-card-sequrity-code").mask("000");
}
function legacySupport() {
    svg4everybody();
}
function scrollTop() {
    _window.scroll(function () {
        if ($(this).scrollTop() > 250) {
            $('#back-top').fadeIn(300);
        } else {
            $('#back-top').fadeOut(300);
        }
    });

    $('#back-top').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 750);
        return false;
    });
}

function inputPhoto() {
    if(document.querySelector('.acc-company-profile__photo')) {
        let inputFile = document.querySelector('.js-input-photo');
        inputFile.addEventListener('change', function(e){
            let reader = new FileReader();
            let file = inputFile.files[0];
            let wrapPhoto = inputFile.closest('.acc-company-profile__photo');
            let photoElem = wrapPhoto.querySelector('.js-photo-result');
            reader.readAsDataURL(file);
            reader.addEventListener('load', function(ev2) {
                photoElem.src = ev2.target.result;
            });
        })
    }
}

function stepsForms() {
    if(!document.querySelector('.steps-forms')) return;

    let data = {};
    let stepsItemElem = document.querySelectorAll('.steps-indicators__item');
    let formsElem = document.querySelectorAll('.temp-form-steps');
    let btnPrevForms = document.querySelectorAll('.temp-form-steps .prev-step');
    let isChangeForm = false;
    let isSendData = false;
    let indexStepReturned = 0;

    if(document.querySelectorAll('input[type="file"]').length) {
        let inputFile = document.querySelectorAll('input[type="file"]');
        inputFile.forEach((current) => {
            current.addEventListener('change', function(e){
                let nameFile = current.files[0].name;
                let wrap = current.closest('.js-wrap-input-file');
                wrap.querySelector('.js-txt-input-file').innerHTML = nameFile;
            })
        });
    }

    function formHandler(e) {
        e.preventDefault();

        let formData = new FormData(e.target);

        for(let key of formData.keys()) {
            if(data[key]) delete data[key];
        }

        for(let key of formData.keys()) {
                if (key.indexOf("[]") >= 0) {
                    data[key] = [];
                } else {
                    data[key] = true;
                }
        }

        for(let [key, value] of formData.entries()) {
            if(Array.isArray(data[key])) {
                data[key].push(value);
            } else {
                data[key] = value;
            }
        }

        if(e.target.dataset.name === 'profile') {
            let inputPassword = e.target.querySelector('input[name="password"]');
            let inputPasswordConfirm = e.target.querySelector('input[name="password_confirmation"]');
            
            inputPassword.nextElementSibling.textContent = '';
            inputPasswordConfirm.nextElementSibling.textContent = '';

            inputPassword.classList.remove('is-invalid');
            inputPasswordConfirm.classList.remove('is-invalid');
            
            if (inputPassword.value.trim().length < 8 || inputPassword.value.trim() !== inputPasswordConfirm.value.trim()) {
                inputPassword.classList.add('is-invalid');
                inputPasswordConfirm.classList.add('is-invalid');

                if (inputPassword.value.trim().length < 8) {
                    inputPassword.nextElementSibling.textContent = 'Das Passwort ist zu kurz';
                } else if (inputPassword.value.trim() !== inputPasswordConfirm.value.trim()) {
                    inputPasswordConfirm.nextElementSibling.textContent = 'Passwörter stimmen nicht überein';
                }

                return;
            }
        }

        if(e.target.dataset.name === 'profile' ||  e.target.dataset.name === 'region') {
            if (e.target.querySelectorAll('input[type="checkbox"]').length && !e.target.querySelectorAll('input[type="checkbox"]:checked').length) {
                jQuery('.steps-form__checkboxes .invalid-feedback').show();
                return;
            } else {
                jQuery('.steps-form__checkboxes .invalid-feedback').hide();
            }
        }

        if (e.target.dataset.name === 'general-data' || "mailcheck" === e.target.dataset.name) {
            let inputEmail = e.target.querySelector('input[type="email"]');
            let email = $(inputEmail).val();
            let url = $(e.target).attr('email-check');
            let mailcheck = true;
            jQuery.ajax({
                type:"POST",
                url:url,
                data:{"email":email},
                dataType:'html',
                success: function(data){
                    mailcheck = JSON.parse(data).success;
                    if(mailcheck == false){
                        $(inputEmail).parent().find('.invalid-feedback').show();
                        $(inputEmail).addClass('is-invalid');

                        $("body, html").animate({
                            scrollTop: $(inputEmail).offset().top - 150
                        }, 900)
            
                        return;
                    }else{
                        $(inputEmail).removeClass('is-invalid');
                        $(inputEmail).parent().find('.invalid-feedback').hide();
                        nextFormHandler();
                    }
                }
            });
        }else{
            nextFormHandler();
        }
    }

    function nextFormHandler() {
        if(isChangeForm) return;
        isChangeForm = true;

        let activeForm = document.querySelector('.temp-form-steps_active');

        if (indexStepReturned == $(activeForm).index()) {
            indexStepReturned = 0
        }

        if (!indexStepReturned) {
            window.dataLayer.push({
                'event': `Step${$(activeForm).index()+1}complete`
            });
        }

        if(!activeForm.nextElementSibling) {
            if(!isSendData) {
                isSendData = true;
                sendData();
            }
            return
        };

        let nextActiveForm = activeForm.nextElementSibling;
        activeForm.classList.remove('temp-form-steps_active');
        nextActiveForm.classList.add('temp-form-steps_active');

        $(activeForm).hide();
        $(nextActiveForm).fadeIn(400, ()=> {
            isChangeForm = false;
        });

        progressBarSteps();
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#section-steps").offset().top
        }, 1000);
    }

    function btnPrevHandler(e) {
        e.preventDefault();
        if(isChangeForm) return;

        isChangeForm = true;
        let activeForm = document.querySelector('.temp-form-steps_active');

        if (!indexStepReturned) {
            indexStepReturned = $(activeForm).index()
        }

        if(!activeForm.previousElementSibling) return;

        let prevActiveForm = activeForm.previousElementSibling;
        activeForm.classList.remove('temp-form-steps_active');
        prevActiveForm.classList.add('temp-form-steps_active');

        $(activeForm).hide();
        $(prevActiveForm).fadeIn(400, ()=> {
            isChangeForm = false;
        });

        progressBarSteps();
    }

    function sendData() {
        let url = $('.temp-form-steps_active').attr('data-url');
        let formDataObj = new FormData();

        for (let key in data) {
            if (key.indexOf("[]") >= 0) {
                formDataObj.append(key.replace('[]', ''), JSON.stringify(data[key]));
            } else {
                formDataObj.append(key, data[key]);
            }
        }

        $.ajax({
            type: "POST",
            url: url,
            data: formDataObj,
            processData: false,
            contentType: false,
            enctype: 'multipart/form-data',
            success: function (response) {
                window.location.href = response.url;
            }
        });

    }

    function progressBarSteps() {
        if (document.querySelector('.steps-indicators')) {
            let activeForm = document.querySelector('.temp-form-steps_active');
            let countStepsActive = $(activeForm).index()+1;
    
            for(let i = 0; i < stepsItemElem.length; i++) {
                stepsItemElem[i].classList.remove('steps-indicators__item_active')
            }
    
            for(let i = 0; i < countStepsActive; i++) {
                stepsItemElem[i].classList.add('steps-indicators__item_active')
            }
        } else if (document.querySelector('.progress-bar')) {
            const totalSteps = document.querySelectorAll('.temp-form-steps').length
            const countStepsActive = $('.temp-form-steps_active').index()
            const percent = Math.round((countStepsActive * 100) / totalSteps)
            document.querySelector('.progress-bar__fullnely').style.width = percent + '%'
            document.querySelector('.progress-bar__percent').textContent = percent + '%'
        }
    }

    formsElem.forEach(form => {
        form.addEventListener('submit', formHandler)
    });

    btnPrevForms.forEach(btn => {
        btn.addEventListener('click', btnPrevHandler)
    });

    document.addEventListener('click', function(e){
        if(e.target.closest('.is-invalid')) {
            e.target.closest('.is-invalid').classList.remove('is-invalid')
        }
    })
}




function vhModule() {

    // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
    let vh = window.innerHeight * 0.01;
    // Then we set the value in the --vh custom property to the root of the document
    document.documentElement.style.setProperty('--vh', `${vh}px`);

    // We listen to the resize event
    window.addEventListener('resize', () => {
    // We execute the same script as before
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    // headerHeightFun();
    });

}


$('.main-banner__form select[name="service"]').change(function () {
    let target = $(this).val();
    $('.main-banner__form').attr('action', target);
});


(function () {
    document.querySelectorAll('.section-txt .steps-desc__txt').forEach((el) => {
        const span = document.createElement('span');
        span.textContent = el.textContent
        el.textContent = ''
        el.appendChild(span)

        if (span.getClientRects().length > 4) {
            const button = document.createElement('button')
            button.textContent = 'Mehr lesen'
            button.addEventListener('click', () => {
                button.previousElementSibling.classList.add('show-full')
                button.style.display = 'none'
            })
            el.insertAdjacentElement('afterend', button)  
        }
    })
})();