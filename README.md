Installation
==============

1. Run: `git clone https://github.com/MichelCarroll/QuestionEngine`
2. Run: `php composer.phar install` inside project folder
3. Copy `config/app.dist.yml` to `config/app.yml`, and enter your own mongodb connection details
4. Run `php loadTestData.php` to load data fixtures in the database
5. Add a virtual host to your local web server, and forward all requests to `bootstrap.php`

Question Types
---------------

##### Boolean

True or false question. Expected values: 0, 1

##### Integer

Requiring a number as an answer. Potentially has a "maximum" and/or "minimum" defined.

##### Multiple

Requiring the value to be among the choices in the question.

##### Pie

Requiring a mapping of choice/values, each value being a ratio of the sum of all values. At least one non-zero value is required.

##### Slider

Defined the same way as the `Integer` type. The user interface may choose to display it differently.
