<?php namespace Dws\JqueryUploader\Controller;

class JqueryUploaderController extends \Illuminate\Routing\Controllers\Controller {

    public function index()
    {
        return \View::make('jquery-uploader::jquery-uploader.index');
    }

}
