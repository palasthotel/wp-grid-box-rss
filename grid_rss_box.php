<?php

/**
 * Plugin Name: Grid RSS Box
 * Plugin URI: https://github.com/palasthotel/wp-grid-box-rss
 * Description: RSS feed box for Grid.
 * Version: 1.0
 * Author: Palasthotel <rezeption@palasthotel.de> (in person: Edward Bock)
 * Author URI: http://www.palasthotel.de
 * Requires at least: 4.0
 * Tested up to: 4.5.1
 * License: http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @copyright Copyright (c) 2014, Palasthotel
 * @package Palasthotel\Grid-WordPress-RSS-Box
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
	require dirname(__FILE__)."/grid-rss-box/grid_rss_box.php";
	$dirs = wp_upload_dir();
	grid_rss_box::$CACHE_DIR = $dirs["basedir"]."/grid_rss_cache/";

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

/**
 * construct plugin
 */
new GridRSSBox();