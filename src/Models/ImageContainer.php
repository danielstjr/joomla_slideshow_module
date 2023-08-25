<?php

namespace ThreeStone\Module\Slideshow\Site\Models;

class ImageContainer
{
    public string $link;
    public ?string $alt;
    public ?string $upperCaption;
    public ?string $lowerCaption;
    public ?string $captionColor;

    public function __construct(string $link, ?string $alt, ?string $upperCaption, ?string $lowerCaption, ?string $color)
    {
        $this->link = $link;
        $this->alt = $alt;
        $this->upperCaption = $upperCaption;
        $this->lowerCaption = $lowerCaption;
        $this->captionColor = $color;
    }
}