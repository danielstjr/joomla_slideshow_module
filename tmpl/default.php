<?php
/**
 * @package    mod_slideshow
 *
 * @author     daniel <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\HTML\HTMLHelper;
use ThreeStone\Module\Slideshow\Site\Models\Heights;
use ThreeStone\Module\Slideshow\Site\Models\ImageContainer;

defined('_JEXEC') or die;

/** @var Heights $heights */
/** @var ImageContainer[] $images */
$carouselId = "module-carousel-{$module->id}";
$scaleName = "scale-{$module->id}";
$stylesheetScaleName = ".{$scaleName}";
HTMLHelper::_('bootstrap.carousel', $carouselId);
?>

<style>
    .carousel {
        background: black;
    }

    <?php echo $stylesheetScaleName; ?> {
        width: 100%;
        height: <?php echo $heights->xxl ?>;
    }

    .carousel-item img {
        object-fit: contain;
        object-position: center;
        height: 100%;
        width: 100%;
        overflow: hidden;
        vertical-align: center;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 80px;
        width: 45px;
        border: 2px solid lightgray;
        background: black;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
        color: white;
        padding-top: 23px;
    }

    .carousel-caption-top,
    .carousel-caption-bottom {
        text-shadow: 2px 2px #000;
        line-height: 0;
        font-size: 48px;
    }

    .carousel-caption-top {
        top: 10%;
        bottom: auto;
    }

    .carousel-caption-bottom {
        bottom: 10%;
        top: auto;
    }

    @media only screen and (max-width: 1400px) {
        <?php echo $stylesheetScaleName; ?> {
            height: <?php echo $heights->xl ?>;
        }

        .carousel-caption-top,
        .carousel-caption-bottom {
            font-size: 40px;
        }
    }

    @media only screen and (max-width: 1200px) {
        <?php echo $stylesheetScaleName; ?> {
            height: <?php echo $heights->lg ?>;
        }

        .carousel-caption-top,
        .carousel-caption-bottom {
            font-size: 32px;
        }
    }

    @media only screen and (max-width: 992px) {
        <?php echo $stylesheetScaleName; ?> {
            height: <?php echo $heights->md ?>;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 70px;
            width: 38px;
            font-size: 18px;
            padding-top: 19px;
        }

        .carousel-caption-top,
        .carousel-caption-bottom {
            font-size: 28px;
        }
    }

    @media only screen and (max-width: 768px) {
        <?php echo $stylesheetScaleName; ?> {
            height: <?php echo $heights->sm ?>;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 60px;
            width: 31px;
            border: 1px solid lightgray;
            font-size: 13px;
            padding-top: 18px;
        }

        .carousel-caption-top,
        .carousel-caption-bottom {
            display: none
        }
    }

    @media only screen and (max-width: 576px) {
        <?php echo $stylesheetScaleName; ?> {
            height: <?php echo $heights->xsm ?>;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 50px;
            width: 25px;
            border: 1px solid lightgray;
            font-weight: 500;
            font-size: 11px;
            padding-top: 15px;
        }
    }
</style>
<div id="<?php echo $carouselId ?>" class="carousel slide <?php echo $scaleName ?>" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($images as $image) {
            echo '<button ';
            if ($i === 0) {
                echo 'class="active" ';
            }

            echo "type=\"button\" data-bs-target=\"#{$carouselId}\" data-bs-slide-to=\"{$i}\" ";
            if ($i === 0) {
                echo 'aria-current="true" ';
            }

            $j = $i + 1;
            echo "aria-label=\"Slide {$j}\"></button>";

            $i++;
        }
        ?>
    </div>
    <div class="carousel-inner <?php echo $scaleName ?>">
        <?php
        $loopCounter = 0;
        foreach ($images as $image) {
            echo '<div class="carousel-item ' . $scaleName;
            if ($loopCounter === 0) {
                echo ' active">';
            } else {
                echo '">';
            }

            echo "<img src=\"{$image->link}\"";

            if (!empty($image->alt)) {
                echo " alt=\"{$image->alt}\"";
            }

            echo '/>';

            if ($image->upperCaption !== null) {
                echo "<div class=\"carousel-caption carousel-caption-top overflow-visible\" style=\"color: {$image->captionColor};\"><p>{$image->upperCaption}</p></div>";
            }

            if ($image->lowerCaption !== null) {
                echo "<div class=\"carousel-caption carousel-caption-bottom overflow-visible\" style=\"color: {$image->captionColor};\"><p>{$image->lowerCaption}</p></div>";
            }

            echo '</div>';

            $loopCounter++;
        }
        ?>
    </div>
    <button class="carousel-control-prev" data-bs-target="#<?php echo $carouselId ?>" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true">❮</span>
    </button>
    <button class="carousel-control-next" data-bs-target="#<?php echo $carouselId ?>" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true">❯</span>
    </button>
</div>