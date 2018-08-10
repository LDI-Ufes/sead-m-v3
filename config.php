<?php
 
// This line protects the file from being accessed by a URL directly.                                                               
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