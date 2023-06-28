<?php namespace SouthernIns\LaravelWeasy;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/weasy.php';
        $this->mergeConfigFrom($configPath, 'weasy');
    }

    public function boot()
    {
        $configPath = __DIR__ . '/../config/weasy.php';
        $this->publishes([$configPath => config_path('weasy.php')], 'config');

        if($this->app['config']->get('weasy.pdf.enabled')){
            $this->app->bind('weasy.pdf', function($app)
            {
                $binary = $app['config']->get('weasy.pdf.binary', '/usr/local/bin/wkhtmltopdf');
                $options = $app['config']->get('weasy.pdf.options', array());
                $env = $app['config']->get('weasy.pdf.env', array());
                $timeout = $app['config']->get('weasy.pdf.timeout', false);

                $weasy = new LaravelWeasyPdf($app['files'], $binary, $options, $env);
                if (false !== $timeout) {
                    $weasy->setTimeout($timeout);
                }

                return $weasy;
            });

            $this->app->bind('weasy.pdf.wrapper', function($app)
            {
                return new PdfWrapper($app['weasy.pdf']);
            });
            $this->app->alias('weasy.pdf.wrapper', 'SouthernIns\LaravelWeasy\PdfWrapper');
        }


    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('weasy.pdf', 'weasy.pdf.wrapper', );
    }
}
