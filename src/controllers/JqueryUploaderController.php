<?php namespace Dws\JqueryUploader\Controller;

use Request;

class JqueryUploaderController extends \Illuminate\Routing\Controllers\Controller {

    public function index()
    {
        return \View::make('jquery-uploader::jquery-uploader.index');
    }
    
    public function run()
    {
        $manager = \App::make('jquery-uploader');
        $handler = $manager->get('default-uploader');
    }
    
    public function view($version, $filename)
    {
        
        $manager = \App::make('jquery-uploader');
        $handler = $manager->get('default-uploader', false);
        
        switch ($version) {
            case "thumbnail":
                $dir = $handler->getThumbDir();
                break;
            default:
                $dir = $handler->getUploadDir();    
        }
        
        $file = $dir . $filename; 
        $filename = basename($file);
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
        
        switch( $file_extension ) {
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
