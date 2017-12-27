<?php

namespace Leankoala\Devices;

class DeviceFactory
{
    const DEFAULT_DEVICES_JSON_FILE = __DIR__ . '/../../devices/Devices/devices.json';

    private $devices;

    private $devicesJsonFile;

    public function __construct($devicesJsonFile = null)
    {
        if (!$devicesJsonFile) {
            $this->devicesJsonFile = self::DEFAULT_DEVICES_JSON_FILE;
        }

        if (!file_exists($this->devicesJsonFile)) {
            throw new \RuntimeException('Unable to find device json file.');
        }

        $rawDevices = json_decode(file_get_contents($this->devicesJsonFile), true);

        foreach ($rawDevices as $rawDevice) {
            $this->devices[$rawDevice['identifier']] = $rawDevice;
        }
    }

    public function create($deviceName)
    {
        if (!array_key_exists($deviceName, $this->devices)) {
            throw new  \RuntimeException('Device not found (' . $deviceName . ").\nPlease have a look at " . realpath($this->devicesJsonFile) . ' for a list of valid devices.');
        }

        $deviceArray = $this->devices[$deviceName];
        return SimpleDevice::createFromArray($deviceArray);
    }
}