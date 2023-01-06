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
    ->notOnDaysOfWeek(3, 4)
    ->build();
// * * * * 1,2,5,6,0
```

The builder returns an object of type `Flexic\CronBuilder\Cron`. This object allows to get the complete cron or only parts of it.
It can also be converted to a string.

### Methods

#### Builder

| Method                        | Description                                                      |
|-------------------------------|------------------------------------------------------------------|
| create()                      | Creates a new instance of the builder. (Method is static called) |
| build()                       | Builds the cron expression.                                      |
| everyMinute()                 |                                                                  |
| atMinuteInterval($interval)   |                                                                  |
| atMinute($minute)             |                                                                  |
| atMinutes($minutes)           |                                                                  |
| betweenMinutes($from, $to)    |                                                                  |
| everyHour()                   |                                                                  |
| atHourInterval($interval)     |                                                                  |
| atHour($hour)                 |                                                                  |
| atHours($hours)               |                                                                  |
| notAtHours($hours)            |                                                                  |
| betweenHours($from, $to)      |                                                                  |
| everyDay()                    |                                                                  |
| onDayInterval($interval)      |                                                                  |
| onDay($day)                   |                                                                  |
| onDays($days)                 |                                                                  |
| betweenDays($from, $to)       |                                                                  |
| inJanuary()                   |                                                                  |
| inFebruary()                  |                                                                  |
| inMarch()                     |                                                                  |
| inApril()                     |                                                                  |
| inMay()                       |                                                                  |
| inJune()                      |                                                                  |
| inJuly()                      |                                                                  |
| inAugust()                    |                                                                  |
| inSeptember()                 |                                                                  |
| inOctober()                   |                                                                  |
| inNovember()                  |                                                                  |
| inDecember()                  |                                                                  |
| inMonth($month)               |                                                                  |
| everyMonth()                  |                                                                  |
| onMonthInterval($interval)    |                                                                  |
| onSunday()                    |                                                                  |
| onMonday()                    |                                                                  |
| onTuesday()                   |                                                                  |
| onWednesday()                 |                                                                  |
| onThursday()                  |                                                                  |
| onFriday()                    |                                                                  |
| onSaturday()                  |                                                                  |
| onDayOfWeek($weekday)         |                                                                  |
| onDaysOfWeek($weekdays)       |                                                                  |
| betweenDaysOfWeek($from, $to) |                                                                  |
| notOnDaysOfWeek($weekdays)    |                                                                  |
| onWeekend()                   |                                                                  |
| onWeekdays()                  |                                                                  |
| everyWeekday()                |                                                                  |
| onWeekdayInterval($interval)  |                                                                  |
| hourly()                      |                                                                  |
| hourlyAt($minute)             |                                                                  |
| daily()                       |                                                                  |
| weekly()                      |                                                                  |
| monthly()                     |                                                                  |
| quarterly()                   |                                                                  |
| yearly()                      |                                                                  |

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

#### Lexer

Lexer is used to parse the cron expression into tokens.

| Method       | Description                            | Return Format |
|--------------|----------------------------------------|---------------|
| fromString() | Parses the cron expression into tokens | Cron Object   |