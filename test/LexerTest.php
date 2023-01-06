<?php

namespace Flexic\CronBuilder\Test;

/**
 * @internal
 *
 * @covers \Flexic\CronBuilder\Lexer
 */
class LexerTest extends AbstractTestCase
{
    /** @dataProvider cronProvider */
    public function testFromString(string $cron, string $minute, string $hour, string $day, string $month, string $dayOfWeek): void
    {
        $cronExpression = \Flexic\CronBuilder\Lexer::fromString($cron);

        self::assertInstanceOf(\Flexic\CronBuilder\Cron::class, $cronExpression);

        self::assertSame($cron, (string) $cronExpression->getCron());
        self::assertSame($minute, (string) $cronExpression->getMinuteExpression());
        self::assertSame($hour, (string) $cronExpression->getHourExpression());
        self::assertSame($day, (string) $cronExpression->getDayExpression());
        self::assertSame($month, (string) $cronExpression->getMonthExpression());
        self::assertSame($dayOfWeek, (string) $cronExpression->getDayOfWeekExpression());
    }

    public function cronProvider(): array
    {
        $elements = [
            'minute' => \range(0, 59),
            'hour' => \range(0, 23),
            'day' => \range(1, 31),
            'month' => \range(1, 12),
            'dayOfWeek' => \range(0, 6),
        ];

        $modifier = [
            'all' => function () {
                return '*';
            },
            'range' => function (int $min, $list) {
                return $min . '-' . \random_int($min, $min + 10);
            },
            'step' => function (int $min) {
                return $min . '/' . \random_int(1, 10);
            },
            'list' => function (int $min) {
                return $min . ',' . \random_int($min, $min + 10);
            },
            'list-multiple' => function (int $min) {
                return $min . ',' . \random_int($min, $min + 10) . ',' . \random_int($min, $min + 10);
            },
        ];

        return \array_map(function (int $iteration) use ($elements, $modifier): array {

            $tokens = [
                'minute' => [(string) \array_rand($elements['minute'], 1), $elements['minute']],
                'hour' => [(string) \array_rand($elements['hour'], 1), $elements['hour']],
                'day' => [(string) \array_rand($elements['day'], 1), $elements['day']],
                'month' => [(string) \array_rand($elements['month'], 1), $elements['month']],
                'dayOfWeek' => [(string) \array_rand($elements['dayOfWeek'], 1), $elements['dayOfWeek']],
            ];

            foreach ($tokens as $key => $token) {
                $tokens[$key] = $modifier[\array_rand($modifier, 1)]($token[0], $token[1]);
            }

            return [
                \sprintf('%s %s %s %s %s', $tokens['minute'][0], $tokens['hour'][0], $tokens['day'][0], $tokens['month'][0], $tokens['dayOfWeek'][0]),
                $tokens['minute'][0],
                $tokens['hour'][0],
                $tokens['day'][0],
                $tokens['month'][0],
                $tokens['dayOfWeek'][0],
            ];
        }, range(0, 100));
    }
}