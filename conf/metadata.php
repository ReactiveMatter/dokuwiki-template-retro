<?php
/*
 * configuration metadata
 *
 */

$meta['fullWidthSite']    = array('onoff');
$meta['showPageInfo']     = array('onoff');
$meta['inlineToc']     	  = array('onoff');
$meta['topToolBar']     = array('multicheckbox', '_choices' => array('page', 'site', 'user'));
$meta['bottomToolBar']     = array('multicheckbox', '_choices' => array('page', 'site', 'user'));
$meta['theme'] = array('multichoice','_choices' => array('Default','Dark','Terminal'));
