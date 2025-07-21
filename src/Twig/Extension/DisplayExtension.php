<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\DisplayExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class DisplayExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [

            new TwigFilter('display_content', [DisplayExtensionRuntime::class, 'displayContent']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [DisplayExtensionRuntime::class, 'doSomething']),
        ];
    }
}
