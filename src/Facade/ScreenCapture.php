<?php

namespace Screen\Capture\Facade;

use Illuminate\Support\Facades\Facade;

class ScreenCapture extends Facade
{
    protected static function getFacadeAccessor() 
    {
        return 'ScreenCapture';
    }
}

