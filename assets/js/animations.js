var margin = jQuery('.navbutton').outerWidth();
jQuery('.navbutton').css({ "margin-right": -margin });

function navAnimation() {
    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 50) {
            jQuery("nav").addClass("scrolled-nav");
        } else {
            jQuery("nav").removeClass("scrolled-nav");
        }
    });

} navAnimation()

function buttonAnimation() {
    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= 300) {
            jQuery(" .navbutton").addClass("scrolled-button");
            jQuery('.navbutton').css({ "margin-right": 0 });
            jQuery('.navbutton').css({ "margin-left": '1.5rem' });
            jQuery('.navbutton').css({ "opacity": 1 });
            jQuery('.navbutton').css({ "pointer-events": "all" });
        } else {
            jQuery(" .navbutton").removeClass("scrolled-button");
            jQuery('.navbutton').css({ "margin-right": -margin });
            jQuery('.navbutton').css({ "margin-left": 0 });
            jQuery('.navbutton').css({ "opacity": 0 });
            jQuery('.navbutton').css({ "pointer-events": "none" });
        }
    });

} buttonAnimation()




/*var tween = TweenMax.to("nav#navbar", 1, { background: "rgba(255,255,255,1)" });
var scene = new ScrollMagic.Scene({ triggerElement: "#hero", duration: '20%', triggerHook: 0, offset: 50 })
    .setTween(tween)
    .addIndicators()
    .addTo(controller);

var tween = TweenMax.to("header nav .row .main-nav ul li a", 1, { color: "rgba(30,45,79,1)" });
var scene = new ScrollMagic.Scene({ triggerElement: "#hero", duration: '20%', triggerHook: 0, offset: 50 })
    .setTween(tween)
    .addIndicators()
    .addTo(controller);

*/