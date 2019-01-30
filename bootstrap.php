<?php

use Inc2734\WP_Customizer_Framework\Style;

add_action(
  'inc2734_wp_customizer_framework_load_styles',
  function() {
    $accent_color = get_theme_mod( 'accent-color' );

    //RGB数値に変換するカラーコード
    $colorcode = get_theme_mod( 'accent-color' );
     
    //「#******」のような形でカラーコードがわたってきた場合「#」を削除する
    $colorcode = preg_replace("/#/", "", $colorcode);
     
    //「******」という形になっているはずなので、2つずつ「**」に区切る
    //そしてhexdec関数で変換して配列に格納する
    $cred = hexdec(substr($colorcode, 0, 2));
    $cgreen = hexdec(substr($colorcode, 2, 2));
    $cblue = hexdec(substr($colorcode, 4, 2));

    $colorset =  $cred . ", " . $cgreen . ", " . $cblue;

Style::register(
        [
            'body',
        ],
        [
            'background-color: rgba(' .$colorset. ' ,.07)', 
        ]
    );
Style::register(
        [
            '.c-entries--rich-media .c-entry-summary__figure::after, .c-entries--rich-media .c-page-summary__figure::after',
        ],
        [
            'color: ' . get_theme_mod( 'accent-color') . ';background-color: rgba(255,255,255,.9);background-image:none;',
        ]
    );
Style::register(
        [
            '.c-pagination__item-link:active, .c-pagination__item-link:focus, .c-pagination__item-link:hover',
        ],
        [
            'background-color: rgba(' .$colorset. ' ,.6)', 
        ]
    );
Style::register(
        [
            '.c-widget__title,.archive .c-entry__title',
        ],
        [
            'background-color:  ' . get_theme_mod( 'accent-color') .';', 
        ]
    );
Style::register(
        [
            '.p-global-nav .c-navbar__item[data-active-menu="true"] > a, .l-header[data-l-header-type="overlay"] [data-has-global-nav] .p-global-nav .c-navbar__item[data-active-menu="true"] > a',
        ],
        [
            'box-shadow: 0px -3px ' . get_theme_mod( 'accent-color') .' inset;', 
        ]
    );
Style::register(
        [
            '.l-footer',
        ],
        [
            'background-color: rgba(' .$colorset. ' ,.1)', 
        ]
    );
  }
);
