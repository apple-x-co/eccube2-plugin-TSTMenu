<?php
/*
 * PeriodicalSale
 * Copyright(c) 2015 DAISY Inc. All Rights Reserved.
 *
 * http://www.daisy.link/
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';

/**
 * 定期プラグイン のページクラス.
 *
 * @package PeriodicalSale
 * @author DAISY CO.,LTD.
 * @version $
 */
class plg_TSTMenu_LC_Page_Admin_Sample_Index extends LC_Page_Admin_Ex {

    /**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR ."TSTMenu/templates/admin/sample/plg_TSTMenu_Sample.tpl";
        $this->tpl_mainno = 'basis';
        $this->tpl_subno = 'tstmenu';
        $this->tpl_maintitle = 'メインタイトル';
        $this->tpl_subtitle = 'サブタイトル';
        
        $this->httpCacheControl('nocache');
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
    }
}