
"use strict";
// aware scroll

var awareScrollClass = function() {
	var blocks = [
		{ 'id': 'tasks', 'borders': [], 'element': undefined }, 
		{ 'id': 'projects', 'borders': [], 'element': undefined }, 
		{ 'id': 'tools', 'borders': [], 'element': undefined }, 
		{ 'id': 'contact', 'borders' :[], 'element': undefined }
	];

	var centerLine, bottom;

	var calculateBorders = function() {
		var lastBorder = -1;
		blocks.forEach(function(item, index) {
			var elm = document.getElementById(item['id']);
			var elmH = elm.clientHeight;
			item['borders'] = [lastBorder+1, lastBorder+1+elmH];
			item['element'] = document.querySelector("[data-point='" + item['id'] + "']");
			lastBorder += elmH + 1;
		});
	}

	var onScroll = function() {	
		// find current position
		var i;
		

		if (document.body.scrollTop == 0) { // scroll on top
			i = 0;
		} else if (document.body.scrollTop + 2*centerLine == bottom) { // scroll on bottom
			i = blocks.length-1;
		} else {
			for (i=blocks.length-1; i > 0; i--) { // scroll inside
				if (blocks[i]['borders'][0] <= document.body.scrollTop + centerLine) {
					break;
				}
			}
		}
		// set cursor 
		if (blocks[i]['element'].className !== "selected") {
			// clear all
			for (var k=0; k < blocks.length; k++) {
				blocks[k]['element'].className = " ";
			}
			// set new
			blocks[i]['element'].className = "selected";
		}
	}

	var onResize = function() {
		recalc();
		console.log(centerLine)
	}

	this.init = function () {
		recalc();
		document.addEventListener("scroll", onScroll.bind(this));
		document.addEventListener("resize", onResize.bind(this));
	}

	var recalc = function() {
		calculateBorders();
		centerLine = parseInt(window.innerHeight/2);

		var body = document.body, html = document.documentElement;
		bottom = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
	}
}

var rkScroll = new awareScrollClass();
rkScroll.init();
