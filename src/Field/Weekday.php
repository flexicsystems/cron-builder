<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 2.0.0
 */

namespace Flexic\CronBuilder\Field;

use Flexic\CronBuilder\Expression;

final class Weekday
{
    private Expression\ExpressionInterface $expression;

    public function __construct()
    {
        $this->expression = new Expression\AnyExpression();
    }

    public function __toString(): string
    {
        return (string) $this->expression;
    }

    public function every(int $interval = 1): self
    {
        $this->expression = 1 === $interval
            ? new Expression\AnyExpression()
            : new Expression\StepExpression(
                new Expression\AnyExpression(),
                new Expression\ValueExpression($interval),
            );

        return $this;
    }
}
