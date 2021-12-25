wp.domReady(function () {

  //画像ブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/image', {
    name: 'my50vh',
    label: '高さをアレンジ'
  });

});
