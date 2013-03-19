<?php namespace Dws\JqueryUploader;

use Illuminate\Support\Manager;

class UploadHandlerManager {

    /**
     * The application instance.
     *
     * @var Illuminate\Foundation\Application
     */
    protected $app;
    
    /*
    * list of file upload handlers
    */
    protected $handlers = array();

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get a Mongo connection instance.
     *
     * @param  string  $name
     * @return Dws\JqueryUploader\UploadHandler
     */
    public function get($name = null, $initialize=true)
    {
        if (!isset($this->handlers[$name]))
        {
            $this->handlers[$name] = $this->createHandler($name, $initialize);
        }

        return $this->handlers[$name];
    }

    /**
     * Create the given connection by name.
     *
     * @param  string  $name
     * @return MongoDB
     */
    protected function createHandler($name, $initialize)
    {
        $config = $this->getConfig($name);
        $options = $config['options'];
        return new DwsUploadHandler($options, $initialize);
    }

    /**
     * Get the configuration for a connection.
     *
     * @param  string  $name
     * @return array
     */
    protected function getConfig($name)
    {

        $configs = $this->app['config']['jquery-uploader::jquery-uploader'];

        if (!array_key_exists($name, $configs))
        {
            throw new \InvalidArgumentException("Uploader [$name] not configured.");
        }
        
        $config = $configs[$name];
        $config['options']['upload_url'] = $config['index'] . '-view/full';
        $config['options']['thumb_url'] = $config['index'] . '-view/thumbnail';
        $config['options']['delete_url'] = $config['index'] . '-run';

        return $config;                                             
    
    }

}