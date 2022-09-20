<?php declare(strict_types=1);

namespace Zsolt\GuardClauses\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Zsolt\GuardClauses\GuardAgainst;

/**
 * Tests for {@see GuardAgainst::true}
 *
 * @package Zsolt\GuardClauses
 * @author Zsolt Döme
 * @covers \Zsolt\GuardClauses\GuardAgainst::true
 */
class TrueTest extends TestCase
{
    public function testFalse(): void
    {
        $value = false;
        self::assertEquals(GuardAgainst::true($value), $value);
    }

    public function testTrue(): void
    {
        $value = true;

        self::expectException(InvalidArgumentException::class);
        GuardAgainst::true($value);
    }
}