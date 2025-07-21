<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\GameExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class GameExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [

            new TwigFilter('get_rating_avg', [GameExtensionRuntime::class, 'getRatingAvg']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_last_game', [GameExtensionRuntime::class, 'getLastGame']),
            new TwigFunction('get_rating_stars', [GameExtensionRuntime::class, 'getRatingStars']),

        ];
    }
}
