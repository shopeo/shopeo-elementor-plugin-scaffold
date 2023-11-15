<?php

namespace Shopeo\ShopeoElementorPluginScaffold\Widgets;

use Elementor\Widget_Base;

class ShopeoHelloWidget extends Widget_Base
{

	public function get_name()
	{
		return "world";
	}

	public function get_title()
	{
		return "World";
	}

	public function get_categories()
	{
		return ['shopeo'];
	}
}
