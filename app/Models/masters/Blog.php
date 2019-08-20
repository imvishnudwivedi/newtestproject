<?php

namespace App\Models\masters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model {
	use SoftDeletes;
	protected $table = 'blog';

	protected $dates = ['deleted_at'];

	protected $fillable = [
		'id', 'name', 'language_id', 'dob','doj','phone_number', 'created_by', 'updated_by',
	];
}
