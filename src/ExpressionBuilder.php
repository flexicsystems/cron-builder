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

final class ExpressionBuilder
{
    use Traits\MinuteTrait;
    use Traits\HourTrait;
    use Traits\DayTrait;
    use Traits\MonthTrait;
    use Traits\DayOfWeekTrait;

    private Field $minute;

    private Field $hour;

    private Field $day;

    private Field $month;

    private Field $dayOfWeek;

    public function __construct()
    {
        $this->minute = new Field();
        $this->hour = new Field();
        $this->day = new Field();
        $this->month = new Field();
        $this->dayOfWeek = new Field();
    }

    public function build(): string
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
}
