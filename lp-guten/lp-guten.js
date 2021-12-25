wp.domReady(function () {

  //カバーブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/cover', {
    name: 'lpheight',
    label: '高さをアレンジ'
  });

  //見出しブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/heading', {
    name: 'lpshadow',
    label: '影をつける'
  });

  //段落ブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/paragraph', {
    name: 'lpshadow',
    label: '影をつける'
  });

  //カラムブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/columns', {
    name: 'lpconcepts',
    label: 'コンセプト'
  });

  //メディアとテキストブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/media-text', {
    name: 'lpmedia',
    label: '高さアレンジ（カラム塗りつぶし）'
  });

  wp.blocks.registerBlockStyle('core/media-text', {
    name: 'lpcard',
    label: 'カード型'
  });

});
