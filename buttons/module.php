<?php
namespace oneTheme;

require_once get_template_directory() . '/lib/module.class.php';

class AdditionalFunction extends module {

    public function init(){
        add_shortcode('button', array($this, 'buttons_sc'));
        add_shortcode('button-group', array($this, 'button_group'));
    }

    public function buttons_sc($atts) {
        extract( shortcode_atts(array(
          'color' => 'default',
          'url' => '/',
          'target' => 'self',
          'title' => 'More Info',
          'anchor' => 'false'
        ), $atts ) );

        $btn = 'btn btn-'.$color;

        $target = '_'.$target;

        if($anchor == 'true'){
          $an = ' smoothScroll';
        }else{
          $an = '';
        }

        return '<a class="'.$btn.$an.'" href="'.$url.'" target="'.$target.'">'.$title.'</a>';
    }

    public function button_group($atts, $content) {
        extract( shortcode_atts(array(
          'align' => 'center',
          'col' => '12',
          'off' => 'undefined',
        ), $atts ) );

        if($off == 'undefined'){
          $offset = '';
        }else{
          $offset = ' col-md-offset-'.$off;
        }

        return '<div class="text-'.$align.' col-md-'.$col.''.$offset.'">'.do_shortcode($content).'</div>';
    }


}

new AdditionalFunction();
