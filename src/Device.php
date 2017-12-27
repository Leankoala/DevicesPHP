<?php

namespace Leankoala\Devices;

interface Device
{
    public function getViewport();

    public function getUserAgent();

    public function getName();
}