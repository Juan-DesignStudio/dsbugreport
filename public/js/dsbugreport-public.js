function Egg(){this.eggs=[],this.hooks=[],this.kps=[],this.activeEgg="",this.ignoredKeys=[16],arguments.length&&this.AddCode.apply(this,arguments)}Egg.prototype.__execute=function(a){return"function"==typeof a&&a.call(this)},Egg.prototype.__toCharCodes=function(a){var b={slash:191,up:38,down:40,left:37,right:39,enter:13,space:32,ctrl:17,alt:18,tab:9,esc:27},c=Object.keys(b);"string"==typeof a&&(a=a.split(",").map(function(a){return a.trim()}));var d=a.map(function(a){return a===parseInt(a,10)?a:c.indexOf(a)>-1?b[a]:a.charCodeAt(0)});return d.join(",")},Egg.prototype.AddCode=function(a,b,c){return this.eggs.push({keys:this.__toCharCodes(a),fn:b,metadata:c}),this},Egg.prototype.AddHook=function(a){return this.hooks.push(a),this},Egg.prototype.handleEvent=function(a){var b=a.which,c=b>=65&&90>=b;if(!("keydown"!==a.type||a.metaKey||a.ctrlKey||a.altKey||a.shiftKey)){var d=a.target.tagName;if(("HTML"===d||"BODY"===d)&&c)return void a.preventDefault()}"keyup"===a.type&&this.eggs.length>0&&(c&&(a.shiftKey||(b+=32)),-1===this.ignoredKeys.indexOf(b)&&this.kps.push(b),this.eggs.forEach(function(a,b){var c=this.kps.toString().indexOf(a.keys)>=0;c&&(this.kps=[],this.activeEgg=a,this.__execute(a.fn,this),this.hooks.forEach(this.__execute,this),this.activeEgg="")},this))},Egg.prototype.Listen=function(){return void 0!==document.addEventListener&&(document.addEventListener("keydown",this,!1),document.addEventListener("keyup",this,!1)),this},Egg.prototype.listen=Egg.prototype.Listen,Egg.prototype.addCode=Egg.prototype.AddCode,Egg.prototype.addHook=Egg.prototype.AddHook;

(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */


	$(document).ready( function(){
		//EASTER EGG TYPE B U G AND A POP UP COMES IN
		var egg = new Egg("b,u,g", function() {
		$('#dsBugReport').fadeIn(500);
	    }).listen();
	
		
		//if they click this x then we close this.
		$('.dsBugReportClose').on( "click", function() {
			$('#dsBugReport').fadeOut(500);
		});
	
	
	
	} );

})( jQuery );
