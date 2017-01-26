(function () {

  "use strict";

var PortfolioSliderClass = function() {
  

  var btnLeft = document.getElementById("btn-left");
  var btnRight = document.getElementById("btn-right");
  var slideBanner = document.querySelector(".slider-wrapper > ul");
  var slideLI = slideBanner.children;
  var thumbsBanner = document.querySelector(".thumbnails");
  var thumbLi = thumbsBanner.querySelector("ul").children;
  var infArea = document.querySelector(".information-area");
  var cursor = 0;
  var numSlides = slideBanner.children.length;
  var slideWidth = 600;

  // ############ M E T H O D S ############

  var moveSlides = function(_newMargin) {
    // switches slide by modifing the margin
    var currentMargin = parseInt(slideBanner.style.marginLeft, 10);

    if (!currentMargin) {
      currentMargin = 0;
    }
    slideBanner.style.marginLeft = (currentMargin + _newMargin) + "px";
  };

  var outputGeneralInfo = function() {
    var data = slideLI.item(cursor).dataset.date;
    var name = slideLI.item(cursor).dataset.name;
    infArea.innerHTML = name + "<br>" + data;
  }

  var thumbsUpdateSelected = function() {
    // rised after arrow button click
    thumbsClearClasses();
    for (var i=0; i<thumbLi.length; i++) {
      if (i==cursor) {
        thumbLi.item(i).className = "selected";
      }
    }
    outputGeneralInfo();    
  }

  var sliderFollowThumbnail = function() {
    // rised after thumbnail click
    var thumbCursor = 0;
    
    for (var i=0; i<thumbLi.length; i++) {
      if (thumbLi.item(i).className == "selected") {
        thumbCursor = i;
        break;
      }
    }
    
    if (thumbCursor < cursor) {
      var diff = cursor - thumbCursor;
      moveSlides(slideWidth*diff); 
      cursor = cursor - diff;
    }
    if (thumbCursor > cursor) {
      var diff = thumbCursor - cursor;
      moveSlides(slideWidth*diff*-1); 
      cursor = cursor + diff;
    }
    
  }

  var thumbsClearClasses = function() {
    for (var i=0; i<thumbLi.length; i++) {
      thumbLi.item(i).className = "";
    }
  }

  var bindEvents = function() {
    btnLeft.addEventListener("click", onLeftClick.bind(this));
    btnRight.addEventListener("click", onRightClick.bind(this));
    window.addEventListener("load", onLoad.bind(this));
    window.addEventListener("resize", onResize.bind(this));
    for (var i=0; i<thumbLi.length; i++) {
      thumbLi.item(i).addEventListener("click", onThumbClick.bind(this));
    }
  };
  
  this.init = function() {
    bindEvents();
  };
  
  // ############ E V E N T   F U N C T I O N S ############
  
  var onLeftClick = function() {
    if (cursor == 0) {
      moveSlides(slideWidth*(numSlides-1)*-1);
      cursor = numSlides-1;
    } else {
      moveSlides(slideWidth);
      cursor -= 1;
    }
    thumbsUpdateSelected();
  };

  var onRightClick = function() {

    if (cursor == numSlides - 1) {
      moveSlides(slideWidth*(numSlides-1)); 
      cursor = 0;
    } else {
      moveSlides(slideWidth*-1);
      cursor += 1;
    }
    thumbsUpdateSelected();
  }

  var onResize = function() {
    // this may be incompatible with old browsers
    // get width in pixels from percentage-width detarmined object
    var presentWidth = (document.querySelector(".slider-wrapper").clientWidth);
    
    // set new slideBanner width
    slideWidth = presentWidth;
    slideBanner.style.width = (numSlides * presentWidth) + "px";
    
    // adjust slides width    
    for (var i=0; i<slideLI.length; i++) {
        slideLI.item(i).style.width = presentWidth + "px";
    }
    
    // adjust margin
    slideBanner.style.marginLeft = (cursor * slideWidth * -1) + "px"; 
  }

  var onThumbClick = function(e) {     
    // clear classes
    thumbsClearClasses();
    e.srcElement.className = "selected";    // WOW WOW WOW HERE !!!!!
    sliderFollowThumbnail();
    outputGeneralInfo();
  }

  var onLoad = function() {
    slideBanner.style.width = (numSlides * slideWidth) + "px";
  }
  
}

var mySlider = new PortfolioSliderClass();
mySlider.init();

}) ();
