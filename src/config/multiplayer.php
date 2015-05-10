<?php

return array(
	'instance' => array(
		'constraints' => array(
			'players' => array(
				'min_players' => 1,
				'max_players' => 1000
			),
			'map' => array(
				'lifetime' => '1 hour'
			)
		)
	)
);