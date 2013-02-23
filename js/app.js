
(function () {
	
	"use strict";

	if (/https?:\/\/www\./.test(document.location.href)) {
		document.location = document.location.href.replace("www.", "");
	}

	jQuery.fn.isEmpty = function (){
		return this.val().replace(/^\s+|\s+$/, "") === "";
	};

	$(".alert-message .close").click(function (){
		$(this).closest(".alert-message").fadeOut();
		return false;
	});

	function validate () {

		var r = true;

		if ($("#name").isEmpty()) {
			$("#name").addClass("error-form");
			r = false;
		} else {
			$("#name").removeClass("error-form");
		}

		if ($("#link").isEmpty() || !/^https?:\/\//.test($("#link").val())) {
			$("#link").addClass("error-form");
			r = false;
		} else {
			$("#link").removeClass("error-form");
		}

		if (!$("#twitter").isEmpty() && /[^0-9a-z_@]/i.test($("#twitter").val())) {
			$("#twitter").addClass("error-form");
			r = false;
		} else {
			$("#twitter").removeClass("error-form");
		}

		return r;
	}

	$("#link-form").submit(function (){
		if (!validate.once) {
			$("#name, #link").on('keyup keydown keypress', function (){
				validate();
			});
		}

		validate.once = true;

		if(!validate()) {
			return false;
		}
		return true;

	});

	$("#link-form input").click(function (params){
		var that = this;
		setTimeout(function (){
			$(that).focus();
		}, 110);
	});

	$('a[title]').addClass("expand").qtip({style: {name: 'dark', tip: true}, position: { adjust: { screen: true } } });

	$(".container").on("click", ".btn_video_es, .btn_video_en, .btn_doc", function (event) {
		var showClass = '.' + $(this).attr("class").match(/btn_([_a-z]+)/i)[1];
		var $section = $(this).closest('.span4');
		var $btns = $section.find(showClass).parent();
		var action = $btns.is(":visible") ? "hide" : "show";
		$section.find("li").hide();
		$btns[action]();
		event.preventDefault();
		return false;
	});

	$(".btn_add").click(function (event){
		$("#lang").val($(this).closest("[data-lang]").attr("data-lang"));
	});

	$(window).on('click scroll', holdLoop);

	// Nubes de dialogo del comic

	var waitForHold = false;

	function holdLoop() {
		waitForHold = true;
		clearTimeout(holdLoop.to);
		holdLoop.to = setTimeout(function () {
			waitForHold = false;
		}, 7000);
	}

	setTimeout(function () {
		var prev = -1;
		var random;
		(function loop(loading) {
			if (waitForHold) {
				setTimeout(loop, 5000);
				return;
			}
			if (!loading) {
				do {
					random = (Math.random() * 10) | 0;
				} while (random === prev);
				prev = random;
			}
			var $img = $('<img src="img/txt' + random + '.png" >');
			if ($img.prop("complete")) {
				$img.css({opacity: 0}).appendTo(".lol").fadeTo('slow', 1);
				setTimeout(function () {
					$img.fadeTo(2000, 0, function () {
						$(this).remove();
						setTimeout(loop, 5000);
					});
				}, 13000);
			} else {
				$img.one("load", function () {loop(true); });
			}
		})();
	}, 12000);

})();

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-37761575-1']);
_gaq.push(['_trackPageview']);

(function () {
	"use strict";
	var ga = document.createElement('script');
	ga.type = 'text/javascript';
	ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s);
})();

window.readCookie = function (name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) === ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}