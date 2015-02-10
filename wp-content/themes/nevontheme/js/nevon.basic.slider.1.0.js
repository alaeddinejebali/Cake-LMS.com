// JavaScript Document
(function ($) {

    $.fn.NevonBasic = function (customOptions) {     
        var settings = {
			autoSlide : false,
			duration : 6000,
            easing: 'swing',
			slideWidth : 460,
			direction : "ud",
			objectNum : 3 /*Object to show per page*/
        };
		$.extend(settings, customOptions);
		
		
	var main = this;
  var currentPosition = 0;
  var slideWidth = settings.slideWidth;
  var slides = this.find('.slide');
  var numberOfSlides = slides.length;
  var onTimer = true;
  var slideTime = settings.duration;
  var basicElements = [];
  
  this.find('.slide').each(
  	function(){
		if(!jQuery(this).is(":first-child")) jQuery(this).css({'marginLeft':slideWidth, opacity:0, position:"absolute", display:"block"});
		else jQuery(this).css({opacity:1, position:"absolute", display:"block"});
		basicElements.push(jQuery(this));	
		//alert("TOTAL "+basicElements.length+" THIS "+basicElements[basicElements.length-1]);
	}
  );
  
  

  // Remove scrollbar in JS
  this.css('overflow', 'hidden');
  
  // Wrap all .slides with #slideInner div
  slides
  .wrapAll('<div class="slideInner"></div>')
  // Float left to display horizontally, readjust .slides width
  .css({
    'float' : 'left',
    'width' : slideWidth,
  });

  // Set #slideInner width equal to total width of all slides
  jQuery('.slideInner').css({'width': slideWidth * numberOfSlides, 'overflow': 'hidden'});
  resizeHandlerFunc();

/*
  // Insert left and right arrow controls in the DOM
  jQuery('.nevon-basic-slider-container')
    .prepend('<span class="control" id="leftControl">Move left</span>')
    .append('<span class="control" id="rightControl">Move right</span>');
*/
  // Hide left arrow control on first load
 // manageControls(currentPosition);

  // Create event listeners for .controls clicks
  this.find('.control')
    .bind('click', function(){
		
			  pauseSlide();
	  setTimeout(activateSlide,800);
	  
	  switch(settings.direction){
		case "ud":
		  basicElements[currentPosition].stop().animate({
			'opacity'    : 0,
		  },800);
		  break;
		  
		  case "rl":
		  basicElements[currentPosition].stop().animate({
			  'marginLeft' 	 : -slideWidth,
			'opacity'    : 0,
		  },800);
		  break;
	  }
	  //alert((jQuery(this).attr('class').search('rightControl') > -1));
      currentPosition = (jQuery(this).attr('class').search('rightControl') > -1)
    ? currentPosition+1 : currentPosition-1;
		
			//alert(currentPosition);
			if(currentPosition >= numberOfSlides && jQuery(this).attr('class').search('rightControl') > -1 ){// && 
				currentPosition = 0;
			}else if(currentPosition < 0 && jQuery(this).attr('class').search('leftControl') > -1){
				currentPosition = numberOfSlides - 1;
			}
			
	  switch(settings.direction){
		case "ud":
		  basicElements[currentPosition].css({"marginLeft":0, "marginTop":-80, "opacity":0}).stop().animate({
			'marginLeft' : 0,
			'marginTop'  : 0,
			'opacity'    : 1
		  },800);
		  break;
		  
		  case "rl":
		  basicElements[currentPosition].css({"marginLeft":slideWidth, "marginTop":0, "opacity":0}).stop().animate({
			'marginLeft' : 0,
			'marginTop'  : 0,
			'opacity'    : 1
		  },800);
			break;
	  }

      // Hide / show controls
      //manageControls(currentPosition);
      // Move slideInner using margin-left
	  
    });

  // manageControls: Hides and shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
    if(position==0){ jQuery('.leftControl').hide() }
    else{ jQuery('.leftControl').show() }
    // Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ jQuery('.rightControl').hide() }
    else{ jQuery('.rightControl').show() }
    }
	
	
	var tid = null;
	if(settings.autoSlide)tid = setInterval(nevonBasicSlider, slideTime);
	
	var basicSliderLeft;
	function nevonBasicSlider() {
		if(!onTimer) return;
		
				pauseSlide();
			  setTimeout(activateSlide,800);

	  switch(settings.direction){
		case "ud":
		  basicElements[currentPosition].stop().animate({
			'opacity'    : 0,
		  },800);
		  break;
		  
		  case "rl":
		  basicElements[currentPosition].stop().animate({
			  'marginLeft' 	 : -slideWidth,
			'opacity'    : 0,
		  },800);
		  break;
	  }
	  
	  currentPosition++;
	  		
			//alert(currentPosition);
			if(currentPosition >= numberOfSlides){
				currentPosition = 0;
			}else if(currentPosition < 0 && jQuery(this).attr('class').search('leftControl') > -1){
				currentPosition = numberOfSlides - 1;
			}

	
	  switch(settings.direction){
		case "ud":
		  basicElements[currentPosition].css({"marginLeft":0, "marginTop":-80, "opacity":0}).stop().animate({
			'marginLeft' : 0,
			'marginTop'  : 0,
			'opacity'    : 1
		  },800);
		  break;
		  
		  case "rl":
		  basicElements[currentPosition].css({"marginLeft":slideWidth, "marginTop":0, "opacity":0}).stop().animate({
			'marginLeft' : 0,
			'marginTop'  : 0,
			'opacity'    : 1
		  },800);
			break;
	  }
	}
		
	function activateSlide(){
		onTimer = true;	
		if(!tid && settings.autoSlide){
			tid = setInterval(nevonBasicSlider, slideTime);
		}
	}
	
	function pauseSlide(){
		if(tid){
	  clearInterval(tid);
	  tid = null;
		onTimer = false;	
		}
	}
	
	
		
	this.hover(
		function(){
			//alert("PAUSE");
			pauseSlide();	
		},
		function(){
			activateSlide();	
		}
	
	);

	
		jQuery(window).resize(resizeHandlerFunc);
		
		
		function resizeHandlerFunc(){
			//if(jQuery(".nevon-basic-slider-container blockquote", main).width() != null){ return;}
			
			//var conWidth = main.find(".nevon-basic-slider-container").width();
			//var imgWidth = main.find(".nevon-basic-slider-container li img").width() + 5;
			var imgHeight = main.find(".nevon-basic-slider-container .slide").height();
			//var columns = 0;
			/*
			var objectsForColumns = Math.floor(conWidth/imgWidth);
			var totalFirstPage = 0;
			//document.write(conWidth);
			
			main.find(".nevon-basic-slider-container .slide:first").find("li").each(
				function(){
						//alert("YEAH LI");
						totalFirstPage++;	
				}
			);
			
			//alert("TOTAL CHILD "+totalFirstPage);
			
			while(totalFirstPage > 0){
				totalFirstPage -= objectsForColumns;
				columns++;	
			}
			*/
			main.find(".nevon-basic-slider-container").css("height",imgHeight +40);
			//alert("TOTAL COLUMN "+(columns * imgHeight +50));
		}

	}
})(jQuery);