<?php
namespace Regeneration\Character\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
	protected $table = 'characters';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $fillable = ['power_ranking', 'latitude', 'longitude', 'inventory'];
	protected $guarded = ['id'];

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
	    'power_ranking' => 'int',
	    'latitude' => 'float',
	    'longitude' => 'float',
		'inventory' => 'string'
	];

	protected $softDelete = true;

	public function trans()
	{
		return $this->hasMany('Regeneration\Character\Models\CharacterLang');
	}
}