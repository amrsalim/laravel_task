<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class AdminGroup extends Model {
	use HasFactory, UsesUuid;
 
	protected $fillable = [
		'id',
		'name',
	];

	public function roles() {
		return $this->hasMany(AdminGroupRole::class, 'admin_group_id', 'id');
	}
}
