<?php
/*
 * Copyright (C) 2014 Penlook  
 *                    Vietnam
 *                    http://www.penlook.com
 *                    support@penlook.com
 *
 * Authors:
 *  Loi Nguyen <loint@penlook.com>
 *  Tin Nguyen <tinntt@penlook.com>
 *
 * CSS Analyser is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public
 * License as published  by the Free Software Foundation, version
 * 3 of the License.
 *
 * CSS Analyser is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License  along with stoney cloud.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 */

$input = __DIR__.'/input/text_01.html';
$html = file_get_contents($input); 
$css_start = strpos($html,'<style>');
$css_end = strpos($html,'</style>');
$css_start+=7;
$style = trim(substr($html, $css_start, $css_end-$css_start));  

$comment_pattern = '/\/\*[A-Za-z0-9\s,\s\'\"\*-@]+\*\//';        
$block_pattern = '/(({from)|){[A-Za-z-\s:;0-9.,=%!\'",\-\+?\/\\#()_]+}(to([\s]+|){[A-Za-z-\s:;0-9.,=%!\'",\-\+?\/\\#()_]+}([\s]+|)}|)/';

preg_match_all($block_pattern, $html, $matches, PREG_OFFSET_CAPTURE);
$blocks = array();    

foreach ($matches as $block) {
    $blocks[]=$block;   
} 

print_r($blocks[0]);    






