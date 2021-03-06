<?php

namespace SiteTool\Processor\Data;

use SiteTool\UrlToCheck;

class FoundUrlToFollow
{
    public $href;

    /** @var UrlToCheck */
    public $urlToCheck;
    
    public function __construct(UrlToCheck $urlToCheck)
    {
        $this->urlToCheck = $urlToCheck;
    }
}
