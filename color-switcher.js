/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD (Register as an anonymous module)
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// Node/CommonJS
		module.exports = factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (arguments.length > 1 && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setMilliseconds(t.getMilliseconds() + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {},
			// To prevent the for loop in the first place assign an empty array
			// in case there are no cookies at all. Also prevents odd result when
			// calling $.cookie().
			cookies = document.cookie ? document.cookie.split('; ') : [],
			i = 0,
			l = cookies.length;

		for (; i < l; i++) {
			var parts = cookies[i].split('='),
				name = decode(parts.shift()),
				cookie = parts.join('=');

			if (key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));

!function(e){e.fn.sCustomizer=function(o){"use strict";var t=e.extend({colorSwitcher:!0,colors:{salmon:"#fa4848",orange:"#ff6600",cyan:"#11c0b4",purple:"#8673d0",yellow:"#ebb113",pink:"#de2e8c",green:"#8ec211",RoyalBlue:"#6c91c5",red:"#d7290b",sienna:"#b07926",DarkCyan:"#16a085",blue:"#2980b9"},patternSwitcher:!0,patterns:{pattern_1:"vendor/s-customizer/images/pattern/pattern_1.png",pattern_2:"vendor/s-customizer/images/pattern/pattern_2.png",pattern_3:"vendor/s-customizer/images/pattern/pattern_3.png",pattern_4:"vendor/s-customizer/images/pattern/pattern_4.png",pattern_5:"vendor/s-customizer/images/pattern/pattern_5.png",pattern_6:"vendor/s-customizer/images/pattern/pattern_6.png",pattern_7:"vendor/s-customizer/images/pattern/pattern_7.png",pattern_8:"vendor/s-customizer/images/pattern/pattern_8.png"},bgImageSwitcher:!0,bgImages:{bg_image_1:{large:"vendor/s-customizer/images/bg-img/large/1.jpg",small:"vendor/s-customizer/images/bg-img/small/1.jpg"},bg_image_2:{large:"vendor/s-customizer/images/bg-img/large/2.jpg",small:"vendor/s-customizer/images/bg-img/small/2.jpg"},bg_image_3:{large:"vendor/s-customizer/images/bg-img/large/3.jpg",small:"vendor/s-customizer/images/bg-img/small/3.jpg"},bg_image_4:{large:"vendor/s-customizer/images/bg-img/large/4.jpg",small:"vendor/s-customizer/images/bg-img/small/4.jpg"},bg_image_5:{large:"vendor/s-customizer/images/bg-img/large/5.jpg",small:"vendor/s-customizer/images/bg-img/small/5.jpg"},bg_image_6:{large:"vendor/s-customizer/images/bg-img/large/6.jpg",small:"vendor/s-customizer/images/bg-img/small/6.jpg"}},themeColorSwitcher:!0,themeColors:{light:"#f5f5f5",dark:"#232323"},layoutSwitcher:!0,layouts:{layout_one:"wide",layout_two:"boxed"},logo:"vendor/s-customizer/images/logo.png"},o),s=e("head"),r=e("body");function a(){s.append('<link rel="stylesheet" href="css/boxed.css">'),v=e('link[href="css/boxed.css"]')}function i(){s.append('<link rel="stylesheet" href="css/dark.css">'),k=e('link[href="css/dark.css"]')}s.append('<link rel="stylesheet" href="vendor/s-customizer/css/colors/default.css" id="color-switcher-link">'),s.append('\x3c!--s-customizer stylesheet--\x3e\n\t<link rel="stylesheet" href="vendor/s-customizer/css/style.css">'),r.append('\x3c!-- s customizer --\x3e\n<div class="s-customizer" id="s-customizer">\n\t<div class="s-customizer-header">\n\t    <a href="index.html" class="s-customizer-logo"><img src="'+t.logo+'" alt="Theme Logo"></a>\n\t    <a class="s-customizer-toggle-btn" href="#"><i class="fa fa-cog fa-spin" aria-hidden="true"></i></a>\n\t</div>\n    <div class="s-customizer-content">\n    </div>\n</div>');var l=e(".s-customizer-content");if(1==t.layoutSwitcher){l.append('<h3>Layout Options</h3>\n        <p>Which layout option you want to use?</p>\n        <ul class="s-customizer-ul layout"></ul>');var c=e(".s-customizer-ul.layout");e.each(t.layouts,function(e,o){c.append('<li class="'+o+'-layout layout-change" data-style="'+o+'" title="'+o+'"> '+o+" </li>")})}if(1==t.bgImageSwitcher){l.append('<h3>Background Images</h3>\n        <p>Which background image you want to use?</p>\n        <ul class="s-customizer-ul bgImgSwitcher"></ul>');var n=e(".s-customizer-ul.bgImgSwitcher");e.each(t.bgImages,function(e,o){n.append('<li class="change-bg-image" data-style="'+o.large+'" title="'+e+'"> <img src="'+o.small+'" alt="'+e+'"></li>')})}if(1==t.patternSwitcher){l.append('<h3>Background Patterns</h3>\n        <p>Which background pattern you want to use?</p>\n            <ul class="s-customizer-ul patternSwitcher"></ul>');var m=e(".s-customizer-ul.patternSwitcher");e.each(t.patterns,function(e,o){m.append('<li class="change-pattern" data-style="'+o+'" title="'+e+'">\n\t<img src="'+o+'" alt="'+e+'">\n</li>')})}if(1==t.colorSwitcher){l.append('<h3>Color Schemes</h3>\n        <p>Which theme color you want to use? Select from here.</p>\n        <ul class="s-customizer-ul colorSwitcher"></ul>');var g=e(".s-customizer-ul.colorSwitcher");e.each(t.colors,function(e,o){g.append('<li class="color-switcher-btn" title="'+e+'" data-style="'+e+'" style="background-color:'+o+';"></li>')})}if(1==t.themeColorSwitcher){l.append('<h3>Theme Colors</h3>\n        <p>Which background pattern you want to use?</p>\n            <ul class="s-customizer-ul themeColorSwitcher"></ul>');var u=e(".s-customizer-ul.themeColorSwitcher");e.each(t.themeColors,function(e,o){u.append('<li class="theme-color-change" data-style="'+e+'" title="'+e+'" style="background-color:'+o+'"></li>')})}l.append('<ul class="resetAll s-customizer-ul">\n            <li>\n            \t<a class="button button-reset" href="#" id="s-customizer-reset">Reset All</a>\n            </li>\n        </ul>');var p=e(".s-customizer-toggle-btn"),d=e("#s-customizer"),h=e(".layout-change"),v=e('link[href="css/boxed.css"]'),b=e(".theme-color-change"),k=e('link[href="css/dark.css"]'),f=e(".change-pattern"),z=e(".change-bg-image"),y=e("#color-switcher-link"),C=e(".color-switcher-btn"),w=e("#s-customizer-reset");if(y.prop("disabled",!0),null!=e.cookie("color")){y.prop("disabled",!1);var _=e.cookie("color");y.attr("href","vendor/s-customizer/css/colors/"+_+".css")}if(null!=e.cookie("pattern")){S();var _=e.cookie("pattern");a(),k.remove(),r.addClass("is-pattern"),r.css("background-image","url("+_+")")}if(null!=e.cookie("bgImg")){S();_=e.cookie("bgImg");a(),k.remove(),r.addClass("is-bg-image"),r.css("background-image","url("+_+")")}null!=e.cookie("layout")&&("boxed"==e.cookie("layout")?a():v.remove());null!=e.cookie("themeColor")&&("dark"==(_=e.cookie("themeColor"))?(S(),v.remove(),i()):k.remove(),e.cookie("themeColor",_,{expires:7}));function S(){r.removeClass("is-pattern"),r.css("background-image",""),r.removeClass("is-bg-image")}return p.on("click",function(e){e.preventDefault(),d.hasClass("active")?d.removeClass("active"):d.addClass("active")}),h.on("click",function(o){o.preventDefault();var t=e(this).data("style");"boxed"==t?a():v.remove(),e.cookie("layout",t,{expires:7})}),C.on("click",function(o){o.preventDefault(),y.prop("disabled",!1);var t=e(this).data("style");y.attr("href","vendor/s-customizer/css/colors//"+t+".css"),e.cookie("color",t,{expires:7})}),b.on("click",function(o){o.preventDefault(),e.removeCookie("bgImg"),e.removeCookie("pattern");var t=e(this).data("style");"dark"==t?(S(),v.remove(),i()):k.remove(),e.cookie("themeColor",t,{expires:7})}),z.on("click",function(o){o.preventDefault(),S(),e.removeCookie("themeColor"),e.removeCookie("pattern"),e.removeCookie("layout");var t=e(this).data("style");a(),k.remove(),r.addClass("is-bg-image"),r.css("background-image","url("+t+")"),e.cookie("bgImg",t,{expires:7})}),f.on("click",function(o){o.preventDefault(),S(),e.removeCookie("themeColor"),e.removeCookie("bgImg"),e.removeCookie("layout");var t=e(this).data("style");a(),k.remove(),r.addClass("is-pattern"),r.css("background-image","url("+t+")"),e.cookie("pattern",t,{expires:7})}),w.on("click",function(o){o.preventDefault(),e.cookie("color","default",{expires:7}),e.removeCookie("themeColor"),e.removeCookie("layout"),e.removeCookie("bgImg"),e.removeCookie("pattern"),y.attr("href","vendor/s-customizer/css/colors/default.css"),S(),v.remove(),k.remove()}),this}}(jQuery);
(function($){
	'use strict';
	$("body").sCustomizer({
		colorSwitcher: true,
		colors: {
			color1: "#09A9B9",
			color2: "#ff6600",
			color3: "#11c0b4",
			color4: "#9f00ff",
			color5: "#eeb313",
			color6: "#de2e8c",
			color7: "#8ec211",
			color8: "#023368",
			color9: "#dc2a0b",
			color10: "#b07926",
			color11: "#16a085",
			color12: "#2980b9"
		},
		patternSwitcher: true,
		// patterns: {
		// 	pattern_1: "vendor/s-customizer/images/pattern/pattern_1.png",
		// 	pattern_2: "vendor/s-customizer/images/pattern/pattern_2.png",
		// 	pattern_3: "vendor/s-customizer/images/pattern/pattern_3.png",
		// 	pattern_4: "vendor/s-customizer/images/pattern/pattern_4.png",
		// 	pattern_5: "vendor/s-customizer/images/pattern/pattern_5.png",
		// 	pattern_6: "vendor/s-customizer/images/pattern/pattern_6.png",
		// 	pattern_7: "vendor/s-customizer/images/pattern/pattern_7.png",
		// 	pattern_8: "vendor/s-customizer/images/pattern/pattern_8.png",
		// },
		// bgImageSwitcher: true,
		// bgImages: {
		// 	bg_image_1: {
		// 		large: "vendor/s-customizer/images/bg-img/large/1.jpg",
		// 		small: "vendor/s-customizer/images/bg-img/small/1.jpg",
		// 	},
		// 	bg_image_2: {
		// 		large: "vendor/s-customizer/images/bg-img/large/2.jpg",
		// 		small: "vendor/s-customizer/images/bg-img/small/2.jpg",
		// 	},
		// 	bg_image_3: {
		// 		large: "vendor/s-customizer/images/bg-img/large/3.jpg",
		// 		small: "vendor/s-customizer/images/bg-img/small/3.jpg",
		// 	},
		// 	bg_image_4: {
		// 		large: "vendor/s-customizer/images/bg-img/large/4.jpg",
		// 		small: "vendor/s-customizer/images/bg-img/small/4.jpg",
		// 	},
		// 	bg_image_5: {
		// 		large: "vendor/s-customizer/images/bg-img/large/5.jpg",
		// 		small: "vendor/s-customizer/images/bg-img/small/5.jpg",
		// 	},
		// 	bg_image_6: {
		// 		large: "vendor/s-customizer/images/bg-img/large/6.jpg",
		// 		small: "vendor/s-customizer/images/bg-img/small/6.jpg",
		// 	}
		// },
		// themeColorSwitcher: true,
		// themeColors: {
		// 	light: "#f5f5f5",
		// 	dark: "#232323"
		// },
		// layoutSwitcher: true,
		// layouts: {
		// 	layout_one: "wide",
		// 	layout_two: "boxed"
		// },
		// logo: "vendor/s-customizer/images/logo.png"
	});
})(jQuery);