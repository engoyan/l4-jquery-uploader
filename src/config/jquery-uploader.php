<?php

return array(

    'default-uploader' => array(
        
        'controller' => 'Dws\JqueryUploader\Controller\JqueryUploaderController',
        //base url for the index action 
        'index' =>  'upload',
        'before' => false,
        
        'personalize' => false,
        
        //UploadHandler options
        'options' => array(
        
            /*
            * added options
            */
            //must be a valid route alias
            'donext' => false,
            'donext_params' => [],
            //needs the trailing slash for now
            'upload_dir' => __DIR__ . '/../../../../storage/files/',
            'user_dirs' => false,
            'mkdir_mode' => 0755,
            'param_name' => 'files',
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => array(
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE'
            ),
            'access_control_allow_headers' => array(
                'Content-Type',
                'Content-Range',
                'Content-Disposition'
            ),
            // Enable to provide file downloads via GET requests to the PHP script:
            // allows images to be stored outside of site root
            'download_via_php' => true,
            // Defines which files can be displayed inline when downloaded:
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Defines which files (based on their names) are accepted for upload:
            //'accept_file_types' => '/.+$/i',
            'accept_file_types' => '/\.(gif|jpe?g|png)$/i',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            // The maximum number of files for the upload directory:
            'max_number_of_files' => null,
            // Image resolution restrictions:
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to true to rotate images based on EXIF meta data, if available:
            'orient_image' => false,
            'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images:
                /*
                '' => array(
                    'max_width' => 1920,
                    'max_height' => 1200,
                    'jpeg_quality' => 95
                ),
                */
                // Uncomment the following to create medium sized images:
                'm200' => array(
                    'max_width' => 200,
                    'max_height' => 200,
                    'jpeg_quality' => 80
                ),
                'thumbnail' => array(
                    'max_width' => 80,
                    'max_height' => 80
                )
            ),
        ),
    ),

);
