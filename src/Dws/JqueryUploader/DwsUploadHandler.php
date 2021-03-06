<?php
namespace Dws\JqueryUploader;
  
class DwsUploadHandler extends UploadHandler
{
    
    public function getUploadDir($version=false)
    {
        return $version ? $this->options['upload_dir'] . $version . "/" : $this->options['upload_dir'];
    }
    
    protected function get_download_url($file_name, $version = null) {
        if ($version) {
            return  $this->options['thumb_url'] . '/' . rawurlencode($file_name);
        } else {
            return  $this->options['upload_url'] . '/' . rawurlencode($file_name);
        } 
    }
    
    protected function set_file_delete_properties($file) {
        $file->delete_url = $this->options['delete_url']
            .$this->get_query_separator($this->options['delete_url'])
            .'file='.rawurlencode($file->name);
        $file->delete_type = $this->options['delete_type'];
        if ($file->delete_type !== 'DELETE') {
            $file->delete_url .= '&_method=DELETE';
        }
        if ($this->options['access_control_allow_credentials']) {
            $file->delete_with_credentials = true;
        }
    }
    
    public function getOption($name) {
        
        if (!array_key_exists($name,$this->options)) {
            return false;
        }
        
        return $this->options[$name];
    
    }
    
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
    }
    
}
