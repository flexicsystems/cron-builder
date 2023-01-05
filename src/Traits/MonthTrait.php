<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 2.0.0
 */

namespace Flexic\CronBuilder\Traits;

use Flexic\CronBuilder\Expression;

trait MonthTrait
{
    public function inJanuary(): self
    {
        $this->inMonth(1);

        return $this;
    }

    public function inFebruary(): self
    {
        $this->inMonth(2);

        return $this;
    }

    public function inMarch(): self
    {
        $this->inMonth(3);

        return $this;
    }

    public function inApril(): self
    {
        $this->inMonth(4);

        return $this;
    }

    public function inMay(): self
    {
        $this->inMonth(5);

        return $this;
    }

    public function inJune(): self
    {
        $this->inMonth(6);

        return $this;
    }

    public function inJuly(): self
    {
        $this->inMonth(7);

        return $this;
    }

    public function inAugust(): self
    {
        $this->inMonth(8);

        return $this;
    }

    public function inSeptember(): self
    {
        $this->inMonth(9);

        return $this;
    }

    public function inOctober(): self
    {
        $this->inMonth(10);

        return $this;
    }

    public function inNovember(): self
    {
        $this->inMonth(11);

        return $this;
    }

    public function inDecember(): self
    {
        $this->inMonth(12);

        return $this;
    }

    public function inMonth(int $month): self
    {
        $this->month->setExpression(new Expression\ValueExpression($month));

        return $this;
    }

    public function everyMonth(): self
    {
        $this->month->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function onMonthInterval(int $interval): self
    {
        $this->month->setExpression(new Expression\StepExpression(
            new Expression\AnyExpression(),
            new Expression\ValueExpression($interval),
        ));

        return $this;
    }
}
