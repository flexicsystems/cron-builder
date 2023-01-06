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

final class CronBuilder
{
    use Traits\MinuteTrait;
    use Traits\HourTrait;
    use Traits\DayTrait;
    use Traits\MonthTrait;
    use Traits\DayOfWeekTrait;
    use Traits\GeneralTrait;

    private Field $minute;

    private Field $hour;

    private Field $day;

    private Field $month;

    private Field $dayOfWeek;

    public function __construct(Cron|string|null $cron = null)
    {
        if (!$cron instanceof Cron) {
            $cron = Lexer::fromString($cron ?? '* * * * *');
        }

        $this->minute = new Field($cron->getMinuteExpression());
        $this->hour = new Field($cron->getHourExpression());
        $this->day = new Field($cron->getDayExpression());
        $this->month = new Field($cron->getMonthExpression());
        $this->dayOfWeek = new Field($cron->getDayOfWeekExpression());
    }

    public static function create(): self
    {
        return new self();
    }

    public function build(): Cron
    {
        return new Cron(
            $this->minute->getExpression(),
            $this->hour->getExpression(),
            $this->day->getExpression(),
            $this->month->getExpression(),
            $this->dayOfWeek->getExpression(),
        );
    }
}
