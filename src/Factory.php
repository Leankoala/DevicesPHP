<?php

class Factory
{
    const DEFAULT_DEVICES_JSON_FILE = __DIR__ . '/../vendor/leankoala/devices/Devices/devices.json';

    private $devices;

    public function __construct($devicesJsonFile = null)
    {
        if (!$devicesJsonFile) {
            $devicesJsonFile = self::DEFAULT_DEVICES_JSON_FILE;
        }
        $this->devices = json_decode(file_get_contents($devicesJsonFile));

        var_dump($this->devices);
    }

    public function create($deviceName)
    {

    }
}