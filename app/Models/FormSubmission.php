<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Medialibrary\HasMedia\HasMedia;
use Spatie\Medialibrary\HasMedia\HasMediaTrait;

class FormSubmission extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];
}
