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

final class Cron
{
    public function __construct(
        readonly private Expression\ExpressionInterface $minute,
        readonly private Expression\ExpressionInterface $hour,
        readonly private Expression\ExpressionInterface $day,
        readonly private Expression\ExpressionInterface $month,
        readonly private Expression\ExpressionInterface $dayOfWeek,
    ) {
    }

    public function __toString(): string
    {
        return \sprintf(
            '%s %s %s %s %s',
            (string) $this->minute,
            (string) $this->hour,
            (string) $this->day,
            (string) $this->month,
            (string) $this->dayOfWeek,
        );
    }

    public function getCron(): string
    {
        return $this->__toString();
    }

    public function getMinuteExpression(): Expression\ExpressionInterface
    {
        return $this->minute;
    }

    public function getHourExpression(): Expression\ExpressionInterface
    {
        return $this->hour;
    }

    public function getDayExpression(): Expression\ExpressionInterface
    {
        return $this->day;
    }

    public function getMonthExpression(): Expression\ExpressionInterface
    {
        return $this->month;
    }

    public function getDayOfWeekExpression(): Expression\ExpressionInterface
    {
        return $this->dayOfWeek;
    }
}
