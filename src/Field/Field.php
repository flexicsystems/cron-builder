<?php

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
