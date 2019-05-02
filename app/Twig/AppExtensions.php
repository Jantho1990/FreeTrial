<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtensions extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('str_replace', [$this, 'str_replace']),
        ];
    }

    public function str_replace(string $target, string $replacement, string $source)
    {
        return str_replace($target, $replacement, $source);
    }
}