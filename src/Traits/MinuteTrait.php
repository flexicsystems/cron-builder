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

trait MinuteTrait
{
    public function everyMinute(): self
    {
        $this->minute->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function atMinuteInterval(int $interval): self
    {
        $this->minute->setExpression(new Expression\StepExpression(
            new Expression\AnyExpression(),
            new Expression\ValueExpression($interval),
        ));

        return $this;
    }

    public function atMinute(int $minute): self
    {
        $this->minute->setExpression(new Expression\ValueExpression($minute));

        return $this;
    }

    public function atMinutes(int ...$minutes): self
    {
        $this->minute->setExpression(new Expression\ListExpression(\array_map(static function (int $minute) {
            return new Expression\ValueExpression($minute);
        }, $minutes)));

        return $this;
    }

    public function betweenMinutes(int $from, int $to): self
    {
        $this->minute->setExpression(new Expression\RangeExpression(
            new Expression\ValueExpression($from),
            new Expression\ValueExpression($to),
        ));

        return $this;
    }
}
