<?php declare(strict_types=1);

namespace Zsolt\GuardClauses\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Zsolt\GuardClauses\GuardAgainst;

/**
 * Tests for {@see GuardAgainst::false}
 *
 * @package Zsolt\GuardClauses
 * @author Zsolt Döme
 * @covers \Zsolt\GuardClauses\GuardAgainst::false
 */
class FalseTest extends TestCase
{
    public function testTrue(): void
    {
        $value = true;
        self::assertEquals(GuardAgainst::false($value), $value);
    }

    public function testFalse(): void
    {
        $value = false;

        self::expectException(InvalidArgumentException::class);
        GuardAgainst::false($value);
    }
}