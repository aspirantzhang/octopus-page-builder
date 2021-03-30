<?php

declare(strict_types=1);

namespace aspirantzhang\TPAntdBuilder;

/**
 * Ant Design builder
 */
class Builder
{
    public static function page(...$params)
    {
        return (new PageBuilder())->page(...$params);
    }
    public static function field(...$params)
    {
        return (new FieldBuilder())->field(...$params);
    }
    public static function button(...$params)
    {
        return (new ButtonBuilder())->button(...$params);
    }
}
