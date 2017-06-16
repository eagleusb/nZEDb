<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program (see LICENSE.txt in the base directory.  If
 * not, see:
 *
 * @link      <http://www.gnu.org/licenses/>.
 * @author    niel
 * @copyright 2017 nZEDb
 */
namespace app\models;


/**
 * Games - class for games table.
 *
 * @package app\models
 */
class Gamesinfo extends \app\extensions\data\Model
{
//	public $belongsTo = ['Genres'];

	public $hasMany;

	public $hasOne;

	public $validates = [];

	public static function findRange($page = 1, $limit = ITEMS_PER_PAGE)
	{
		$options = [
			'limit' => $limit,
			'order' => ['name' => 'ASC'],
			'page'  => (int)$page,
			'with'	=> ['Genres'],
		];

		$result = Gamesinfo::find('all', $options);

		return $result;
	}
}

?>
