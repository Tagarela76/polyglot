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

define( 'PUG_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) );

require_once('classes/adminUserGroup.class.php');
require_once('functions/functions.php');
//create admin object
$wpAdmin = new adminUserGroup();
//add poliglot plugin to menu
add_action('admin_menu', array($wpAdmin, 'wp_add_polyglot_user_group_admin'));




?>