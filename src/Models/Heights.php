<?php

namespace ThreeStone\Module\Slideshow\Site\Models;

class Heights
{
    public string $xxl;
    public string $xl;
    public string $lg;
    public string $md;
    public string $sm;
    public string $xsm;

    public function __construct(string $xxl, string $xl, string $lg, string $md, string $sm, string $xsm)
    {
        $this->xxl = $xxl;
        $this->xl = $xl;
        $this->lg = $lg;
        $this->md = $md;
        $this->sm = $sm;
        $this->xsm = $xsm;
    }
}