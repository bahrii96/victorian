(function ($) {
    $(document).ready(function () {
        // When the user scrolls the page, execute myFunction

        window.onscroll = function () {
            myFunction();
        };
        var header = document.querySelector('header');
        var sticky = header.offsetTop;
        function myFunction() {
            if (window.pageYOffset > 30) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        }

        $('#accordion').accordion({
            header: '> div > h3',
            heightStyle: 'content',
            collapsible: true,
        });

        $(document).on('touchstart', function (e) {
            if (!$(e.target).closest('nav').length && !$(e.target).hasClass('menu-toggle')) {
                $('.header .menu-toggle, .header nav').removeClass('is-active');
                $('body').removeClass('is-active');
            }
        });

        $('.header .menu-toggle, .header nav .close').click(function (e) {
            $('.header .menu-toggle, .header nav').toggleClass('is-active');
            $('body').toggleClass('is-active');
        });

        $('.header nav ul li.menu-item-has-children .icon').click(function () {
            const listItem = $(this).parent('li');
            $(this).toggleClass('rotate');
            listItem.toggleClass('is-active');
            if ($(this).hasClass('rotate')) {
                $(this).next().addClass('toggled');
            } else {
                $(this).next().removeClass('toggled');
            }
        });
        $('.header nav ul li.menu-item a').click(function () {
            $('.header .menu-toggle, .header nav').toggleClass('is-active');
            $('body').toggleClass('is-active');
        });

        $('.header .side-bar-toggle').click(function (e) {
            $('body').addClass('fixed');
            $('body .side-bar').addClass('show');
        });

        $('body .side-bar .close-sidebar').click(function (e) {
            $('body').removeClass('fixed');
            $('body .side-bar').removeClass('show');
        });

        $('.custom-language-switcher-active').click(function () {
            $('.custom-language-switcher-active').toggleClass('active');

            $('.custom-language-switcher-list').toggleClass('active');
        });
        if ($('.hero-block__swiper').length) {
            var swiper = new Swiper('.hero-block__swiper', {
                autoplay: {
                    delay: 5000,
                },
                loop: true,
                speed: 1000,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }
        if ($('.history-block__swiper').length) {
            var swiper = new Swiper('.history-block__swiper', {
                slidesPerView: 1,
                speed: 1000,
                navigation: {
                    nextEl: '.history-swiper-next',
                    prevEl: '.history-swiper-prev',
                },
                allowTouchMove: false,
            });
				}
			
			    var swiper = new Swiper('.mySwiper3', {
                    // loop: true,
                    spaceBetween: 10,
                    slidesPerView: 4,
                    freeMode: true,
                    watchSlidesProgress: true,
                });
                var swiper2 = new Swiper('.mySwiper2', {
                    // loop: true,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    thumbs: {
                        swiper: swiper,
                    },
								});
			 $('[data-fancybox="gallery"]').fancybox({
                 // Ваші налаштування тут
                 loop: true, // Зациклення
                 buttons: ['zoom', 'close'],
             });
    });
})(jQuery);

document.addEventListener(
    'wpcf7mailsent',
    function (event) {
        var fancyboxInstance = $.fancybox.getInstance();

        if (fancyboxInstance) {
            fancyboxInstance.close(); // Закриваємо відкритий попап
            $.fancybox.open({
                src: '#popup-answer',
                type: 'inline',
                opts: {
                    afterClose: function () {},
                },
            });
        } else {
            window.location.href = '/success';
        }
    },
    false,
);





