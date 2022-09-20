<?php declare(strict_types = 1);

namespace Zsolt\GuardClauses\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Zsolt\GuardClauses\GuardAgainst;

/**
 * Tests for {@see GuardAgainst::null}
 *
 * @package Zsolt\GuardClauses\Tests
 * @author Zsolt Döme
 * @covers \Zsolt\GuardClauses\GuardAgainst::null
 */
class NullTest extends TestCase
{
    public function testString(): void
    {
        $value = "Hello";
        self::assertEquals(GuardAgainst::null($value), $value);
    }

    public function testEmptyString(): void
    {
        $value = "";
        self::assertEquals(GuardAgainst::null($value), $value);
    }

    public function testZero(): void
    {
        $value = 0;
        self::assertEquals(GuardAgainst::null($value), $value);
    }

    public function testFalse(): void
    {
        $value = 0;
        self::assertEquals(GuardAgainst::null($value), $value);
    }

    public function testNull(): void
    {
        $value = null;
        self::expectException(InvalidArgumentException::class);
        GuardAgainst::null($value);
    }
}