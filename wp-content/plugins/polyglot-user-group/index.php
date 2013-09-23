<?php

/*
  Plugin Name: Polyglot User Groups
  Plugin URI:
  Description: Create user groups for correct dispaing menu
  Version: 1.0.0
  Author: Tagarela
  Author URI:
  License: GPL2
 */

/*  Copyright 20013  Tagarela  (email : denis.kv76 {at} gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

add_action('admin_menu', 'function_name');

function function_name()
{
    if (function_exists('add_options_page'))
    {
        //Добавляем пункт меню в Параметры
        //add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
        add_options_page('Страница настроек моего плагина', 'Polyglot User Groups', 'manage_options', 'MypluginUniqIdentifictor', 'MyPluginPageOptions');
    }
}

function MyPluginPageOptions()
{
echo "<h2>Настройки моего плагина.</h2>";
}
?>