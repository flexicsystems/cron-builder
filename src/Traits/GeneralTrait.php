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

trait GeneralTrait
{
    public function hourly(): self
    {
        $this->minute->setExpression(new Expression\ValueExpression(0));
        $this->hour->setExpression(new Expression\AnyExpression());
        $this->day->setExpression(new Expression\AnyExpression());
        $this->month->setExpression(new Expression\AnyExpression());
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function daily(): self
    {
        $this->minute->setExpression(new Expression\ValueExpression(0));
        $this->hour->setExpression(new Expression\ValueExpression(0));
        $this->day->setExpression(new Expression\AnyExpression());
        $this->month->setExpression(new Expression\AnyExpression());
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function weekly(): self
    {
        $this->minute->setExpression(new Expression\ValueExpression(0));
        $this->hour->setExpression(new Expression\ValueExpression(0));
        $this->day->setExpression(new Expression\ValueExpression(0));
        $this->month->setExpression(new Expression\AnyExpression());
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function monthly(): self
    {
        $this->minute->setExpression(new Expression\ValueExpression(0));
        $this->hour->setExpression(new Expression\ValueExpression(0));
        $this->day->setExpression(new Expression\ValueExpression(1));
        $this->month->setExpression(new Expression\AnyExpression());
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function quarterly(): self
    {
        $this->minute->setExpression(new Expression\ValueExpression(0));
        $this->hour->setExpression(new Expression\ValueExpression(0));
        $this->day->setExpression(new Expression\ValueExpression(1));
        $this->month->setExpression(new Expression\ListExpression([
            new Expression\ValueExpression(1),
            new Expression\ValueExpression(4),
            new Expression\ValueExpression(7),
            new Expression\ValueExpression(10),
        ]));
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }

    public function yearly(): self
    {
        $this->minute->setExpression(new Expression\ValueExpression(0));
        $this->hour->setExpression(new Expression\ValueExpression(0));
        $this->day->setExpression(new Expression\ValueExpression(1));
        $this->month->setExpression(new Expression\ValueExpression(1));
        $this->dayOfWeek->setExpression(new Expression\AnyExpression());

        return $this;
    }
}
