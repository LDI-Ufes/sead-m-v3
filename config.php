<?php

/**
 * config.php
 *
 * @package    theme_sead
 * @copyright  2018 onwards ldiufes.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$THEME->name = 'sead';

$THEME->sheets = [];
$THEME->editor_sheets = [];
$THEME->parents = ['boost'];
$THEME->enable_dock = false;

$THEME->yuicssmodules = array();
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->requiredblocks = '';
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

$THEME->hidefromselector = false;

$THEME->scss = function($theme) {
    $parentconfig = theme_config::load('boost');
    return theme_boost_get_main_scss_content($parentconfig);
};

$THEME->prescsscallback = 'theme_sead_get_pre_scss';
$THEME->extrascsscallback = 'theme_sead_get_extra_scss';

$THEME->scss = function($theme) {                                                                                                   
    return theme_sead_get_main_scss_content($theme);                                                                               
};

$THEME->javascripts_footer = array('jquery', 'aplicacao');