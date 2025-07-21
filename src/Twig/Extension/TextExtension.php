<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\TextExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class TextExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [

            new TwigFilter('short', [TextExtensionRuntime::class, 'transformShort']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [TextExtensionRuntime::class, 'doSomething']),
        ];
    }
}
