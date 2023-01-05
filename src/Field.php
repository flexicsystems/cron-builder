<?php

namespace Flexic\CronBuilder;

use Flexic\CronBuilder\Expression\ExpressionInterface;

class Field
{
    private ExpressionInterface $expression;

    public function __construct()
    {
        $this->expression = new Expression\AnyExpression();
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

    public function __toString(): string
    {
        return (string) $this->expression;
    }
}