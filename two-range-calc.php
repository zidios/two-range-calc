<?php
/*
 * Plugin Name: Two range simple calculator
 * Description: Калькулятор стоимости
 * Author:      Удачин Владимир
 * Version:     0.1
 */
/*  Copyright 2021  Vladymyr U

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 if ( ! defined( 'ABSPATH' ) ) {
exit;

}
function simpleCalculator(){
    wp_enqueue_script('mainJS', plugins_url( 'assets/js/main.js', __FILE__ ));
    wp_enqueue_style("mainsstyle", plugins_url( 'assets/css/style.css', __FILE__ ) );
    add_shortcode( 'calculator', 'simple_calculator_block' );
}
function simple_calculator_block( $atts ){
    $atts = shortcode_atts( array(
        'label1'   => 'Площадь пола, м²',
        'label2' => 'Толщина слоя, см',
        'range1min'  => '20',
        'range1max'  => '1500',
        'range2min'  => '4',
        'range2max'  => '12',
        'base_price'  => '500',
    ), $atts );
    $calcBody = '
    <div class="calculator_container">
        <div class="calculator_row">
            <label for="calculator_range1">'. $atts['label1'] .'</label>
        </div>
        <div class="calculator_row">
            <div class="calculator_col"><input id="calculator_range1" type="range" min="'. $atts['range1min'] .'" max="'. $atts['range1max'] .'" value="'. $atts['range1min'] .'" onchange="updateRangeValue(this.value, \'calculator_value1\')" /></div>
            <div class="calculator_col"><input id="calculator_value1" class="range_value" type="number" min="'. $atts['range1min'] .'" max="'. $atts['range1max'] .'" value="'. $atts['range1min'] .'" onchange="updateRangeValue(this.value, \'calculator_range1\')" /></div>
        </div>
        <div class="calculator_row">
            <label for="calculator_range2">'. $atts['label2'] .'</label>
        </div>
        <div class="calculator_row">
            <div class="calculator_col"><input id="calculator_range2" type="range" min="'. $atts['range2min'] .'" max="'. $atts['range2max'] .'" value="'. $atts['range2min'] .'"  onchange="updateRangeValue(this.value, \'calculator_value2\')" /></div>
            <div class="calculator_col"><input id="calculator_value2" class="range_value"  type="number"  min="'. $atts['range2min'] .'" max="'. $atts['range2max'] .'" value="'. $atts['range2min'] .'" onchange="updateRangeValue(this.value, \'calculator_range2\')" /></div>
        </div>
        <div class="calculator_row">
            <div class="calculator_col"><span class="calculator_total"><span class="calculator_number">0</span> руб</span></div>
            <div class="calculator_col"><span class="calculator_price">~<span class="calculator_number">0</span> руб/м²</span></div>
        </div>
        <input type="hidden" id="calculator_base" value="'. $atts['base_price'] .'" />
</div>
    ';
    return $calcBody;

}
add_action('init', 'simpleCalculator');