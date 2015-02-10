(function( jQuery, undefined ) {
		
	/*
	 * JMSlideshow object
	 */
	jQuery.JMSlideshow 				= function( options, element ) {
		
		// the jms-slideshow
		this.jQueryel	= jQuery( element );
		
		this._init( options );
		
	};
	
	jQuery.JMSlideshow.defaults 		= {
		// options for the jmpress plugin.
		// you can add much more options here. Check http://shama.github.com/jmpress.js/
		jmpressOpts	: {
			// set the viewport
			viewPort 		: {
				height	: 400,
				width	: 1000,
				maxScale: 1
			},
			fullscreen		: false,
			hash			: { use : false },
			mouse			: { clickSelects : false },
			keyboard		: { use : false },
			animation		: { transitionDuration : '1s' }
		},
		// for this specific plugin we will have the following options:
		// shows/hides navigation arrows
		arrows		: true,
		// shows/hides navigation dots/pages
		dots		: true,
		// each step's bgcolor transition speed
		bgColorSpeed: '1s',
		// slideshow on / off
		autoplay	: false,
		// time between transitions for the slideshow
		interval	: 3500
    };
	
	jQuery.JMSlideshow.prototype 	= {
		_init 				: function( options ) {
			
			this.options 		= jQuery.extend( true, {}, jQuery.JMSlideshow.defaults, options );
			
			// each one of the slides
			this.jQueryslides		= jQuery('#jms-slideshow').children('div');
			// total number of slides
			this.slidesCount	= this.jQueryslides.length;
			// step's bgcolor
			this.colors			= jQuery.map( this.jQueryslides, function( el, i ) { return jQuery( el ).data( 'color' ); } ).join( ' ' );
			// build the necessary structure to run jmpress
			this._layout();
			// initialize the jmpress plugin
			this._initImpress();
			// if support (function implemented in jmpress plugin)
			if( this.support ) {
			
				// load some events
				this._loadEvents();
				// if autoplay is true start the slideshow
				if( this.options.autoplay ) {
				
					this._startSlideshow();
				
				}
				
			}
			
		},
		// wraps all the slides in the jms-wrapper div;
		// adds the navigation options ( arrows and dots ) if set to true
		_layout				: function() {
			
			// adds a specific class to each one of the steps
			this.jQueryslides.each( function( i ) {
			
				jQuery(this).addClass( 'jmstep' + ( i + 1 ) );
			
			} );
			
			// wrap the slides. This wrapper will be the element on which we will call the jmpress plugin
			this.jQueryjmsWrapper	= this.jQueryslides.wrapAll( '<div class="jms-wrapper"/>' ).parent();
			
			// transition speed for the wrapper bgcolor 
			this.jQueryjmsWrapper.css( {
				'-webkit-transition-duration' 	: this.options.bgColorSpeed,
				'-moz-transition-duration' 		: this.options.bgColorSpeed,
				'-ms-transition-duration' 		: this.options.bgColorSpeed,
				'-o-transition-duration' 		: this.options.bgColorSpeed,
				'transition-duration' 			: this.options.bgColorSpeed
			} );
			
			// add navigation arrows
			if( this.options.arrows ) {
			
				this.jQueryarrows	= jQuery( '<nav class="jms-arrows"></nav>' );
				
				if( this.slidesCount > 1 ) {
				
					this.jQueryarrowPrev	= jQuery( '<span class="jms-arrows-prev"/>' ).appendTo( this.jQueryarrows );
					this.jQueryarrowNext	= jQuery( '<span class="jms-arrows-next"/>' ).appendTo( this.jQueryarrows );
					
				}

				this.jQueryel.append( this.jQueryarrows )
			
			}
			
			// add navigation dots
			if( this.options.dots ) {
			
				this.jQuerydots		= jQuery( '<nav class="jms-dots"></nav>' );
				
				for( var i = this.slidesCount + 1; --i; ) {
				
					this.jQuerydots.append( ( i === this.slidesCount ) ? '<span class="jms-dots-current"/>' : '<span/>' );
				
				}
				
				if( this.options.jmpressOpts.start ) {
					
					this.jQuerystart		= this.jQueryjmsWrapper.find( this.options.jmpressOpts.start ), idxSelected = 0;
					
					( this.jQuerystart.length ) ? idxSelected = this.jQuerystart.index() : this.options.jmpressOpts.start = null;
					
					this.jQuerydots.children().removeClass( 'jms-dots-current' ).eq( idxSelected ).addClass( 'jms-dots-current' );
				
				}
				
				this.jQueryel.append( this.jQuerydots )
			
			}
			
		},
		// initialize the jmpress plugin
		_initImpress		: function() {
			
			var _self = this;
			
			this.jQueryjmsWrapper.jmpress( this.options.jmpressOpts );
			// check if supported (function from jmpress.js):
			// it adds the class not-suported to the wrapper
			this.support	= !this.jQueryjmsWrapper.hasClass( 'not-supported' );
			
			// if not supported remove unnecessary elements
			if( !this.support ) {
			
				if( this.jQueryarrows ) {
				
					this.jQueryarrows.remove();
				
				}
				if( this.jQuerydots ) {
					var nsCurrent = 0;
					var nsTotal = this.slidesCount;
					var nsArray = this.jQueryslides;
					var nsDotsArray = jQuery(".jms-dots").find("span");
					var nsCurrentDot = nsDotsArray[0];
					
					var nsClicked = 0;
					
					//this.jQuerydots.remove();
					//console.log("WORKS "+this.jQuerydots.find("span").length);
					this.jQuerydots.css({"position":"relative","bottom":"-210px"});
					
					
					jQuery(".jms-dots").find("span").click(function(){
						
						jQuery(".jmstep"+parseInt(nsCurrent+1)).css("display","none");
						jQuery(".jms-dots-current").removeClass("jms-dots-current");

						nsClicked = jQuery("span").index(this);
						nsCurrent = nsClicked;
						
						jQuery(this).addClass("jms-dots-current");
						jQuery(".jmstep"+parseInt(nsCurrent+1)).css("display","block");
						
						
						console.log("WORKS "+nsClicked);
						
						
					});
				
				}
				return false;
			
			}
			
			// redefine the jmpress setActive method
			this.jQueryjmsWrapper.jmpress( 'setActive', function( slide, eventData ) {
				
				// change the pagination dot active class			
				if( _self.options.dots ) {
					
					// adds the current class to the current dot/page
					_self.jQuerydots
						 .children()
						 .removeClass( 'jms-dots-current' )
						 .eq( slide.index() )
						 .addClass( 'jms-dots-current' );
				
				}
				
				// delete all current bg colors
				this.removeClass( _self.colors );
				// add bg color class
				this.addClass( slide.data( 'color' ) );
				
			} );
			
			// add step's bg color to the wrapper
			this.jQueryjmsWrapper.addClass( this.jQueryjmsWrapper.jmpress('active').data( 'color' ) );
			
		},
		// start slideshow if autoplay is true
		_startSlideshow		: function() {
		
			var _self	= this;
			
			this.slideshow	= setTimeout( function() {
				
				_self.jQueryjmsWrapper.jmpress( 'next' );
				
				if( _self.options.autoplay ) {
				
					_self._startSlideshow();
				
				}
			
			}, this.options.interval );
		
		},
		// stops the slideshow
		_stopSlideshow		: function() {
		
			if( this.options.autoplay ) {
					
				clearTimeout( this.slideshow );
				this.options.autoplay	= false;
			
			}
		
		},
		_loadEvents			: function() {
			
			var _self = this;
			
			// navigation arrows
			if( this.jQueryarrowPrev && this.jQueryarrowNext ) {
			
				this.jQueryarrowPrev.on( 'click.jmslideshow', function( event ) {
					
					_self._stopSlideshow();
				
					_self.jQueryjmsWrapper.jmpress( 'prev' );

					return false;
				
				} );
				
				this.jQueryarrowNext.on( 'click.jmslideshow', function( event ) {
					
					_self._stopSlideshow();
					
					_self.jQueryjmsWrapper.jmpress( 'next' );
					
					return false;
				
				} );
				
			}
			
			// navigation dots
			if( this.jQuerydots ) {
			
				this.jQuerydots.children().on( 'click.jmslideshow', function( event ) {
				 	
					_self._stopSlideshow();
					
					_self.jQueryjmsWrapper.jmpress( 'goTo', '.jmstep' + ( jQuery(this).index() + 1 ) );
					
					return false;
				
				} );
			
			}
			
			// the touchend event is already defined in the jmpress plugin.
			// we just need to make sure the slideshow stops if the event is triggered
			this.jQueryjmsWrapper.on( 'touchend.jmslideshow', function() {
			
				_self._stopSlideshow();
			
			} );
			
		}
	};
	
	var logError 			= function( message ) {
		if ( this.console ) {
			console.error( message );
		}
	};
	
	jQuery.fn.jmslideshow		= function( options ) {
		if ( typeof options === 'string' ) {
			
			var args = Array.prototype.slice.call( arguments, 1 );
			
			this.each(function() {
			
				var instance = jQuery.data( this, 'jmslideshow' );
				
				if ( !instance ) {
					logError( "cannot call methods on jmslideshow prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				}
				
				if ( !jQuery.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
					logError( "no such method '" + options + "' for jmslideshow instance" );
					return;
				}
				
				instance[ options ].apply( instance, args );
			
			});
		
		} 
		else {
		
			this.each(function() {
			
				var instance = jQuery.data( this, 'jmslideshow' );
				if ( !instance ) {
					jQuery.data( this, 'jmslideshow', new jQuery.JMSlideshow( options, this ) );
				}
			});
		
		}
		
		return this;
		
	};
		
	
	
})( jQuery );