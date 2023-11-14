import jump from "jump.js";

/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Hero Slider
4. Init SVG
5. Initialize Hamburger
6. Initialize Testimonials Slider
7. Initialize Parallax


******************************/

jQuery(document).ready(function ($) {
  "use strict";

  /* 
  
	  1. Vars and Inits
  
	  */

  var hamb = $(".hamburger");
  var header = $(".header");
  var hambActive = false;
  var menuActive = false;
  var ctrl = new ScrollMagic.Controller();
  const TIU_DATA = tiuData;

  setHeader();

  $(window).on("resize", function () {
    setHeader();
  });

  $(document).on("scroll", function () {
    setHeader();
  });

  initHeroSlider();
  initSvg();
  initHamburger();
  initNavigation();
  initTestimonialsSlider();
  initParallax();
  initProgressBars();
  initAccordions();
  initLoaders();
  initMilestones();

  /* 
  
	  2. Set Header
  
	  */

  function setHeader() {
    if (window.innerWidth < 992) {
      if ($(window).scrollTop() > 100) {
        header.addClass("scrolled");
      } else {
        header.removeClass("scrolled");
      }
    } else {
      if ($(window).scrollTop() > 100) {
        header.addClass("scrolled");
      } else {
        header.removeClass("scrolled");
      }
    }
    if (window.innerWidth > 991 && menuActive) {
      closeMenu();
    }
  }

  /* 
  
	  3. Init Hero Slider
  
	  */

  function initHeroSlider() {
    if ($(".hero_slider").length) {
      var owl = $(".hero_slider");

      owl.owlCarousel({
        items: 1,
        loop: true,
        smartSpeed: 800,
        autoplay: true,
        nav: false,
        dots: false,
      });

      // add animate.css class(es) to the elements to be animated
      function setAnimation(_elem, _InOut) {
        // Store all animationend event name in a string.
        // cf animate.css documentation
        var animationEndEvent =
          "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

        _elem.each(function () {
          var $elem = $(this);
          var $animationType = "animated " + $elem.data("animation-" + _InOut);

          $elem.addClass($animationType).one(animationEndEvent, function () {
            $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
          });
        });
      }

      // Fired before current slide change
      owl.on("change.owl.carousel", function (event) {
        var $currentItem = $(".owl-item", owl).eq(event.item.index);
        var $elemsToanim = $currentItem.find("[data-animation-out]");
        setAnimation($elemsToanim, "out");
      });

      // Fired after current slide has been changed
      owl.on("changed.owl.carousel", function (event) {
        var $currentItem = $(".owl-item", owl).eq(event.item.index);
        var $elemsToanim = $currentItem.find("[data-animation-in]");
        setAnimation($elemsToanim, "in");
      });

      // Handle Custom Navigation
      if ($(".hero_slider_left").length) {
        var owlPrev = $(".hero_slider_left");
        owlPrev.on("click", function () {
          owl.trigger("prev.owl.carousel");
        });
      }

      if ($(".hero_slider_right").length) {
        var owlNext = $(".hero_slider_right");
        owlNext.on("click", function () {
          owl.trigger("next.owl.carousel");
        });
      }
    }
  }

  /* 
  
	  4. Init SVG
  
	  */

  function initSvg() {
    jQuery("img.svg").each(function () {
      var $img = jQuery(this);
      var imgID = $img.attr("id");
      var imgClass = $img.attr("class");
      var imgURL = $img.attr("src");

      jQuery.get(
        imgURL,
        function (data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find("svg");

          // Add replaced image's ID to the new SVG
          if (typeof imgID !== "undefined") {
            $svg = $svg.attr("id", imgID);
          }
          // Add replaced image's classes to the new SVG
          if (typeof imgClass !== "undefined") {
            $svg = $svg.attr("class", imgClass + " replaced-svg");
          }

          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr("xmlns:a");

          // Replace image with new SVG
          $img.replaceWith($svg);
        },
        "xml"
      );
    });
  }

  /* 
  
	  5. Initialize Hamburger
  
	  */

  function initHamburger() {
    if ($(".hamburger_container").length) {
      var hamb = $(".hamburger_container");

      hamb.on("click", function (event) {
        event.stopPropagation();

        if (!menuActive) {
          openMenu();

          $(document).one("click", function cls(e) {
            if ($(e.target).hasClass("menu_mm")) {
              $(document).one("click", cls);
            } else {
              closeMenu();
            }
          });
        } else {
          $(".menu_container").removeClass("active");
          menuActive = false;
        }
      });
    }
  }

  function initNavigation() {
    const doc = document;

    if (
      doc.querySelectorAll("#headerMainNav li a") &&
      doc.querySelectorAll("#headerMainMobileNav li a") &&
      doc.querySelectorAll("#footerMainNav li a")
    ) {
      doc
        .querySelectorAll("#headerMainNav li a[href^='#']")
        .forEach((navEl) => {
          fireUpNavScroll(navEl);
        });

      doc
        .querySelectorAll("#headerMainMobileNav li a[href^='#']")
        .forEach((navEl) => {
          fireUpNavScroll(navEl);
        });

      doc
        .querySelectorAll("#footerMainNav li a[href^='#']")
        .forEach((navEl) => {
          fireUpNavScroll(navEl);
        });
    }
  }

  function fireUpNavScroll(navEl) {
    const navElHrefAttr = navEl.getAttribute("href");
    const navDomEl = navElHrefAttr.slice(1);

    navEl.addEventListener("click", function (e) {
    	e.preventDefault();

		if (Boolean(TIU_DATA.isBlog)
		|| Boolean(TIU_DATA.isSinglePostView) 
		|| Boolean(TIU_DATA.isStudentRegistrationFormPage)) {
			window.location.href = `${TIU_DATA.isHome}/${navElHrefAttr}`;
		} else {
			jump(`div#${navDomEl}`, {
				duration: 1000,
				offset: -50,
				callback: undefined,
				easing: undefined,
				a11y: false
			});
		}
    });
  }

  function openMenu() {
    var fs = $(".menu_container");
    fs.addClass("active");
    hambActive = true;
    menuActive = true;
  }

  function closeMenu() {
    var fs = $(".menu_container");
    fs.removeClass("active");
    hambActive = false;
    menuActive = false;
  }

  /* 
  
	  6. Initialize Testimonials Slider
  
	  */

  function initTestimonialsSlider() {
    if ($(".testimonials_slider").length) {
      var owl1 = $(".testimonials_slider");

      owl1.owlCarousel({
        items: 1,
        loop: true,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        smartSpeed: 1000,
      });
    }
  }

  /* 
  
	  7. Initialize Parallax
  
	  */

  function initParallax() {
    // Add parallax effect to home slider
    if ($(".slider_prlx").length) {
      var homeBcg = $(".slider_prlx");

      var homeBcgScene = new ScrollMagic.Scene({
        triggerElement: homeBcg,
        triggerHook: 1,
        duration: "100%",
      })
        .setTween(TweenMax.to(homeBcg, 1, { y: "15%", ease: Power0.easeNone }))
        .addTo(ctrl);
    }

    // Add parallax effect to every element with class prlx
    // Add class prlx_parent to the parent of the element
    if ($(".prlx_parent").length && $(".prlx").length) {
      var elements = $(".prlx_parent");

      elements.each(function () {
        var ele = this;
        var bcg = $(ele).find(".prlx");

        var slideParallaxScene = new ScrollMagic.Scene({
          triggerElement: ele,
          triggerHook: 1,
          duration: "200%",
        })
          .setTween(TweenMax.from(bcg, 1, { y: "-30%", ease: Power0.easeNone }))
          .addTo(ctrl);
      });
    }
  }

  /* 

	8. Init Progress Bars

	*/

  function initProgressBars() {
    if ($(".skill_bars").length) {
      var bars = $(".skill_bars");

      bars.each(function () {
        var ele = $(this);
        var elePerc = ele.data("perc");
        var eleName = "#" + ele.attr("id");

        var statsScene = new ScrollMagic.Scene({
          triggerElement: this,
          triggerHook: "onEnter",
          reverse: false,
        })
          .on("start", function () {
            var pbar = new ProgressBar.Line(eleName, {
              strokeWidth: 0.5,
              easing: "easeInOut",
              duration: 1400,
              color: "#ffb606",
              trailColor: "#ffffff",
              trailWidth: 1,
              svgStyle: { display: "block", width: "100%", height: "100%" },
              text: {
                style: {
                  // Text color.
                  // Default: same as stroke color (options.color)
                  fontFamily: "Open Sans",
                  textAlign: "right",
                  fontSize: "14px",
                  width: "40px",
                  color: "#1a1a1a",
                  position: "absolute",
                  right: 0,
                  top: "-33px",
                  padding: 0,
                  margin: 0,
                  transform: null,
                },
                autoStyleContainer: false,
              },
              from: { color: "#00bcd5" },
              to: { color: "#00bcd5" },
              step: function (state, bar) {
                bar.setText(Math.round(bar.value() * 100) + " %");
              },
            });
            pbar.animate(elePerc);
          })
          .addTo(ctrl);
      });
    }
  }

  /* 

	9. Init Accordions

	*/

  function initAccordions() {
    if ($(".accordion").length) {
      var accs = $(".accordion");

      accs.each(function () {
        var acc = $(this);

        acc.on("click", function () {
          acc.toggleClass("active");

          var panel = $(acc.next());
          var panelH = panel.prop("scrollHeight") + "px";

          if (panel.css("max-height") == "0px") {
            panel.css("max-height", panel.prop("scrollHeight") + "px");
          } else {
            panel.css("max-height", "0px");
          }
        });
      });
    }
  }

  /* 

	10. Init Loaders

	*/

  function initLoaders() {
    if ($(".loader").length) {
      var loaders = $(".loader");

      loaders.each(function () {
        var loader = this;
        var endValue = $(loader).data("perc");

        var loaderScene = new ScrollMagic.Scene({
          triggerElement: this,
          triggerHook: "onEnter",
          reverse: false,
        })
          .on("start", function () {
            var bar = new ProgressBar.Circle(loader, {
              color: "#aaa",
              // This has to be the same size as the maximum width to
              // prevent clipping
              strokeWidth: 4,
              trailWidth: 10,
              trailColor: "#f8f4f4",
              easing: "easeInOut",
              duration: 1400,
              text: {
                autoStyleContainer: false,
              },
              from: { color: "#ffb606", width: 2 },
              to: { color: "#ffb606", width: 2 },
              // Set default step function for all animate calls
              step: function (state, circle) {
                circle.path.setAttribute("stroke", state.color);
                circle.path.setAttribute("stroke-width", state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                  circle.setText("0%");
                } else {
                  circle.setText(value + "%");
                }
              },
            });
            bar.text.style.fontFamily = '"Roboto", sans-serif';
            bar.text.style.fontSize = "48px";
            bar.text.style.fontWeight = "400";
            bar.text.style.color = "#ffb606";

            bar.animate(endValue); // Number from 0.0 to 1.0
          })
          .addTo(ctrl);
      });
    }
  }

  /* 

	11. Initialize Milestones

	*/

  function initMilestones() {
    if ($(".milestone_counter").length) {
      var milestoneItems = $(".milestone_counter");

      milestoneItems.each(function (i) {
        var ele = $(this);
        var endValue = ele.data("end-value");
        var eleValue = ele.text();

        /* Use data-sign-before and data-sign-after to add signs
	    		infront or behind the counter number */
        var signBefore = "";
        var signAfter = "";

        if (ele.attr("data-sign-before")) {
          signBefore = ele.attr("data-sign-before");
        }

        if (ele.attr("data-sign-after")) {
          signAfter = ele.attr("data-sign-after");
        }

        var milestoneScene = new ScrollMagic.Scene({
          triggerElement: this,
          triggerHook: "onEnter",
          reverse: false,
        })
          .on("start", function () {
            var counter = { value: eleValue };
            var counterTween = TweenMax.to(counter, 4, {
              value: endValue,
              roundProps: "value",
              ease: Circ.easeOut,
              onUpdate: function () {
                document.getElementsByClassName("milestone_counter")[
                  i
                ].innerHTML = signBefore + counter.value + signAfter;
              },
            });
          })
          .addTo(ctrl);
      });
    }
  }
});
