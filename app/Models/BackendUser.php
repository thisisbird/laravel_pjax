<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class BackendUser extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'backend_users';
    
}
