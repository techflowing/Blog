<?php
return [
    // 根目录名称
    'name' => env('MEDIA_STORE', 'media-store'),
    // HTTP 访问地址
    'img' => env('APP_URL') . '/' . env('MEDIA_STORE', 'media-store') . '/images/',
    'file' => env('APP_URL') . '/' . env('MEDIA_STORE', 'media-store') . '/files/',
];
