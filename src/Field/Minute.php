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

use Flexic\CronBuilder\Expression\Expression;
use Flexic\CronBuilder\ExpressionBuilder;

final class Minute extends AbstractField
{
    private Expression $expression;

    public function __construct(ExpressionBuilder $expressionBuilder)
    {
        parent::__construct($expressionBuilder);

        $this->expression = new Expression('*');
    }

    public function __toString(): string
    {
        return '*';
    }

    public function every(int $interval = 1): self
    {
        $this->expression = new Expression(
            1 === $interval ? '*' : \sprintf('*/%s', $interval),
        );

        return $this;
    }
}
