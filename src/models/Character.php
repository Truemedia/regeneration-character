<?php
namespace Regeneration\Character\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	protected $table = 'characters';
	public function trans()
	{
		return $this->hasOne('Regeneration\Character\Models\CharacterLang');
	}
}