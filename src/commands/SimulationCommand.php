<?php
namespace App\Artisan;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Regeneration\Character\Models\Character;

class SimulationCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'character:simulation';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Run game simulation for Regeneration';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		// Create game instance
		$constraints = \Config::get('character::multiplayer.instance.constraints');

		list($min_players, $max_players) = array($constraints['players']['min_players'], $constraints['players']['max_players']);
		$time_limit = $constraints['map']['lifetime'];

		$this->comment("Game initializing of $min_players VS $max_players");
		// TODO: Implement timer
		// $this->timer->start();
		// $this->timer->timeElapsed();

		// Get characters, with relevant locale
		$characters = Character::with([
			'trans' => function($query) { $query->locale()->get(); }
		])->get();

		foreach ($characters as $character)
		{
			$player_id = $character->power_ranking;

			// TODO: Implement inventory
			// $inventory = new Inventory($player_id);
			// $inventory_list = $inventory->toList();
			$inventory_list = implode(json_decode($character->inventory), ', ');

			// TODO: Implement coords
			// $coords = Map::get_player_coords($player_id);
			$coords = array(
				'x' => $character->latitude,
				'y' => $character->longitude
			);

			$this->info("Spawning player $player_id with: ($inventory_list) at: ($coords[x], $coords[y])");
		}
		$this->comment("All players ($max_players/$max_players) have now spawned, the entire map will be destroyed in $time_limit");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
