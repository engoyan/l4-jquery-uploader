<?php
namespace Dws\JqueryUploader;
  
class DwsUploadHandler extends UploadHandler
{
    
    public function getUploadDir()
    {
        return $this->options['upload_dir'];
    }
    
    public function getThumbDir()
    {
        return $this->options['thumb_dir'];
    }
    
    
    protected function get_download_url($file_name, $version = null) {
        return $this->options['thumb_url'] .'/' . rawurlencode($file_name);   
    }
    
    
}
