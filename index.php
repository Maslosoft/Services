<?php

const CONFIG_NAME = 'services.json';
const CONFIG_PATH = __DIR__ . '/' . CONFIG_NAME;

if(!is_readable(CONFIG_PATH))
{
    throw new Exception(sprintf('Could not read config file `%s`', CONFIG_PATH));
}

$toCheck = json_decode(file_get_contents(CONFIG_PATH), true);

$active = [];

foreach($toCheck as $name => $doCheck)
{
    if(!$doCheck)
    {
    continue;
    }
    // -q for quiet output
    $cmd = sprintf('systemctl -q is-active %s.service', escapeshellarg($name));
    $return = '3';
    $output = '';
    exec($cmd, $output, $return);
    // Return code 0 means that it is OK, ie service is running
    $active[$name] = !(int)$return;
}

$cmd = 'cat /proc/loadavg';
$load = [];
exec($cmd, $load);
$load = current($load);

$cmd = 'cat /proc/uptime';
$uptime = [];
exec($cmd, $uptime);
$uptime = current($uptime);

$result = new stdClass;

$result->services = $active;
$result->load = $load;
$result->uptime = $uptime;

header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);
echo PHP_EOL;
