<?php

/**
 * version.php
 *
 * @package    theme_sead-m-v3.0.1
 * @copyright  2018 onwards ldiufes.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
                                                
defined('MOODLE_INTERNAL') || die();
 
$THEME->name = 'sead-m-v3.0.1';

$THEME->sheets = [];                                                                                                                
$THEME->editor_sheets = [];                                                                                                         
$THEME->parents = ['boost'];                                                                                                        
$THEME->enable_dock = false;

$THEME->yuicssmodules = array();                                                                                                    
$THEME->rendererfactory = 'theme_overridden_renderer_factory';                                                                      
$THEME->requiredblocks = '';   
$THEME->addblockposition = BLOCK_ADDBLOCK_POSITION_FLATNAV;

$THEME->hidefromselector = false;