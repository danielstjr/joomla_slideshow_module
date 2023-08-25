<?php
/**
 * @package    mod_slideshow
 *
 * @author     daniel <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use ThreeStone\Module\Slideshow\Site\SlideShowHelper;

$images = SlideShowHelper::parseImages($params);
$heights = SlideShowHelper::parseHeights($params);

require ModuleHelper::getLayoutPath('mod_slideshow');