<?php
// This file declares an Angular module which can be autoloaded
// in CiviCRM. See also:
// http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules

$result = array (
  'requires' => array('crmUi', 'crmUtil', 'ngRoute', 'crmMailing'),
  'js' =>
  array (
    0 => 'ang/crmMosaico.js',
    1 => 'ang/crmMosaico/*.js',
    2 => 'ang/crmMosaico/*/*.js',
  ),
  'css' => array(),
  'partials' =>
  array (
    'ang/crmMosaico',
    CRM_Mosaico_Utils::isBootstrap() ? 'ang/crmMosaico.bootstrap' : 'ang/crmMosaico.crmstar',
  ),
  'settings' =>
  array (
    'canDelete' => Civi::service('civi_api_kernel')->runAuthorize('MosaicoTemplate', 'delete', array('version' => 3, 'check_permissions' => 1)),
    // If there are any navbars that we should try to avoid, include them
    // in these jQuery selectors.
    'topNav' => '#civicrm-menu',
    'drupalNav' => '#toolbar',
    'joomlaNav' => '.com_civicrm > .navbar',
    'leftNav' => '.wp-admin #adminmenu',
    'useBootstrap' => CRM_Mosaico_Utils::isBootstrap(),
  ),
);

$result['css'][]= ($result['settings']['useBootstrap']) ? 'css/mosaico-bootstrap.css' : 'css/mosaico-crmstar.css';
if (version_compare(CRM_Utils_System::version(), '4.7', '<')) {
  $result['css'][]= 'css/legacy.css';
}

return $result;
