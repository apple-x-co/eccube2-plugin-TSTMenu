<?php
/*
 * This file is part of EC-CUBE
*
* Copyright(c) 2000-2011 LOCKON CO.,LTD. All Rights Reserved.
*
* http://www.lockon.co.jp/
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
*/

/**
 * プラグインメイン
 *
 * @package TSTMenu
 * @version $Id$
 */
class TSTMenu extends SC_Plugin_Base {
	
	const PLUGIN_TEMPLATES_PATH = 'TSTMenu/templates/';
	
    function install($plugins) {
        // nop
	}
    
    function uninstall($plugins) {
        // nop
    }
    
    function enable($plugins) {
        // nop
    }
    
    function disable($plugins) {
        // nop
    }
	
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
    	self::prefilterTransformAdmin($source, $objPage, $filename);
    }
    
    private function prefilterTransformAdmin(&$source, LC_Page_Ex $objPage, $filename) {
    	if (strcmp($filename, TEMPLATE_ADMIN_REALDIR . 'basis/subnavi.tpl') === 0) {
    		$objTransform = new SC_Helper_Transform_Ex($source);
    		$objTransform->select('ul.level1')->appendChild(file_get_contents(PLUGIN_UPLOAD_REALDIR . self::PLUGIN_TEMPLATES_PATH . 'admin/plg_tstmenu_subnavi.tpl'));
    		$source = $objTransform->getHTML();
    	}
	}
}
?>