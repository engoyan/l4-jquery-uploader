<?php namespace Dws\JqueryUploader\Controller;

class JqueryUploaderController extends \Illuminate\Routing\Controllers\Controller {

    public function index()
    {
        die("hellop");
        return \View::make('uploader::index.hello');
    }

}
