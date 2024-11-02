<?php
/*
Plugin Name: block-comment
Plugin http://wordpress.org/extend/plugins/block-comment/
Description: In current system in wordpress user that type is contributor can write comment.But if site admin want to block witting comment for contributor it possible by activate "block-comment" plugin.
Author: Md. Jamal Hossain Khan
Version: 1.1
Author URI: http://www.krishe.com/en

	Copyright 2010 Md. Jamal Hossain Khan (email : jamal_khanbd@yahoo.com)
 
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
// Begin block commment plugin

$jk_bcc = new Block_comment();

class Block_comment{
	
	public function __construct()
	{
		add_filter('plugin_row_meta', array(&$this,'jk_filter_plugin_links'), 10, 2);
		add_filter('pre_comment_approved', array(&$this,'block_contributor_comment'),9999);	
	}
	// Add donate and support information
	function jk_filter_plugin_links($links, $file)
	{
		if ( $file == plugin_basename(__FILE__) )
		{
		$links[] = '<a href="http://www.krishe.com/en/block-comment">' . __('Support') . '</a>';
		$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=NR7SVN2HFJXX4&lc=GB&item_name=Donation%20for%20Plugin%20Development&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted">' . __('Donate') . '</a>';
		}
		return $links;
	}

	function block_contributor_comment()
	{
		if(!current_user_can('level_2')){
		return false;
		}else{
		return true;
		}	
	}
}
?>