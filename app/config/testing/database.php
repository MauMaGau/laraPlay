<?php
    return array(

        'default' => 'sqlite',

        'connections' => array(
            '' => array(
                'driver'   => 'sqlite',
                'database' => ':memory:',
                'prefix'   => ''
            ),
        )
    );