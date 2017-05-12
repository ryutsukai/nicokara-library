nicokara-library.php
====
This is a PHP library for finding Nikkara that is posted on Nico Nico Douga.

## Demo
[Nicokara Search Site.](http://www.nicokara.net)

## Install
~~~~
<?php
    require_once 'nicokara-library.php';
    $nicokara = new nicokara();
~~~~

## Search
~~~~
<?php
    $nicokara->set(
        array(
            'q' => 'search keywords',
            'vocal' => 'onvocal',
            'key' => '＋7',
            'page' => '1'
        )
    );
    $nicokara->search();
~~~~

## Licence

[MIT](https://github.com/tcnksm/tool/blob/master/LICENCE)

## Author

[Yuichi Furutani](https://github.com/ryutsukai)


While editing...
