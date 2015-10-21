<?php
/**
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program (see LICENSE.txt in the base directory.  If
 * not, see:
 *
 * @link      <http://www.gnu.org/licenses/>.
 * @author    niel
 * @copyright 2015 nZEDb
 */
namespace nzedb\processing;

/**
 * Parent class for TV/Film and any similar classes to inherit from.
 *
 * @package nzedb\processing
 */
abstract class Videos
{
	/**
	 * @var \nzedb\db\Settings
	 */
	public $pdo;

	/**
	 * @var array	sites	The sites that we have an ID columns for in our video table.
	 */
	private $sites = ['imdb', 'tmdb', 'trakt', 'tvdb', 'tvmaze', 'tvrage'];


	public function __construct(array $options = [])
	{
		$defaults = [
			'Echo'     => false,
			'Settings' => null,
		];
		$options += $defaults;

		// Sets the default timezone for this script (and its children).
		date_default_timezone_set('UTC');

		$this->pdo = ($options['Settings'] instanceof Settings ? $options['Settings'] : new Settings());
	}

	/**
	 * Get video info from a Site ID and column.
	 *
	 * @param string  $siteColumn
	 * @param integer $videoID
	 *
	 * @return array|false    False if invalid site, or ID not found; Site id value otherwise.
	 */
	protected function getSiteIDFromVideoID($siteColumn, $videoID)
	{
		if (in_array($siteColumn, $this->sites)) {
			$result = $this->pdo->queryOneRow(("SELECT $siteColumn FROM videos WHERE id = $videoID");

			return isset($result[$siteColumn]) ? $result[$siteColumn] : false;
		}

		return false;
	}

	/**
	 * Get video info from a Site ID and column.
	 *
	 * @param string	$siteColumn
	 * @param integer	$siteID
	 *
	 * @return array|false	False if invalid site, or ID not found; video.id value otherwise.
	 */
	protected function getVideoIDFromSiteID($siteColumn, $siteID)
	{
		if (in_array($siteColumn, $this->sites)) {
			$result = $this->pdo->queryOneRow("SELECT id FROM videos WHERE $siteColumn = $siteID");

			return isset($result['id']) ? $result['id'] : false;
		}
		return false;
	}
}
