<?php
/**
* 2014 Madman
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author Madman
*  @copyright  2014 Madman
*  @license	http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
**/

?>
<?php

	if (!defined('_PS_VERSION_'))
	exit;

class TestModule extends Module
{


	/** Construction of module  **/
	public function __construct()
	{
		$this->name = 'testmodule';
		$this->tab = 'test';
		$this->version = '1.0';
		$this->author = 'Madman';
		$this->bootstrap = true;
		parent::__construct();

		$this->displayName = $this->l('TestModule');
		$this->description = $this->l('A simple test module');
	}

	public function install()
	{
		if (!parent::install()
			|| !$this->registerHook('displayAdminOrderTabOrder')
			|| !$this->registerHook('displayAdminOrderContentOrder')
			|| !$this->registerHook('displayAdminOrderTabShip')
			|| !$this->registerHook('displayAdminOrderContentShip')
		)
			return false;

		return true;
	}

	/** Module functions  **/
	public function hookDisplayAdminOrderTabOrder($params)
	{
		return $this->display(__FILE__, '/views/templates/hook/tab_order.tpl');
	}
	public function hookDisplayAdminOrderContentOrder($params)
	{
		return $this->display(__FILE__, '/views/templates/hook/content_order.tpl');
	}
	public function hookDisplayAdminOrderTabShip($params)
	{
		return $this->display(__FILE__, '/views/templates/hook/tab_ship.tpl');
	}
	public function hookDisplayAdminOrderContentShip($params)
	{
		return $this->display(__FILE__, '/views/templates/hook/content_ship.tpl');
	}
}
?>
