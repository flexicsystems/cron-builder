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

use Flexic\CronBuilder\Field\Minute;

final class ExpressionBuilder
{
    private Minute $minute;

    public function __construct()
    {
        $this->minute = new Minute($this);
    }

    public function minute(): Minute
    {
        return $this->minute;
    }
}
