<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 2.0.0
 */

namespace Flexic\CronExpressionBuilder\Field;

use Cron\CronExpression;

enum Field: int
{
    case MINUTE = CronExpression::MINUTE;

    case HOUR = CronExpression::HOUR;

    case DAY = CronExpression::DAY;

    case MONTH = CronExpression::MONTH;

    case WEEKDAY = CronExpression::WEEKDAY;
}
