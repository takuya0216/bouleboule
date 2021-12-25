const scroll_speed = 600; //スクロールスピード

jQuery(function ($) {
  //ハンバーガーメニューの開閉
	$('.navToggle').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.hamburger-content').addClass('active');
            $('.navbar').addClass('active');
            $('#overlay').css('visibility', 'visible');
            $('.nav-brand-sp-hidden').addClass('active');
        } else {
            $('.hamburger-content').removeClass('active');
            $('.navbar').removeClass('active');
            $('#overlay').css('visibility', 'hidden');
            $('.nav-brand-sp-hidden').removeClass('active');
        }
    });

	$('.nav-item').click(function() {
        $('.navToggle').toggleClass('active');

        if ($('.navToggle').hasClass('active')) {
            $('.hamburger-content').addClass('active');
            $('.navbar').addClass('active');
            $('#overlay').css('visibility', 'visible');
            $('.nav-brand-sp-hidden').addClass('active');
        } else {
            $('.hamburger-content').removeClass('active');
            $('.navbar').removeClass('active');
            $('#overlay').css('visibility', 'hidden');
            $('.nav-brand-sp-hidden').removeClass('active');
        }
    });

//window resize function start*/
/*
$(window).resize(function () {


});
*/
/* window resize function end*/

/* window scroll function start*/
$(window).scroll(function () {
    scroll_effect();
});
/* window scroll function end*/

//ページのトップまでスクロール
function scrollToTop() {
    $("html,body").animate({ scrollTop: 0 }, scroll_speed, "swing");
}

//指定したpageIdの要素までスクロール。ヘッダーのサイズを設定する。
function scrollToPage(pageId) {

    //ヘッダーのサイズを必ず指定
    var headerH = $('.navbar').outerHeight();
    var y = window.pageYOffset;
    var element = document.getElementById(pageId);
    var rect = element.getBoundingClientRect();
    var position = rect.top + y;

    $("html,body").animate({ scrollTop: position - headerH }, scroll_speed, "swing");

}
//スクロールアニメーション
function scroll_effect() {
    //fade-in-up
    $('.fade-in-up').each(function () {
        //.fade-in-upを指定したエレメントのBottom位置がトリガー。
        var elemPos = $(this).offset().top + $(this).outerHeight();
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (elemPos < scroll + windowHeight){
            $(this).addClass('effect-scroll');
        }
    });
    }

});
