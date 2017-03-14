$(document).ready(function(){
			$(".menu li a").each(function() {
				if ($(this).next().length > 0) {
					$(this).addClass("parent");
				};
			})
			var menux = $('.menu li a.parent');
			$( '<div class="more"><img src="images/btn_hamburger.png" alt=""></div>' ).insertBefore(menux);
			$('.more').click(function(){
				$(this).parent('li').toggleClass('open');
			});
			$('.menu-btn').click(function(){
				$('nav').toggleClass('menu-open');
			});
		});