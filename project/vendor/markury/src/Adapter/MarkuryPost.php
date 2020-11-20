<?php

namespace Markury;


class MarkuryPost
{
    public static function marcuryBase()
    {
        $marsFile = __DIR__.'/marcuryBase.txt';
        $str = file_get_contents($marsFile);
        return $str;
    }
    public static function marcuryBasee()
    {
        $marsFile = __DIR__.'/marcuryInfo.txt';
        $str = file_get_contents($marsFile);
        return $str;
    }
}