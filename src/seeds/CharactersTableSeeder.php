<?php

use Illuminate\Database\Seeder;
use Regeneration\Character\Models\Character;
use Regeneration\Character\Models\CharacterLang;

class CharactersTableSeeder extends Seeder
{
    public function run()
    {
    	// Clear table
    	DB::table('characters')->delete();
    	DB::table('characters_lang')->delete();

    	// Sample data
    	$sample_data = [
    		'power_ranking' => 1,
    		'inventory' => '["gun", "knife"]'
    	];

    	// Insert sample record across multiple tables
        $character = Character::create($sample_data);
        $this->command->info('Characters table seeded!');

        $sample_data_en = [
        	'character_id' => $character->id,
        	'firstname' => 'Wade',
        	'lastname' => 'Penistone',
        	'nickname' => 'WAD',
        	'overview' => 'First sample data',
        	'locale' => 'en_GB'
        ];
        $sample_data_jp = [
        	'character_id' => $character->id,
        	'firstname' => 'Wade',
        	'lastname' => 'Penistone',
        	'nickname' => 'WAD',
        	'overview' => 'First sample data',
        	'locale' => 'ja_JP'
        ];

        CharacterLang::create($sample_data_en);
        CharacterLang::create($sample_data_jp);
        $this->command->info('Characters Lang table seeded!');
    }
}
