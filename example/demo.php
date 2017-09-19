<?php
require '../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

print_r(scandir('/tmp'));

touch('/tmp/test.txt');

echo shell_exec('sudo rm -r /tmp/*.txt');


die;
/**
 * Plinker Config
 */
$plinker = [
    'endpoint' => 'http://127.0.0.1/example/server.php',
    'public_key'  => 'makeSomethingUp',
    'private_key' => 'againMakeSomethingUp'
];

// init plinker endpoint client
$demo = new \Plinker\Core\Client(
    // where is the plinker server
    $plinker['endpoint'],

    // component namespace to interface to
    'Test\Demo',

    // keys
    hash('sha256', gmdate('h').$plinker['public_key']),
    hash('sha256', gmdate('h').$plinker['private_key']),

    // construct values which you pass to the component, which the component
    //  will use, for RedbeanPHP component you would send the database connection
    //  dont worry its AES encrypted. see: encryption-proof.txt
    [
        'foo' => 'bar'
    ]
);

// call this()
echo '<pre>'.print_r($demo->this(), true).'</pre>';

// call config()
echo '<pre>'.print_r($demo->config(), true).'</pre>';

// call this() and then locally execute an_array()
echo '<pre>'.print_r($demo->this()->an_array(), true).'</pre>';

// call an_array()
echo '<pre>'.print_r($demo->an_array(), true).'</pre>';

// call an_array()
echo '<pre>'.print_r($demo->closure()('How you doing?'), true).'</pre>';

// call my_time()
echo '<pre>'.print_r($demo->my_time(), true).'</pre>';

// call my_ip()
echo '<pre>'.print_r($demo->my_ip(), true).'</pre>';

// call your_ip()
echo '<pre>'.print_r($demo->your_ip(), true).'</pre>';