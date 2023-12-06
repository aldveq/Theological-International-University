/*global jQuery, ScrollMagic, tiuData, TweenMax, Power0, ProgressBar, Circ*/

import jump from 'jump.js';

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

jQuery( document ).ready( function( $ ) {
	'use strict';

	/*

	  1. Vars and Inits

	  */

	const header = $( '.header' );
	let menuActive = false;
	const ctrl = new ScrollMagic.Controller();
	const TIU_DATA = tiuData;

	setHeader();

	$( window ).on( 'resize', function() {
		setHeader();
	} );

	$( document ).on( 'scroll', function() {
		setHeader();
	} );

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
		if ( window.innerWidth < 992 ) {
			if ( $( window ).scrollTop() > 100 ) {
				header.addClass( 'scrolled' );
			} else {
				header.removeClass( 'scrolled' );
			}
		} else if ( $( window ).scrollTop() > 100 ) {
			header.addClass( 'scrolled' );
		} else {
			header.removeClass( 'scrolled' );
		}
		if ( window.innerWidth > 991 && menuActive ) {
			closeMenu();
		}
	}

	/*

	  3. Init Hero Slider

	  */

	function initHeroSlider() {
		if ( $( '.hero_slider' ).length ) {
			const owl = $( '.hero_slider' );

			owl.owlCarousel( {
				items: 1,
				loop: true,
				smartSpeed: 800,
				autoplay: true,
				nav: false,
				dots: false,
			} );

			// add animate.css class(es) to the elements to be animated
			function setAnimation( _elem, _InOut ) {
				// Store all animationend event name in a string.
				// cf animate.css documentation
				const animationEndEvent =
          'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

				_elem.each( function() {
					const $elem = $( this );
					const $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );

					$elem.addClass( $animationType ).one( animationEndEvent, function() {
						$elem.removeClass( $animationType ); // remove animate.css Class at the end of the animations
					} );
				} );
			}

			// Fired before current slide change
			owl.on( 'change.owl.carousel', function( event ) {
				const $currentItem = $( '.owl-item', owl ).eq( event.item.index );
				const $elemsToanim = $currentItem.find( '[data-animation-out]' );
				setAnimation( $elemsToanim, 'out' );
			} );

			// Fired after current slide has been changed
			owl.on( 'changed.owl.carousel', function( event ) {
				const $currentItem = $( '.owl-item', owl ).eq( event.item.index );
				const $elemsToanim = $currentItem.find( '[data-animation-in]' );
				setAnimation( $elemsToanim, 'in' );
			} );

			// Handle Custom Navigation
			if ( $( '.hero_slider_left' ).length ) {
				const owlPrev = $( '.hero_slider_left' );
				owlPrev.on( 'click', function() {
					owl.trigger( 'prev.owl.carousel' );
				} );
			}

			if ( $( '.hero_slider_right' ).length ) {
				const owlNext = $( '.hero_slider_right' );
				owlNext.on( 'click', function() {
					owl.trigger( 'next.owl.carousel' );
				} );
			}
		}
	}

	/*

	  4. Init SVG

	  */

	function initSvg() {
		jQuery( 'img.svg' ).each( function() {
			const $img = jQuery( this );
			const imgID = $img.attr( 'id' );
			const imgClass = $img.attr( 'class' );
			const imgURL = $img.attr( 'src' );

			jQuery.get(
				imgURL,
				function( data ) {
					// Get the SVG tag, ignore the rest
					let $svg = jQuery( data ).find( 'svg' );

					// Add replaced image's ID to the new SVG
					if ( typeof imgID !== 'undefined' ) {
						$svg = $svg.attr( 'id', imgID );
					}
					// Add replaced image's classes to the new SVG
					if ( typeof imgClass !== 'undefined' ) {
						$svg = $svg.attr( 'class', imgClass + ' replaced-svg' );
					}

					// Remove any invalid XML tags as per http://validator.w3.org
					$svg = $svg.removeAttr( 'xmlns:a' );

					// Replace image with new SVG
					$img.replaceWith( $svg );
				},
				'xml'
			);
		} );
	}

	/*

	  5. Initialize Hamburger

	  */

	function initHamburger() {
		if ( $( '.hamburger_container' ).length ) {
			const hamb = $( '.hamburger_container' );

			hamb.on( 'click', function( event ) {
				event.stopPropagation();

				if ( ! menuActive ) {
					openMenu();

					$( document ).one( 'click', function cls( e ) {
						if ( $( e.target ).hasClass( 'menu_mm' ) ) {
							$( document ).one( 'click', cls );
						} else {
							closeMenu();
						}
					} );
				} else {
					$( '.menu_container' ).removeClass( 'active' );
					menuActive = false;
				}
			} );
		}
	}

	function initNavigation() {
		const doc = document;

		if (
			doc.querySelectorAll( '#headerMainNav li a' ) &&
      doc.querySelectorAll( '#headerMainMobileNav li a' ) &&
      doc.querySelectorAll( '#footerMainNav li a' )
		) {
			doc
				.querySelectorAll( "#headerMainNav li a[href^='#']" )
				.forEach( ( navEl ) => {
					fireUpNavScroll( navEl );
				} );

			doc
				.querySelectorAll( "#headerMainMobileNav li a[href^='#']" )
				.forEach( ( navEl ) => {
					fireUpNavScroll( navEl );
				} );

			doc
				.querySelectorAll( "#footerMainNav li a[href^='#']" )
				.forEach( ( navEl ) => {
					fireUpNavScroll( navEl );
				} );
		}
	}

	function fireUpNavScroll( navEl ) {
		const navElHrefAttr = navEl.getAttribute( 'href' );
		const navDomEl = navElHrefAttr.slice( 1 );

		navEl.addEventListener( 'click', function( e ) {
			e.preventDefault();

			if ( Boolean( TIU_DATA.isPage ) ||
			Boolean( TIU_DATA.isBlog ) ||
		Boolean( TIU_DATA.isSinglePostView ) ) {
				if ( TIU_DATA.isFrontPage ) {
					jump( `div#${ navDomEl }`, {
						duration: 1000,
						offset: -50,
						callback: undefined,
						easing: undefined,
						a11y: false,
					} );
				} else {
					window.location.href = `${ TIU_DATA.isHome }/${ navElHrefAttr }`;
				}
			}
		} );
	}

	function openMenu() {
		const fs = $( '.menu_container' );
		fs.addClass( 'active' );
	}

	function closeMenu() {
		const fs = $( '.menu_container' );
		fs.removeClass( 'active' );
	}

	/*

	  6. Initialize Testimonials Slider

	  */

	function initTestimonialsSlider() {
		if ( $( '.testimonials_slider' ).length ) {
			const owl1 = $( '.testimonials_slider' );

			owl1.owlCarousel( {
				items: 1,
				loop: true,
				nav: false,
				autoplay: true,
				autoplayTimeout: 5000,
				smartSpeed: 1000,
			} );
		}
	}

	/*

	  7. Initialize Parallax

	  */

	function initParallax() {
		// Add parallax effect to home slider
		if ( $( '.slider_prlx' ).length ) {
			const homeBcg = $( '.slider_prlx' );

			new ScrollMagic.Scene( {
				triggerElement: homeBcg,
				triggerHook: 1,
				duration: '100%',
			} )
				.setTween( TweenMax.to( homeBcg, 1, { y: '15%', ease: Power0.easeNone } ) )
				.addTo( ctrl );
		}

		// Add parallax effect to every element with class prlx
		// Add class prlx_parent to the parent of the element
		if ( $( '.prlx_parent' ).length && $( '.prlx' ).length ) {
			const elements = $( '.prlx_parent' );

			elements.each( function() {
				const ele = this;
				const bcg = $( ele ).find( '.prlx' );

				new ScrollMagic.Scene( {
					triggerElement: ele,
					triggerHook: 1,
					duration: '200%',
				} )
					.setTween( TweenMax.from( bcg, 1, { y: '-30%', ease: Power0.easeNone } ) )
					.addTo( ctrl );
			} );
		}
	}

	/*

	8. Init Progress Bars

	*/

	function initProgressBars() {
		if ( $( '.skill_bars' ).length ) {
			const bars = $( '.skill_bars' );

			bars.each( function() {
				const ele = $( this );
				const elePerc = ele.data( 'perc' );
				const eleName = '#' + ele.attr( 'id' );

				new ScrollMagic.Scene( {
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
				} )
					.on( 'start', function() {
						const pbar = new ProgressBar.Line( eleName, {
							strokeWidth: 0.5,
							easing: 'easeInOut',
							duration: 1400,
							color: '#ffb606',
							trailColor: '#ffffff',
							trailWidth: 1,
							svgStyle: { display: 'block', width: '100%', height: '100%' },
							text: {
								style: {
									// Text color.
									// Default: same as stroke color (options.color)
									fontFamily: 'Open Sans',
									textAlign: 'right',
									fontSize: '14px',
									width: '40px',
									color: '#1a1a1a',
									position: 'absolute',
									right: 0,
									top: '-33px',
									padding: 0,
									margin: 0,
									transform: null,
								},
								autoStyleContainer: false,
							},
							from: { color: '#00bcd5' },
							to: { color: '#00bcd5' },
							step( state, bar ) {
								bar.setText( Math.round( bar.value() * 100 ) + ' %' );
							},
						} );
						pbar.animate( elePerc );
					} )
					.addTo( ctrl );
			} );
		}
	}

	/*

	9. Init Accordions

	*/

	function initAccordions() {
		if ( $( '.accordion' ).length ) {
			const accs = $( '.accordion' );

			accs.each( function() {
				const acc = $( this );

				acc.on( 'click', function() {
					acc.toggleClass( 'active' );

					const panel = $( acc.next() );

					if ( panel.css( 'max-height' ) === '0px' ) {
						panel.css( 'max-height', panel.prop( 'scrollHeight' ) + 'px' );
					} else {
						panel.css( 'max-height', '0px' );
					}
				} );
			} );
		}
	}

	/*

	10. Init Loaders

	*/

	function initLoaders() {
		if ( $( '.loader' ).length ) {
			const loaders = $( '.loader' );

			loaders.each( function() {
				const loader = this;
				const endValue = $( loader ).data( 'perc' );

				new ScrollMagic.Scene( {
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
				} )
					.on( 'start', function() {
						const bar = new ProgressBar.Circle( loader, {
							color: '#aaa',
							// This has to be the same size as the maximum width to
							// prevent clipping
							strokeWidth: 4,
							trailWidth: 10,
							trailColor: '#f8f4f4',
							easing: 'easeInOut',
							duration: 1400,
							text: {
								autoStyleContainer: false,
							},
							from: { color: '#ffb606', width: 2 },
							to: { color: '#ffb606', width: 2 },
							// Set default step function for all animate calls
							step( state, circle ) {
								circle.path.setAttribute( 'stroke', state.color );
								circle.path.setAttribute( 'stroke-width', state.width );

								const value = Math.round( circle.value() * 100 );
								if ( value === 0 ) {
									circle.setText( '0%' );
								} else {
									circle.setText( value + '%' );
								}
							},
						} );
						bar.text.style.fontFamily = '"Roboto", sans-serif';
						bar.text.style.fontSize = '48px';
						bar.text.style.fontWeight = '400';
						bar.text.style.color = '#ffb606';

						bar.animate( endValue ); // Number from 0.0 to 1.0
					} )
					.addTo( ctrl );
			} );
		}
	}

	/*

	11. Initialize Milestones

	*/

	function initMilestones() {
		if ( $( '.milestone_counter' ).length ) {
			const milestoneItems = $( '.milestone_counter' );

			milestoneItems.each( function( i ) {
				const ele = $( this );
				const endValue = ele.data( 'end-value' );
				const eleValue = ele.text();

				/* Use data-sign-before and data-sign-after to add signs
	    		infront or behind the counter number */
				let signBefore = '';
				let signAfter = '';

				if ( ele.attr( 'data-sign-before' ) ) {
					signBefore = ele.attr( 'data-sign-before' );
				}

				if ( ele.attr( 'data-sign-after' ) ) {
					signAfter = ele.attr( 'data-sign-after' );
				}

				new ScrollMagic.Scene( {
					triggerElement: this,
					triggerHook: 'onEnter',
					reverse: false,
				} )
					.on( 'start', function() {
						const counter = { value: eleValue };
						TweenMax.to( counter, 4, {
							value: endValue,
							roundProps: 'value',
							ease: Circ.easeOut,
							onUpdate() {
								document.getElementsByClassName( 'milestone_counter' )[
									i
								].innerHTML = signBefore + counter.value + signAfter;
							},
						} );
					} )
					.addTo( ctrl );
			} );
		}
	}
} );
