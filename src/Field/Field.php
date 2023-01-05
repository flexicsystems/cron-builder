<?php

declare(strict_types=1);

/**
 * Copyright (c) 2022-2023 Flexic-Systems
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 *
 * @version 2.0.0
 */

namespace Flexic\CronBuilder\Field;

enum Field: int
{
    case MINUTE = 0;

    case HOUR = 1;

    case DAY = 2;

    case MONTH = 3;

    case WEEKDAY = 4;
}
