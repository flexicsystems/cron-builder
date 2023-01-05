<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 2.0.0
 */

namespace Flexic\CronBuilder\Expression;

final class Expression implements ExpressionInterface
{
    public function __construct(
        readonly public string $expression,
    ) {
    }

    public function __toString(): string
    {
        return $this->expression;
    }
}
