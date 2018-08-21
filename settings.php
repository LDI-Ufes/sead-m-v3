<?php

/**
 * settings.php
 *
 * @package    theme_sead
 * @copyright  2018 onwards ldiufes.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// Every file should have GPL and copyright in the header - we skip it in tutorials but you should not skip it for real.
// This line protects the file from being accessed by a URL directly.                                                               
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when                      
// we are looking at the admin settings pages.                                                                                      
if ($ADMIN->fulltree) {

  // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.                         
  $settings = new theme_boost_admin_settingspage_tabs('themesettingsead', get_string('configtitle', 'theme_sead'));

  // Each page is a tab - the first is the "General" tab.                                                                         
  $page = new admin_settingpage('theme_sead_general', get_string('generalsettings', 'theme_sead'));

  // Replicate the preset setting from boost.                                                                                     
  $name = 'theme_sead/preset';
  $title = get_string('preset', 'theme_sead');
  $description = get_string('preset_desc', 'theme_sead');
  $default = 'default.scss';

  // We list files in our own file area to add to the drop down. We will provide our own function to                              
  // load all the presets from the correct paths.                                                                                 
  $context = context_system::instance();
  $fs = get_file_storage();
  $files = $fs->get_area_files($context->id, 'theme_sead', 'preset', 0, 'itemid, filepath, filename', false);

  $choices = [];
  foreach ($files as $file) {
    $choices[$file->get_filename()] = $file->get_filename();
  }
  // These are the built in presets from Boost.                                                                                   
  $choices['default.scss'] = 'default.scss';
  $choices['plain.scss'] = 'plain.scss';

  $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
  $setting->set_updatedcallback('theme_reset_all_caches');
  $page->add($setting);

  // Preset files setting.                                                                                                        
  $name = 'theme_sead/presetfiles';
  $title = get_string('presetfiles', 'theme_sead');
  $description = get_string('presetfiles_desc', 'theme_sead');

  $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0, array('maxfiles' => 20, 'accepted_types' => array('.scss')));
  $page->add($setting);

  // Variable $brand-color.                                                                                                       
  // We use an empty default value because the default colour should come from the preset.                                        
  $name = 'theme_sead/brandcolor';
  $title = get_string('brandcolor', 'theme_sead');
  $description = get_string('brandcolor_desc', 'theme_sead');
  $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
  $setting->set_updatedcallback('theme_reset_all_caches');
  $page->add($setting);

  // Must add the page after definiting all the settings!
  $settings->add($page);

  // Advanced settings.
  $page = new admin_settingpage('theme_sead_advanced', get_string('advancedsettings', 'theme_sead'));

  // Raw SCSS to include before the content.                                                                                      
  $setting = new admin_setting_configtextarea('theme_sead/scsspre', get_string('rawscsspre', 'theme_sead'), get_string('rawscsspre_desc', 'theme_sead'), '', PARAM_RAW);
  $setting->set_updatedcallback('theme_reset_all_caches');
  $page->add($setting);

  // Raw SCSS to include after the content.                                                                                       
  $setting = new admin_setting_configtextarea('theme_sead/scss', get_string('rawscss', 'theme_sead'), get_string('rawscss_desc', 'theme_sead'), '', PARAM_RAW);
  $setting->set_updatedcallback('theme_reset_all_caches');
  $page->add($setting);

  $settings->add($page);
}