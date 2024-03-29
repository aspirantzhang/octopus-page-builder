<?php

declare(strict_types=1);

namespace aspirantzhang\octopusPageBuilder;

class Builder
{
    public static function page(string $name, string $title = '')
    {
        return (new PageBuilder())->page($name, $title);
    }
    public static function field(string $name, string $title = '')
    {
        return (new FieldBuilder())->field($name, $title);
    }
    public static function button(string $name, string $title = '')
    {
        return (new ButtonBuilder())->button($name, $title);
    }
    public static function element()
    {
        return (new ElementBuilder());
    }
    public static function i18n(string $title)
    {
        return (new I18nBuilder())->i18n($title);
    }
}
