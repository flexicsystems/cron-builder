<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 2.0.0
 */

namespace Flexic\CronBuilder;

final class Lexer
{
    public static function fromString(string $cron): Cron
    {
        \preg_match(
            '/(([0-9\,\*\/\-]+) ([0-9\,\*\/\-]+) ([0-9\,\*\/\-]+) ([0-9\,\*\/\-]+) ([0-9\,\*\/\-]+))/',
            $cron,
            $matches,
        );

        if (!\is_array($matches) || \count($matches) !== 7) {
            throw new \InvalidArgumentException('Invalid cron expression');
        }

        return new Cron(
            new Expression\Expression($matches[2]),
            new Expression\Expression($matches[3]),
            new Expression\Expression($matches[4]),
            new Expression\Expression($matches[5]),
            new Expression\Expression($matches[6]),
        );
    }
}
