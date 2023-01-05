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

trait DayTrait
{
    public function everyDay(): self
    {
        $this->day->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function onDayInterval(int $interval): self
    {
        $this->day->setExpression(new Expression\StepExpression(
            new Expression\AnyExpression(),
            new Expression\ValueExpression($interval),
        ));

        return $this;
    }

    public function onDay(int $day): self
    {
        $this->day->setExpression(new Expression\ValueExpression($day));

        return $this;
    }

    public function onDays(int ...$days): self
    {
        $this->day->setExpression(new Expression\ListExpression(\array_map(static function (int $day) {
            return new Expression\ValueExpression($day);
        }, $days)));

        return $this;
    }

    public function betweenDays(int $from, int $to): self
    {
        $this->day->setExpression(new Expression\RangeExpression(
            new Expression\ValueExpression($from),
            new Expression\ValueExpression($to),
        ));

        return $this;
    }
}
