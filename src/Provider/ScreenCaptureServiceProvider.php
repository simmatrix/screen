<?php

namespace Screen\Provider;

use Illuminate\Support\ServiceProvider;
use Simmatrix\MassMailer\Commands\MassMailerAttributeGenerator;
use Simmatrix\MassMailer\Commands\MassMailerPresenterGenerator;

class ScreenCaptureServiceProvider extends ServiceProvider
{
    /**
     * Whether to defer loading the provider or not
     *
     * @var bool $defer
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this -> publishes([
            __DIR__ . '/../Config/screen_capture.php' => config_path('screen_capture.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this -> mergeConfigFrom( __DIR__ . '/../Config/screen_capture.php', 'screen_capture' );

        // Bind the facade to the appropriate proxy class
        $this -> app -> bind( 'ScreenCapture', function(){
            $screenCapture = new \Screen\Capture();
            $screenCapture -> binPath = config('screen_capture.bin_location');
            $screenCapture -> jobs -> setLocation( config('screen_capture.jobs_location') );
            $screenCapture -> output -> setLocation( config('screen_capture.output_location') );
            return $screenCapture;
        });

        // Automatically add the facade alias for MassMailer
        $this -> app -> booting(function () {            
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('ScreenCapture', \Screen\Facade\ScreenCapture::class);
        });
    }

    public function provides()
    {
        return [ 'screen_capture' ];
    }
}
