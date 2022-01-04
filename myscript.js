const scroll_speed = 600; //スクロールスピード
var categry_active_elem = "" //カテゴリーのアクティブ要素
jQuery(function ($) {
  //ハンバーガーメニューの開閉
	$('.hamburger').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.mytheme-nav').addClass('active');

        } else {
            $('.mytheme-nav').removeClass('active');

        }
    });

	$('.nav-item').click(function() {
        $('.hamburger').toggleClass('active');

        if ($('.hamburger').hasClass('active')) {

        } else {

        }
    });

/* window onload function end*/
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
