
(function () {
	
	"use strict";

	if (/https?:\/\/www\./.test(document.location.href)) {
		document.location = document.location.href.replace("www.", "");
	}


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
					random = (Math.random() * 11) | 0;
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