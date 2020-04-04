<?php

namespace App\Model\wiki;

use Illuminate\Database\Eloquent\Model;

/**
 * Wiki Document Model
 * Class WikiDocument
 * @package App\Model\wiki
 */
class WikiDocument extends Model
{
    public static $TYPE_FILE = 0;
    public static $TYPE_DIR = 1;

    protected $table = 'wiki_document';
}
