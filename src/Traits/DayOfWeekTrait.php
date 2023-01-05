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

use Flexic\CronBuilder\Enums\DayOfWeek;
use Flexic\CronBuilder\Expression;

trait DayOfWeekTrait
{
    public function onSunday(): self
    {
        $this->onDayOfWeek(DayOfWeek::SUNDAY);

        return $this;
    }

    public function onMonday(): self
    {
        $this->onDayOfWeek(DayOfWeek::MONDAY);

        return $this;
    }

    public function onTuesday(): self
    {
        $this->onDayOfWeek(DayOfWeek::TUESDAY);

        return $this;
    }

    public function onWednesday(): self
    {
        $this->onDayOfWeek(DayOfWeek::WEDNESDAY);

        return $this;
    }

    public function onThursday(): self
    {
        $this->onDayOfWeek(DayOfWeek::THURSDAY);

        return $this;
    }

    public function onFriday(): self
    {
        $this->onDayOfWeek(DayOfWeek::FRIDAY);

        return $this;
    }

    public function onSaturday(): self
    {
        $this->onDayOfWeek(DayOfWeek::SATURDAY);

        return $this;
    }

    public function onDayOfWeek(int|DayOfWeek $weekday): self
    {
        $this->dayOfWeek->setExpression(new Expression\ValueExpression(
            $weekday instanceof DayOfWeek ? $weekday->value : $weekday,
        ));

        return $this;
    }

    public function onDaysOfWeek(int|DayOfWeek ...$weekdays): self
    {
        $this->dayOfWeek->setExpression(new Expression\ListExpression(\array_map(static function ($weekday) {
            return $weekday instanceof DayOfWeek ? $weekday->value : $weekday;
        }, $weekdays)));

        return $this;
    }

    public function betweenDaysOfWeek(int|DayOfWeek $from, int|DayOfWeek $to): self
    {
        $this->dayOfWeek->setExpression(
            new Expression\RangeExpression(
                new Expression\ValueExpression($from instanceof DayOfWeek ? $from->value : $from),
                new Expression\ValueExpression($to instanceof DayOfWeek ? $to->value : $to),
            ),
        );

        return $this;
    }

    public function notOnDaysOfWeek(int|DayOfWeek ...$weekdays): self
    {
        $this->dayOfWeek->setExpression(new Expression\ListExpression(\array_filter(\array_map(static function (DayOfWeek $dayOfWeek) use ($weekdays): ?Expression\ValueExpression {
            if (\in_array($dayOfWeek->value, $weekdays, true)) {
                return null;
            }

            return new Expression\ValueExpression($dayOfWeek->value);
        }, DayOfWeek::cases()))));

        return $this;
    }

    public function onWeekend(): self
    {
        $this->dayOfWeek->setExpression(new Expression\ListExpression([
            new Expression\ValueExpression(DayOfWeek::SATURDAY->value),
            new Expression\ValueExpression(DayOfWeek::SUNDAY->value),
        ]));

        return $this;
    }

    public function onWeekdays(): self
    {
        $this->dayOfWeek->setExpression(new Expression\ListExpression([
            new Expression\ValueExpression(DayOfWeek::MONDAY->value),
            new Expression\ValueExpression(DayOfWeek::THURSDAY->value),
            new Expression\ValueExpression(DayOfWeek::WEDNESDAY->value),
            new Expression\ValueExpression(DayOfWeek::THURSDAY->value),
            new Expression\ValueExpression(DayOfWeek::FRIDAY->value),
        ]));

        return $this;
    }

    public function everyWeekday(): self
    {
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function onWeekdayInterval(int $interval): self
    {
        $this->dayOfWeek->setExpression(new Expression\StepExpression(
            new Expression\AnyExpression(),
            new Expression\ValueExpression($interval),
        ));

        return $this;
    }
}
