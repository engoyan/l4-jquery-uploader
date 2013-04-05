<?php namespace Dws\JqueryUploader\Controller;

use Request;

class JqueryUploaderController extends \Illuminate\Routing\Controllers\Controller {

    public function index()
    {   
        $manager = \App::make('jquery-uploader');
        $handler = $manager->get('default-uploader');
        $donext_params = $handler->getOption('donext_params');
        return \View::make('jquery-uploader::jquery-uploader.index', array('donext' => $donext, 'donext_params' => $donext_params));

    }
    
    public function run()
    {
        $manager = \App::make('jquery-uploader');
        $handler = $manager->get('default-uploader');
        $handler->initialize();
    }
    
    public function view($version, $filename)
    {
        
        $manager = \App::make('jquery-uploader');
        $handler = $manager->get('default-uploader');
        
        if ($version != 'full') {
            $dir = $handler->getUploadDir($version);    
        } else {
            $dir = $handler->getUploadDir();    
        }
        
        $file = $dir . $filename; 
        $filename = basename($file);
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
        
        switch ($file_extension) {
            case "gif": $ctype="image/gif"; break;
            case "png": $ctype="image/png"; break;
            case "jpeg":
            case "jpg": $ctype="image/jpg"; break;
            default:
        }
        
        header('Content-type:' . $ctype);
        echo file_get_contents($file); 
        
    }

}
