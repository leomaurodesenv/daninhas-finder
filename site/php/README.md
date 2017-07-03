### Xively PHP

- PHP 5 Chainable API Implementation of Xively Api
- License: Creative Commons Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)
- These files are Not officially supported by Xively (LogMeIn).
- Questions regarding this software should be directed to daniel.boorn@gmail.com.

How to Install
---------------


Install the `xively/xively-php` package

```shell
$ composer require xively/xively-php
```

Example of Usage
---------------

```php

$xi = new \Xively\Api('your api key');

// view api resource triggers
var_dump($xi->paths);

// example - json get feeds
$r = $xi->feeds()->list()->get();
var_dump($r);

// example - xml get feeds
$xml = $xi->xml()->feeds()->list()->get();
var_dump($xml);

// example - csv get feeds
$csv = $xi->csv()->feeds()->list()->get();
var_dump($csv);

// example - with custom exception
try {
    $r = $xi->feeds()->list()->get();
} catch (\Xively\Exception $e) {
    die($e->getMessage());
}

// example - get feeds by criteria
$r = $xi->feeds()->read(array(
    'per_page' => 10,
    'page'     => 5,
    'tag'      => 'temperature',
))->get();
var_dump($r);

// example - same as above with iteration
$r = $xi->feeds()->read(array('per_page' => 10, 'page' => 5, 'tag' => 'temperature',))->get();
echo "<pre>Total Results: {$r->totalResults}\n\n";
foreach ($r->results as $row) {
    print_r($row);
}

// example - feed used in examples below

$r = $xi->feeds()->read(array('per_page' => 1))->get();
$feed = current($r->results);

// example - grab feed data by range
$r = $xi->feeds($feed->id)->range(array(
    'start'     => date('c', strtotime('-10 days')),
    'end'       => date('c', strtotime('-1 hour')),
    'time_unit' => 'hours',
))->get();
var_dump($r);

// example - grab feed's 1st data stream
$datastream = current($feed->datastreams);

// example - pull data from stream by range
$r = $xi->feeds($feed->id)->datastreams($datastream->id)->range(array(
    'start'     => date('c', strtotime('-10 days')),
    'end'       => date('c', strtotime('-1 hour')),
    'time_unit' => 'hours',
))->get();
var_dump($r);

// example - push data to stream
$r = $xi->feeds()->read(array(
    'user' => 'username',
))->get();

//feeds(id)->datastreams(id)->update(body)
$feed = $r->results[1];
$dataStream = $feed->datastreams[0];
$r = $xi->feeds($feed->id)->datastreams($dataStream->id)->update(array(
    'version'     => '1.0.0',
    'datastreams' => array(
        array(
            'id'         => $dataStream->id,
            'datapoints' => array(
                array('at' => date('c'), 'value' => rand(1, 10)),
            ),
        ),
    ),
))->get();


// ... create your own chain ... see paths in json file for complete triggers
```