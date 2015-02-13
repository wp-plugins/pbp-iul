<?php
/*
Plugin Name: PBP IUL
Plugin URI: http://projoktibangla.net
Description: This plugin increase upload size limit up to 100Mb
Author: projoktibangla
Version: 1.0
Author URI: http://projoktibangla.net
*/
/*
Copyright (C) 2013  projoktibangla

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

add_filter( 'upload_size_limit', 'PBP_increase_upload' );

function PBP_increase_upload( $bytes )
{
    return 104857600; // 100 megabytes
}
?>