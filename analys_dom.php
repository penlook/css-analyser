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
 
$input = __DIR__.'/input/text.html';
$html = file_get_contents($input); 
$html_start = strpos($html,'<body>');
$html_end = strpos($html,'</body>');
$html_start += 6;
$html = trim(substr($html, $html_start, $html_end-$html_start));
 
$class_pattern = '/class=\"[A-Za-z0-9\-\s\_]+\"/';
$id_pattern = '/id=\"[A-Za-z0-9\-\s\_]+\"/';
$tag_pattern = '/<[A-za-z0-9]+/';
$property_pattern = '/(class|\"|=|\<|id)/';

preg_match_all($class_pattern, $html, $class, PREG_OFFSET_CAPTURE);
preg_match_all($id_pattern, $html, $id, PREG_OFFSET_CAPTURE);
preg_match_all($tag_pattern, $html, $tag, PREG_OFFSET_CAPTURE);

$class 	= $class[0];
$id 	= $id[0];
$tag 	= $tag[0];

$class_blocks = array();
foreach ($class as $class_block) {
	$class_blocks[] = preg_replace($property_pattern, '', $class_block[0]);
} 

$id_blocks = array();
foreach ($id as $id_block) {
	$id_blocks[] = preg_replace($property_pattern, '', $id_block[0]);
} 

$tag_blocks = array();
foreach ($tag as $tag_block) {
	$tag_blocks[] = preg_replace($property_pattern, '', $tag_block[0]);
} 

var_dump($class_blocks);
var_dump($tag_blocks);
var_dump($id_blocks);