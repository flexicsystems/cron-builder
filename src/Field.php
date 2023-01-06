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

use Flexic\CronBuilder\Expression\ExpressionInterface;

final class Field
{
    private ExpressionInterface $expression;

    public function __construct(ExpressionInterface $expression = null)
    {
        $this->expression = $expression ?? new Expression\AnyExpression();
    }

    public function __toString(): string
    {
        return (string) $this->expression;
    }

    public function setExpression(ExpressionInterface $expression): self
    {
        $this->expression = $expression;

        return $this;
    }

    public function getExpression(): ExpressionInterface
    {
        return $this->expression;
    }
}
