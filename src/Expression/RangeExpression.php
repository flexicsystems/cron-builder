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

final class RangeExpression implements ExpressionInterface
{
    public function __construct(
        readonly public ExpressionInterface $from,
        readonly public ExpressionInterface $to,
    ) {
    }

    public function __toString(): string
    {
        return \sprintf(
            '%s-%s',
            (string) $this->from,
            (string) $this->to
        );
    }
}
