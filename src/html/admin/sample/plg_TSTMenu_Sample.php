<?php

// {{{ requires
require_once '../require.php';
require_once PLUGIN_UPLOAD_REALDIR . 'TSTMenu/class/pages/admin/sample/plg_TSTMenu_LC_Page_Admin_Sample.php';

// }}}
// {{{ generate page

$objPage = new plg_TSTMenu_LC_Page_Admin_Sample();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();
