<?php
/*
 * This file is part of the Cart package.
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Rightleaf\Cart;

/**
* Source Class
*/
interface OrderSource
{
	private $_source;

	function __construct($source)
	{
		$this->_source = $source;
	}

	public function save();

	public function addProduct();


}