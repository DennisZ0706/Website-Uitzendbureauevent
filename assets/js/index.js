// Notificationbar

function notificationBar() {
    jQuery("body").on('click', '.close-notify', function () {
        jQuery('.notify').slideUp(200);
    });
}
notificationBar()

// Theme 

function readmore() {
    jQuery("body").on('click', '.read-more', function () {
        var id = jQuery(this).attr('themeID');
        jQuery('.' + id).toggleClass('show-content');
        jQuery('.read-more').toggleClass('clicked');
        var text = jQuery('.read-more').text();
        jQuery('.read-more').text(
            text == "Toon meer" ? "Toon minder" : "Toon meer");

    });
}

readmore()

// Movie

function video() {
    jQuery("body").on('click', '.play-video', function () {
        jQuery(this).addClass('video-active');
        var id = jQuery(this).attr('videoID');
        jQuery('.' + id)[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
    });
}
video()

function videoTabs() {
    jQuery(document).on("click", ".tabs-nav div", function () {
        var numberIndex = jQuery(this).index();

        if (!jQuery(this).is("tab-active")) {
            jQuery(".tabs-nav div").removeClass("tab-active");
            jQuery(".tabs li").removeClass("tab-active");

            jQuery(this).addClass("tab-active");
            jQuery(".tabs").find("li:eq(" + numberIndex + ")").addClass("tab-active");
        }
    });

    jQuery("body").on('click', '.tabs li', function () {
        jQuery('.tab-items .active').removeClass('active');
        jQuery('.active').removeClass('active');
        jQuery(this).addClass('active');
    });
}

videoTabs()

// Agenda

function agendaTabs() {

    jQuery(document).on("click", ".location-nav div", function () {
        var numberIndex = jQuery(this).index();
        if (!jQuery(this).is("tab-active")) {
            jQuery(".location-nav div").removeClass("tab-active");
            jQuery(".locations li").removeClass("tab-active");
            jQuery(this).addClass("tab-active");
            jQuery(".locations").find("li:eq(" + numberIndex + ")").addClass("tab-active");
        }
    });

    jQuery("body").on('click', '.locations li', function () {
        jQuery('.location .active').removeClass('active');
        jQuery('.active').removeClass('active');
        jQuery(this).addClass('active');
    });
}

agendaTabs()

// FAQ

function faq() {
    jQuery("body").on('click', '.faq-item', function () {
        jQuery('.open').not(this).find('.content').slideToggle(300);
        jQuery('.open').not(this).removeClass('open');
        jQuery(this).find('.content').slideToggle(300);
        jQuery(this).toggleClass('open');
    });
}
faq()

function yearSelector() {

    jQuery("body").on('click', '.dropdown-content .option', function () {
        var year = jQuery(this).attr('year');
        jQuery('.active').removeClass('active').addClass('hidden');
        jQuery('.' + year).removeClass('hidden').addClass('active');
        jQuery('.active-dropdown-year').text(year);
    });
}
yearSelector()

// Partners

function partnerSlider() {
    var swiperPartner = new Swiper(".partnerSwiper", {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {

            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },

            1400: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        }
    });
}

partnerSlider()


// function agendaTabs() {
//    var currentYear = jQuery('.dropdown-content .option').attr('year');
//    jQuery("body").on('click', '.agenda' + currentYear + ' .location-nav .location-tab', function () {
//        jQuery('.agenda' + currentYear + ')
//        )
//    });
//}
// agendaTabs()


// function yearSelector() {
//    jQuery("body").on('click', '.dropdown-content .option', function () {
//       var year = jQuery(this).attr('year');
//        jQuery('.active').fadeOut(200).addClass('hidden');
//        jQuery('#' + year).removeClass('hidden').fadeIn(200).addClass('active').fadeIn(200);
//       jQuery('.active-dropdown-year').text(year);
//    });
// }

// yearSelector()

// agendaTabs()






