<?php

namespace Leankoala\Devices;

class DeviceFactory
{
    const DEFAULT_DEVICES_JSON_FILE = __DIR__ . '/../../devices/Devices/devices.json';

    private $devices;

    public function __construct($devicesJsonFile = null)
    {
        if (!$devicesJsonFile) {
            $devicesJsonFile = self::DEFAULT_DEVICES_JSON_FILE;
        }

        if (!file_exists($devicesJsonFile)) {
            throw new \RuntimeException('Unable to find device json file.');
        }

        $rawDevices = json_decode(file_get_contents($devicesJsonFile), true);

        foreach ($rawDevices as $rawDevice) {
            $this->devices[$rawDevice['identifier']] = $rawDevice;
        }
    }

    public function create($deviceName)
    {
        if (!array_key_exists($deviceName, $this->devices)) {
            throw new  \RuntimeException('Device not found (' . $deviceName . ')');
        }

        $deviceArray = $this->devices[$deviceName];
        return SimpleDevice::createFromArray($deviceArray);
    }
}