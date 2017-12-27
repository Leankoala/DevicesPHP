<?php

namespace Leankoala\Devices;

class SimpleDevice implements Device
{
    /**
     * @var Viewport
     */
    private $viewport;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var string
     */
    private $name;

    /**
     * SimpleDevice constructor.
     *
     * @param Viewport $viewport
     * @param string $userAgent
     * @param string $name
     */
    public function __construct(Viewport $viewport, $userAgent, $name)
    {
        $this->viewport = $viewport;
        $this->userAgent = $userAgent;
        $this->name = $name;
    }

    /**
     * @return Viewport
     */
    public function getViewport()
    {
        return $this->viewport;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function createFromArray($deviceArray)
    {
        $viewport = new Viewport($deviceArray['viewport']['height'], $deviceArray['viewport']['width'], $deviceArray['viewport']['isMobile'], $deviceArray['viewport']['hasTouch'], false, $deviceArray['viewport']['deviceScaleFactor']);
        return new self($viewport, $deviceArray['userAgent'], $deviceArray['name']);
    }
}
