<?php declare(strict_types = 1);

namespace Zsolt\GuardClauses;

use Countable;
use InvalidArgumentException;

/**
 * TODO Description
 *
 * @package Zsolt\GuardClauses
 * @author Zsolt Döme
 */
final class GuardAgainst
{
    /** Constructor */
    private function __construct(){}

    public static function null(mixed $value, ?string $varName = null, ?string $message = null): mixed
    {
        if($value === null)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} was null.");
        }

        return $value;
    }

    public static function true(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        if($value === true)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be true.");
        }

        return $value;
    }

    public static function nullOrTrue(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        self::null($value, $varName, $message);
        self::true($value, $varName, $message);

        return $value;
    }

    public static function false(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        if($value === false)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be false.");
        }

        return $value;
    }

    public static function nullOrFalse(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        self::null($value, $varName, $message);
        self::false($value, $varName, $message);

        return $value;
    }

    public static function negative(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        if($value < 0)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be a negative number.");
        }

        return $value;
    }

    public static function positive(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        if($value > 0)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be a positive number.");
        }

        return $value;
    }

    public static function zero(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        if($value == 0)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be zero.");
        }

        return $value;
    }

    public static function negativeOrZero(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        self::negative($value, $varName, $message);
        self::zero($value, $varName, $message);

        return $value;
    }

    public static function positiveOrZero(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        self::positive($value, $varName, $message);
        self::zero($value, $varName, $message);

        return $value;
    }

    public static function match(mixed $value, mixed $match, ?string $varName = null, ?string $message = null): mixed
    {
        if($value == $match)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be {$match}.");
        }

        return $value;
    }

    public static function strictMatch(mixed $value, mixed $match, ?string $varName = null, ?string $message = null): mixed
    {
        if($value === $match)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be {$match}.");
        }

        return $value;
    }

    public static function range(int|float $value, int|float $from, int|float $to, ?string $varName = null, ?string $message = null): int|float
    {
        if($value >= $from && $value <= $to)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be in range {$from} - {$to}.");
        }

        return $value;
    }

    public static function notRange(int|float $value, int|float $from, int|float $to, ?string $varName = null, ?string $message = null): int|float
    {
        if($value <= $from || $value >= $to)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} is not in range {$from} - {$to}.");
        }

        return $value;
    }

    public static function empty(mixed $value, ?string $varName = null, ?string $message = null): mixed
    {
        if(empty($value))
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be only empty.");
        }

        return $value;
    }

    public static function whiteSpace(string $value, ?string $varName = null, ?string $message = null): string
    {
        if($value === ' ')
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be only whitespace.");
        }

        return $value;
    }

    public static function emptyOrWhiteSpace(string $value, ?string $varName = null, ?string $message = null): string
    {
        self::empty($value, $varName, $message);
        self::whiteSpace($value, $varName, $message);

        return $value;
    }

    public static function regex(string $value, string $regex, ?string $varName = null, ?string $message = null): string
    {
        $matches = [];
        if(preg_match($regex, $value, $matches) === 1)
        {
            $matched = implode(',', $matches);
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be any of the followings: ${$matched}.");
        }

        return $value;
    }

    public static function count(array|Countable $value, int $count, ?string $varName = null, ?string $message = null): array|Countable
    {
        if(count($value) === $count)
        {
            throw new InvalidArgumentException($message ?? "Required inputs {$varName} count cannot be {$count}.");
        }

        return $value;
    }

    public static function countOrMore(array|Countable $value, int $count, ?string $varName = null, ?string $message = null): array|Countable
    {
        if(count($value) >= $count)
        {
            throw new InvalidArgumentException($message ?? "Required inputs {$varName} count cannot be more or equals to {$count}.");
        }

        return $value;
    }

    public static function countOrLess(array|Countable $value, int $count, ?string $varName = null, ?string $message = null): array|Countable
    {
        if(count($value) <= $count)
        {
            throw new InvalidArgumentException($message ?? "Required inputs {$varName} count cannot be less or equals to {$count}.");
        }

        return $value;
    }

    public static function arrayHasValue(array $value, mixed $match, ?string $varName = null, ?string $message = null): array
    {
        if(in_array($match, $value))
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot include {$match}.");
        }

        return $value;
    }

    public static function arrayHasNoValue(array $value, mixed $match, ?string $varName = null, ?string $message = null): array
    {
        if(!in_array($match, $value))
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot include {$match}.");
        }

        return $value;
    }

    public static function type(mixed $value, string $type, ?string $varName = null, ?string $message = null): mixed
    {
        if(gettype($value) === $type)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be of type {$type}.");
        }

        return $value;
    }

    public static function notType(mixed $value, string $type, ?string $varName = null, ?string $message = null): mixed
    {
        if(gettype($value) !== $type)
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} has to be of type {$type}.");
        }

        return $value;
    }

    public static function hasProperty(object $value, string $property, ?string $varName = null, ?string $message = null): object
    {
        if(property_exists($value, $property))
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} has an unwanted property {$property}.");
        }

        return $value;
    }

    public static function hasNoProperty(object $value, string $property, ?string $varName = null, ?string $message = null): object
    {
        if(!property_exists($value, $property))
        {
            throw new InvalidArgumentException($message ?? "Required input {$varName} is missing a property {$property}.");
        }

        return $value;
    }

    public static function expression(callable $expression, string $exception, string $message): void
    {
        if($expression())
        {
            throw new $exception($message);
        }
    }
}