🌗 Cron Builder
----------------

This package provides a builder for cron expressions.

### Installation

```bash
composer require flexic/cron-builder
```

### Usage

```php
use Flexic\CronBuilder\CronBuilder;

$cron = CronBuilder::create()
    ->everyMinute()
    ->build();
// * * * * *

$cron = CronBuilder::create()
    ->atMinuteInterval(5)
    ->build();
// */5 * * * *

$cron = CronBuilder::create()
    ->atMinute(5)
    ->build();
    
    
$cron = CronBuilder::create()
    ->notOnDaysOfWeek(3, 4)
    ->build();
// * * * * 1,2,5,6,0
```

The builder returns an object of type `Flexic\CronBuilder\Cron`. This object allows to get the complete cron or only parts of it.
It can also be converted to a string.

### Methods

#### Builder

TBD

#### Cron

| Method                    | Description                          | Return Format     |
|---------------------------|--------------------------------------|-------------------|
| getCron()                 | Returns the complete cron expression | string            |
| getMinuteExpression()     | Returns the minute expression        | Expression Object |
| getHourExpression()       | Returns the hour expression          | Expression Object |
| getDayOfMonthExpression() | Returns the day of month expression  | Expression Object |
| getMonthExpression()      | Returns the month expression         | Expression Object |
| getDayOfWeekExpression()  | Returns the day of week expression   | Expression Object |
| __toString()              | Returns the complete cron expression | string            |