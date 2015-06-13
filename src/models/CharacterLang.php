<?php
namespace Regeneration\Character\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterLang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'characters_lang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'nickname', 'overview'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'firstname' => 'string',
        'lastname' => 'string',
        'nickname' => 'string',
        'overview' => 'string'
    ];

	public function character()
    {
        return $this->belongsTo('Regeneration\Character\Models\Character');
    }

    public function scopeLocale($query)
    {
    	$locale = \Session::get('locale');
    	return $query->where( compact('locale') );
    }
}