<?php
namespace Regeneration\Character\Models;

use Illuminate\Database\Eloquent\Model;

class CharacterLang extends Model
{
	protected $table = 'characters_lang';
	public function character()
    {
        return $this->belongsTo('Regeneration\Character\Models\Character');
    }
    public function scopeLocale($query)
    {
    	$locale = \Config::get('app.locale');
    	return $query->where( compact('locale') );
    }
}