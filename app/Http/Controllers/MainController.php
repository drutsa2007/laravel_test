<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request = null) {
        /* расскоментировать строку для получения данных извне, например через postman
         * я использую 2 способа.
         * 1. Использую массив PHP
         * 2. Использую объект через отправку в jquery
         */
        //$data = $request->all(); // эту строку

        /*Этот массив необходимо закоментировать*/
        $data = [
          "step3"=>[
              "step3_1"=>[
                  "step3_1_1", "step3_1_2",
              ],
              "step3_2"=>[
                  "step3_2_1", "step3_2_2", "step3_2_3",
              ],
              "step3_3"=>"Конец",
              "step3_4"=>[
                  "step3_4_1", "step3_4_2", "step3_4_3", "step3_4_3",
              ],
            ],
          "step4"=>[
              "step3_1"=>[
                  "step3_1_1", "step3_1_2"=>["qweqwe", "2141324"=>"1234tf234------------"],
              ],
              "step3_2"=>[
                  "step3_2_1", "step3_2_2", "step3_2_3",
              ],
              "step3_3"=>"Конец",
              "step3_4"=>[
                  "step3_4_1", "step3_4_2", "step3_4_3", "step3_4_3",
              ],
            ],
        ];
        $text = self::build_tree($data, 0, 0);
        return view('pages.main', compact('data', 'text'));
    }

    static function build_tree($data, $current_level, $show_level){
        $parent = '';
        if ($show_level < $current_level) $parent = ' class="hide"';
        $tree = '<ul'.$parent.' type="none">';
        foreach($data as $key=>$item){
            if (is_array($item)) {
                $tree .= '<li class="showUL"><b>+</b> ' . $key;
                $tree .= self::build_tree($item, $current_level+1, $show_level);
                $tree .= '</li>';
            }
            else
                $tree .= '<li>'.$item.'</li>';
        }
        $tree .= '</ul>';
        return $tree;
    }
}
