<?php

namespace Fallfoundry\TocGenerator;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        \Fallfoundry\TocGenerator\Tags\TOC::class,
    ];

    public function bootAddon()
    {
        //
    }
}
