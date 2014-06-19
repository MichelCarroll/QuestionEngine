Introduction
=============

This is a prototype for an awesome survey REST API that may or may not ever be finished, probably left uncompleted for eternity. Who knows.

I developed everything from the ground up, including the dispatcher, fixture loading scripts, routing, as well as the business logic associated with the survey/questions. The only thing I don't take credit for are the classes inside the `Model` namespace, which were generated by Mondator.


Architecture
=============

Here are a few of the major decisions I had to make about the interface and implementation:
- I chose MongoDB because it's schema-less, which is useful when dealing with the various formats that questions/answers can have
- I also chose MongoDB because it can easily be indexed and sharded, therefore scalable 


Installation
==============

1. Run: `git clone https://github.com/MichelCarroll/QuestionEngine`
2. Run: `php composer.phar install` inside project folder
3. Copy `config/app.dist.yml` to `config/app.yml`, and enter your mongo connection details
4. Run `php loadTestData.php` to load data fixtures into the database
5. Add a virtual host to your local web server, and forward all requests to `bootstrap.php`


Services
=========

#####getFirstQuestion(survey_name)
Returns first question inside the survey, or null if the survey is empty.

#####getNextQuestion(question_name)
Returns next question inside the question's survey, or null if it's the last question.

#####getAllQuestion(survey_name)
Returns an array containing all the questions inside the survey.

#####answerQuestion(question_name, value)
Saves the answer for a question. Returns an error if the value format doesn't follow the business rules (see below for Question Types).


Question Types
==============

#### Boolean
True or false question. Expected values: 0, 1

#### Integer
Requiring a number as an answer. Potentially has a "maximum" and/or "minimum" defined.

#### Multiple
Requiring the value to be among the choices in the question.

#### Pie
Requiring a mapping of choice/values, each value being a ratio of the sum of all values. At least one non-zero value is required.

#### Slider
Defined the same way as the `Integer` type. The user interface may choose to display it differently.
