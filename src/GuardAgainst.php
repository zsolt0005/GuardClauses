<?php declare(strict_types=1);

namespace Zsolt\GuardClauses;

use Countable;
use Exception;
use InvalidArgumentException;

/**
 * Set of Guard Clauses
 *
 * @package Zsolt\GuardClauses
 * @author Zsolt Döme
 */
final class GuardAgainst
{
    /** Constructor */
    private function __construct()
    {
    }

    /**
     * Guard against **null** values
     *
     * @param mixed       $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return mixed the value if no errors found
     */
    public static function null(mixed $value, ?string $varName = null, ?string $message = null): mixed
    {
        if ($value === null) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} was null.");
        }

        return $value;
    }

    /**
     * Guard against **true** values
     *
     * @param bool        $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return bool the value if no errors found
     */
    public static function true(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        if ($value === true) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be true.");
        }

        return $value;
    }

    /**
     * Guard against **null or true** values
     *
     * @param bool        $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return bool the value if no errors found
     */
    public static function nullOrTrue(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        self::null($value, $varName, $message);
        self::true($value, $varName, $message);

        return $value;
    }

    /**
     * Guard against false values
     *
     * @param bool        $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return bool the value if no errors found
     */
    public static function false(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        if ($value === false) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be false.");
        }

        return $value;
    }

    /**
     * Guard against **null or false** values
     *
     * @param bool        $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return bool the value if no errors found
     */
    public static function nullOrFalse(bool $value, ?string $varName = null, ?string $message = null): bool
    {
        self::null($value, $varName, $message);
        self::false($value, $varName, $message);

        return $value;
    }

    /**
     * Guard against **numbers less than zero**
     *
     * @param int|float   $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function negative(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        if ($value < 0) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be a negative number.");
        }

        return $value;
    }

    /**
     * Guard against **numbers more than zero**
     *
     * @param int|float   $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function positive(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        if ($value > 0) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be a positive number.");
        }

        return $value;
    }

    /**
     * Guard against **the number zero**
     *
     * @param int|float   $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function zero(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        if ($value == 0) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be zero.");
        }

        return $value;
    }

    /**
     * Guard against **numbers less than or equal to zero**
     *
     * @param int|float   $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function negativeOrZero(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        self::negative($value, $varName, $message);
        self::zero($value, $varName, $message);

        return $value;
    }

    /**
     * Guard against **numbers more than or equal to zero**
     *
     * @param int|float   $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function positiveOrZero(int|float $value, ?string $varName = null, ?string $message = null): int|float
    {
        self::positive($value, $varName, $message);
        self::zero($value, $varName, $message);

        return $value;
    }

    /**
     * Guard against values **that loosely match a specified value**
     *
     * @param mixed       $value The value to guard against
     * @param mixed       $match The value to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return mixed the value if no errors found
     */
    public static function match(mixed $value, mixed $match, ?string $varName = null, ?string $message = null): mixed
    {
        if ($value == $match) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be {$match}.");
        }

        return $value;
    }

    /**
     * Guard against values **that strictly match a specified value**
     *
     * @param mixed       $value The value to guard against
     * @param mixed       $match The value to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return mixed the value if no errors found
     */
    public static function strictMatch(mixed $value, mixed $match, ?string $varName = null, ?string $message = null): mixed
    {
        if ($value === $match) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be {$match}.");
        }

        return $value;
    }

    /**
     * Guard against values **that are in the specified range**
     *
     * @param int|float   $value The value to guard against
     * @param int|float   $from Min value (Inclusive)
     * @param int|float   $to Max value (Inclusive)
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function range(int|float $value, int|float $from, int|float $to, ?string $varName = null, ?string $message = null): int|float
    {
        if ($value >= $from && $value <= $to) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be in range {$from} - {$to}.");
        }

        return $value;
    }

    /**
     * Guard against values **that are NOT in the specified range**
     *
     * @param int|float   $value The value to guard against
     * @param int|float   $from Min value (Inclusive)
     * @param int|float   $to Max value (Inclusive)
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return int|float the value if no errors found
     */
    public static function notRange(int|float $value, int|float $from, int|float $to, ?string $varName = null, ?string $message = null): int|float
    {
        if ($value <= $from || $value >= $to) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} is not in range {$from} - {$to}.");
        }

        return $value;
    }

    /**
     * Guard against **empty** values
     *
     * @param mixed       $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return mixed the value if no errors found
     */
    public static function empty(mixed $value, ?string $varName = null, ?string $message = null): mixed
    {
        if (empty($value)) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be only empty.");
        }

        return $value;
    }

    /**
     * Guard against **string that contains only one white space**
     *
     * @param string      $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return string the value if no errors found
     */
    public static function whiteSpace(string $value, ?string $varName = null, ?string $message = null): string
    {
        if ($value === ' ') {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be only whitespace.");
        }

        return $value;
    }

    /**
     * Guard against **string that are empty or contains only one white space**
     *
     * @param string      $value The value to guard against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return string the value if no errors found
     */
    public static function emptyOrWhiteSpace(string $value, ?string $varName = null, ?string $message = null): string
    {
        self::empty($value, $varName, $message);
        self::whiteSpace($value, $varName, $message);

        return $value;
    }

    /**
     * Guard against **string that matches the regex pattern**
     *
     * @param string      $value The value to guard against
     * @param string      $regex The regex pattern to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return string the value if no errors found
     */
    public static function regex(string $value, string $regex, ?string $varName = null, ?string $message = null): string
    {
        $matches = [];
        if (preg_match($regex, $value, $matches) === 1) {
            $matched = implode(',', $matches);
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be any of the followings: ${$matched}.");
        }

        return $value;
    }

    /**
     * Guard against **countable that matches a specific count**
     *
     * @template T
     *
     * @param array<T>|Countable $value The value to guard against
     * @param int                $count The count to match against
     * @param string|null        $varName Variable name used to print the error message
     * @param string|null        $message Custom error message
     *
     * @return array<T>|Countable the value if no errors found
     */
    public static function count(array|Countable $value, int $count, ?string $varName = null, ?string $message = null): array|Countable
    {
        if (count($value) === $count) {
            throw new InvalidArgumentException($message ?? "Required inputs {$varName} count cannot be {$count}.");
        }

        return $value;
    }

    /**
     * Guard against **countable that is MORE or matches a specific count**
     *
     * @template T
     *
     * @param array<T>|Countable $value The value to guard against
     * @param int                $count The count to match against (Inclusive)
     * @param string|null        $varName Variable name used to print the error message
     * @param string|null        $message Custom error message
     *
     * @return array<T>|Countable the value if no errors found
     */
    public static function countOrMore(array|Countable $value, int $count, ?string $varName = null, ?string $message = null): array|Countable
    {
        if (count($value) >= $count) {
            throw new InvalidArgumentException($message ?? "Required inputs {$varName} count cannot be more or equals to {$count}.");
        }

        return $value;
    }

    /**
     * Guard against **countable that is LESS or matches a specific count**
     *
     * @template T
     *
     * @param array<T>|Countable $value The value to guard against
     * @param int                $count The count to match against (Inclusive)
     * @param string|null        $varName Variable name used to print the error message
     * @param string|null        $message Custom error message
     *
     * @return array<T>|Countable the value if no errors found
     */
    public static function countOrLess(array|Countable $value, int $count, ?string $varName = null, ?string $message = null): array|Countable
    {
        if (count($value) <= $count) {
            throw new InvalidArgumentException($message ?? "Required inputs {$varName} count cannot be less or equals to {$count}.");
        }

        return $value;
    }

    /**
     * Guard against **a value in the array**
     *
     * @template T
     *
     * @param array<T>    $value The value to guard against
     * @param mixed       $match The value to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return array<T> the value if no errors found
     */
    public static function arrayHasValue(array $value, mixed $match, ?string $varName = null, ?string $message = null): array
    {
        if (in_array($match, $value)) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot include {$match}.");
        }

        return $value;
    }

    /**
     * Guard against **a value NOT in the array**
     *
     * @template T
     *
     * @param array<T>    $value The value to guard against
     * @param mixed       $match The value to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return array<T> the value if no errors found
     */
    public static function arrayHasNoValue(array $value, mixed $match, ?string $varName = null, ?string $message = null): array
    {
        if (!in_array($match, $value)) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot include {$match}.");
        }

        return $value;
    }

    /**
     * Guard against **the specified type type (gettype)**
     *
     * @param mixed       $value The value to guard against
     * @param string      $type The type to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return mixed the value if no errors found
     */
    public static function type(mixed $value, string $type, ?string $varName = null, ?string $message = null): mixed
    {
        if (gettype($value) === $type) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} cannot be of type {$type}.");
        }

        return $value;
    }

    /**
     * Guard against **not the specified type (gettype)**
     *
     * @param mixed       $value The value to guard against
     * @param string      $type The type to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return mixed the value if no errors found
     */
    public static function notType(mixed $value, string $type, ?string $varName = null, ?string $message = null): mixed
    {
        if (gettype($value) !== $type) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} has to be of type {$type}.");
        }

        return $value;
    }

    /**
     * Guard against **a property existing on an object**
     *
     * @param object      $value The value to guard against
     * @param string      $property The property to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return object the value if no errors found
     */
    public static function hasProperty(object $value, string $property, ?string $varName = null, ?string $message = null): object
    {
        if (property_exists($value, $property)) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} has an unwanted property {$property}.");
        }

        return $value;
    }

    /**
     * Guard against **a property NOT existing on an object**
     *
     * @param object      $value The value to guard against
     * @param string      $property The property to match against
     * @param string|null $varName Variable name used to print the error message
     * @param string|null $message Custom error message
     *
     * @return object the value if no errors found
     */
    public static function hasNoProperty(object $value, string $property, ?string $varName = null, ?string $message = null): object
    {
        if (!property_exists($value, $property)) {
            throw new InvalidArgumentException($message ?? "Required input {$varName} is missing a property {$property}.");
        }

        return $value;
    }

    /**
     * Guard against **the expression returning true** <br>
     * If the given expression returns true, or a value that can be cast to true, will trigger the exception
     *
     * @param callable                $expression The value to guard against
     * @param class-string<Exception> $exception Exception to throw on error
     * @param string                  $message Error message
     *
     * @return void
     * @throws Exception
     */
    public static function expression(callable $expression, string $exception, string $message): void
    {
        if ($expression()) {
            throw new $exception($message);
        }
    }
}