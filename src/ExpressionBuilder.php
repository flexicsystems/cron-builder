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
    private Field\Minute $minute;

    private Field\Hour $hour;

    private Field\Day $day;

    private Field\Month $month;

    private Field\Weekday $weekday;

    public function __construct()
    {
        $this->minute = new Field\Minute();
        $this->hour = new Field\Hour();
        $this->day = new Field\Day();
        $this->month = new Field\Month();
        $this->weekday = new Field\Weekday();
    }

    public function minute(): Field\Minute
    {
        return $this->minute;
    }

    public function hour(): Field\Hour
    {
        return $this->hour;
    }

    public function day(): Field\Day
    {
        return $this->day;
    }

    public function month(): Field\Month
    {
        return $this->month;
    }

    public function weekday(): Field\Weekday
    {
        return $this->weekday;
    }
}
