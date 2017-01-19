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
	
    function install($arrPlugin) {
    	self::copyFiles($arrPlugin);
	}
    
    function uninstall($arrPlugin) {
    	self::deleteFiles($arrPlugin);
    }
    
    function enable($arrPlugin) {
        // nop
    }
    
    function disable($arrPlugin) {
        // nop
    }
	
    function prefilterTransform(&$source, LC_Page_Ex $objPage, $filename) {
    	self::prefilterTransformAdmin($source, $objPage, $filename);
    }
    
    private static function prefilterTransformAdmin(&$source, LC_Page_Ex $objPage, $filename) {
    	if (strcmp($filename, TEMPLATE_ADMIN_REALDIR . 'basis/subnavi.tpl') === 0) {
    		$objTransform = new SC_Helper_Transform_Ex($source);
    		$objTransform->select('ul.level1')->appendChild(file_get_contents(PLUGIN_UPLOAD_REALDIR . self::PLUGIN_TEMPLATES_PATH . 'admin/plg_tstmenu_subnavi.tpl'));
    		$source = $objTransform->getHTML();
    	}
	}
	
	private static function copyFiles($arrPlugin) {
		if (!file_exists(HTML_REALDIR . ADMIN_DIR . 'sample/')) {
			GC_Utils::gfPrintLog(__LINE__ . ': ディレクトリを作成します');
			if (!mkdir(HTML_REALDIR . ADMIN_DIR . 'sample/')) {
				GC_Utils::gfPrintLog(__LINE__ . ': ディレクトリの作成に失敗しました');
			}
		}
		
		GC_Utils::gfPrintLog(__LINE__ . ': ファイルをコピーします');
		copy(PLUGIN_UPLOAD_REALDIR . $arrPlugin['plugin_code'] . '/html/admin/sample/plg_TSTMenu_Sample.php', HTML_REALDIR . ADMIN_DIR . 'sample/plg_TSTMenu_Sample.php');
	}
	
	private static function deleteFiles($arrPlugin) {
		SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . 'sample/plg_TSTMenu_Sample.php');
		
		if (file_exists(HTML_REALDIR . ADMIN_DIR . 'sample/')) {
			if (!SC_Helper_FileManager_Ex::sfDirChildExists(HTML_REALDIR . ADMIN_DIR . 'sample/')) {
				SC_Helper_FileManager_Ex::deleteFile(HTML_REALDIR . ADMIN_DIR . 'sample/');
			}
		}
	}
}
?>