<?php

namespace ThreeStone\Module\Slideshow\Site;


use ThreeStone\Module\Slideshow\Site\Models\Heights;
use ThreeStone\Module\Slideshow\Site\Models\ImageContainer;

class SlideShowHelper
{
    /**
     * Get each image from the params that is non null
     *
     * @param $params
     * @return array
     * @since 1.0
     */
    public static function parseImages($params): array {
        $images = (array)$params->get('images');

        $output = [];
        foreach($images as $imageWrapper) {
            if (empty($imageWrapper->image->imagefile)) {
                continue;
            }

            $output[] = new ImageContainer(
                $imageWrapper->image->imagefile,
                $imageWrapper->image->alt_text,
                $imageWrapper->upper_caption,
                $imageWrapper->lower_caption,
                $imageWrapper->caption_color
            );
        }

        return $output;
    }

    /**
     * Parse heights into POPO
     *
     * @param $params
     * @return Heights
     * @since 1.0
     */
    public static function parseHeights($params): Heights
    {
        return new Heights(
            $params->get('height_xxl'),
            $params->get('height_xl'),
            $params->get('height_lg'),
            $params->get('height_md'),
            $params->get('height_sm'),
            $params->get('height_xsm')
        );
    }
}