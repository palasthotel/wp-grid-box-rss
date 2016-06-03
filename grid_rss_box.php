<?php

/**
 * Plugin Name: Grid RSS Box
 * Plugin URI: https://github.com/palasthotel/wp-grid-box-rss
 * Description: Helps layouting pages with containerist.
 * Version: 1.6
 * Author: Palasthotel <rezeption@palasthotel.de> (in person: Benjamin Birkenhake, Edward Bock, Enno Welbers)
 * Author URI: http://www.palasthotel.de
 * Requires at least: 4.0
 * Tested up to: 4.5.1
 * License: http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @copyright Copyright (c) 2014, Palasthotel
 * @package Palasthotel\Grid-WordPress
 */

class GridRSSBox {
  /**
   * GridRSSBox constructor
   * add filters and actions and init plugin
   */
  public function __construct(){
	add_action("grid_load_classes", array($this, "load_classes") );
	add_filter("grid_templates_paths", array($this, "template_paths") );
  }

  /**
   * load grid box classes
   */
  public function load_classes(){
	require "boxes/grid-disqus-popular-box.inc";
  }

  /**
   * add template path to grid template paths
   * @param $paths
   * @return array
   */
  public function template_paths($paths){
	$paths[] = dirname(__FILE__)."/grid-rss-box/templates";
	return $paths;
  }
}

new GridRSSBox();