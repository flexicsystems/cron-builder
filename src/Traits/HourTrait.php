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

trait HourTrait
{
    public function everyHour(): self
    {
        $this->hour->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function atHourInterval(int $interval): self
    {
        $this->hour->setExpression(new Expression\StepExpression(
            new Expression\AnyExpression(),
            new Expression\ValueExpression($interval),
        ));

        return $this;
    }

    public function atHour(int $hour): self
    {
        $this->hour->setExpression(new Expression\ValueExpression($hour));

        return $this;
    }

    public function atHours(int ...$hours): self
    {
        $this->hour->setExpression(new Expression\ListExpression(...$hours));

        return $this;
    }

    public function betweenHours(int $from, int $to): self
    {
        $this->hour->setExpression(new Expression\RangeExpression(
            new Expression\ValueExpression($from),
            new Expression\ValueExpression($to),
        ));

        return $this;
    }
}
