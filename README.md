# Guard Clauses
A simple package with guard clause. <br>
A [guard clause](https://deviq.com/design-patterns/guard-clause) is a software pattern that simplifies complex functions by "failing fast", checking for invalid inputs up front and immediately failing if any are found.

## Give a Star! ⭐
If you like or are using this project please give it a star. Thanks!

## Usage
```php
function sendEmailToCustomer(Customer $customer): void
{
    $email = GuardAgainst::null($customer->getEmail());

    // ...
}

final class Customer
{
    private string $firstName;
    private string $lastName;
    private int $age;
    private string $login;
    private ?string $email;

    function __construct(
        string $firstName,
        string $lastName,
        int $age,
        string $login,
        ?string $email = null
    )
    {
        $this->firstName = GuardAgainst::emptyOrWhiteSpace($firstName);
        $this->lastName = GuardAgainst::emptyOrWhiteSpace($lastName);
        $this->age = GuardAgainst::negative($age);
        $this->login = GuardAgainst::match($login, "admin", "login", "You can not be an admin");
        $this->email = $email;
    }
}
```

## Supported Guard Clauses
```php
GuardAgainst::null(); // Guard against null values
GuardAgainst::true(); // Guard against true values
GuardAgainst::nullOrTrue(); // Guard against null or true values
GuardAgainst::false(); // Guard against false values
GuardAgainst::nullOrFalse(); // Guard against null or false values
GuardAgainst::negative(); // Guard against numbers less than zero
GuardAgainst::positive(); // Guard against numbers more than zero
GuardAgainst::zero(); // Guard against the number zero
GuardAgainst::negativeOrZero(); // Guard against numbers less than or equal to zero
GuardAgainst::positiveOrZero(); // Guard against numbers more than or equal to zero
GuardAgainst::match(); // Guard against values that loosely match a specified value
GuardAgainst::strictMatch(); // Guard against values that strictly match a specified value
GuardAgainst::range(); // Guard against values that are in the specified range
GuardAgainst::notRange(); // Guard against values that are NOT in the specified range
GuardAgainst::empty(); // Guard against empty values
GuardAgainst::whiteSpace(); // Guard against string that contains only one white space
GuardAgainst::emptyOrWhiteSpace(); // Guard against string that are empty or contains only one white space
GuardAgainst::regex(); // Guard against string that matches the regex pattern
GuardAgainst::count(); // Guard against countable that matches a specific count
GuardAgainst::countOrMore(); // Guard against countable that is MORE or matches a specific count
GuardAgainst::countOrLess(); // Guard against countable that is LESS or matches a specific count
GuardAgainst::arrayHasValue(); // Guard against a value in the array
GuardAgainst::arrayHasNoValue(); // Guard against a value NOT in the array
GuardAgainst::type(); // Guard against the specified type type (gettype)
GuardAgainst::notType(); // Guard against not the specified type (gettype)
GuardAgainst::hasProperty(); // Guard against a property existing on an object
GuardAgainst::hasNoProperty(); // Guard against a property NOT existing on an object
GuardAgainst::expression(); // Guard against the expression returning true
```