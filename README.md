## Package for convert English number to Bangla and vice versa.

### Features

- Convert english number to bangla number
- Convert bangla number to english number
- Basic summation, subtraction numerical operation

### Installation

Go to terminal and run this command

```shell
composer require larabangla/lara-bangla-number
```

Wait for few minutes. Composer will automatically install this package for your project.

### Quick Usages

After installation, go to your laravel controller where to use it. And add this

```php
use larabangla\gonit;
```

Now you can use it by creating its object

```php
$data = array('১১','১২',15,'৭.৫৬','১,৫০৫');
$bn = new gonit();
$bangla_total = $bn->sum($data);
```

### Available function

| Function Name        |   Details    |
| -------------------- |  :---------- |
| convertToBN($array)  | Given parameter must be an array, which can contain number, string numeric value in it. [e.g. array(11, 2.256, '5.578', 78, 98, '1,205') Or, array(11, 2.256, 78, 98) Or, array('11', '2.256', '5.578', '1,205')|
| convertToEN($array)   |  Given parameter must be an array, which value must be string numeric. [e.g. array('১১', '১২', '৭.৫৬', '১,৫০৫') ]  |
| sum() |   It accept array as a parameter or you can pass multiple value separated by comma(,). By default it return result in bangla, you can pass last parameter value 'bn' or 'en' for your desire result language. [ **N:B:** you can only pass one array and it can not be multi-dimensional ] |
| sub() |   Same as sum() function |

### Examples

sum() / sub() function and their parameter:

```php

    sum(11, 2.256, '5.578', 78, 98, '1,205','bn');
    Or,
    sum('১১', '১২', 105, '১,৫০৫','en');
    Or,
    sum(11, 2.256, '৭.৫৬', '১,৫০৫');
    Or,
    sum([11, 2.256, '৭.৫৬', '১,৫০৫'],'en');
    Or,
    sum([11, 2.256, 56, 1205]);


```

### Credits

- [Mahmudul Hasan Zahid](https://github.com/mhzahid)

### License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
