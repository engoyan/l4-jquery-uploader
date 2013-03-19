<?php

return array(

    'default-uploader' => array(
        'controller' => 'Dws\JqueryUploader\Controller\JqueryUploaderController',
        'index' =>  'upload',
        'options' => array(
            //needs the trailing slash for now
            'upload_dir' => __DIR__ . '/../../../../storage/files/',
            'download_via_php' => true,
        ),
    ),

);