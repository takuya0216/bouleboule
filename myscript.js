const scroll_speed = 600; //スクロールスピード
var categry_active_elem = "" //カテゴリーのアクティブ要素
// 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
let vh = window.innerHeight * 0.01;
// カスタム変数--vhの値をドキュメントのルートに設定
document.documentElement.style.setProperty('--vh', `${vh}px`);

jQuery(function ($) {
   var pagetop = $('#page-top');
   // ボタン非表示
   pagetop.hide();
   pagetop.click(function () {
      $('body, html').animate({ scrollTop: 0 }, scroll_speed);
      return false;
   });
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

$(window).resize(function () {
  // ビューポート設定
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});

/* window resize function end*/

/* window scroll function start*/
$(window).scroll(function () {
    scroll_effect();
	if ($(this).scrollTop() > 100) {
           pagetop.fadeIn();
      } else {
           pagetop.fadeOut();
      }
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
