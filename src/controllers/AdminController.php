<?php
namespace Regeneration\Character\Controllers;
use Regeneration\Character\Models\Character;

	class AdminController extends BaseController
	{
		/**
	     * The layout that should be used for standard HTML responses.
	     */
	    protected $layout = 'character::layouts.crudl';

	    /**
		 * Setup tools that can be used for defining aspects of the layout
		 *
		 * @return void
		 */
		protected function setupLayoutTools()
		{
			$this->setupBreadcrumbs();
		}

	    /**
	     * Setup breadcrumbs
	     */
	    protected function setupBreadcrumbs()
	   	{
	   		$breadcrumbs = [];

			$segments = \Request::segments();
			for ($i = 1; $i <= count($segments); $i++)
			{
				$temp = $segments;

				$url = '/' . implode('/', array_slice($temp, 0, $i));
				$text = ucfirst($segments[$i-1]);

				$breadcrumb = compact('url', 'text');
				$breadcrumbs[] = $breadcrumb;
			}

			$this->layout->breadcrumbs = $breadcrumbs;
	   	}

	    /**
		 * Installation page
		 *
		 * @return Response
		 */
		public function install()
		{
			return 'Got an install page';
		}

		/**
		 * Display a listing of the resource.
		 *
		 * @return Response
		 */
		public function index()
		{
			// TODO: get locale from user preference
			$locale = 'en_GB';
			\Session::set('locale', $locale);

			$characters = Character::with([
				'trans' => function($query) { $query->locale()->get(); }
			])->get();

			$this->setContent( compact('characters') );
		}


		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			// Consolidate data
			$data = array('hello' => 'world');
			$this->setContent($data);
		}


		/**
		 * Store a newly created resource in storage.
		 *
		 * @return Response
		 */
		public function store()
		{
			// Consolidate data
			$data = array('hello' => 'world');
			$this->setContent($data);
		}


		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($id)
		{
			// Consolidate data
			$data = array('hello' => 'world');
			$this->setContent($data);
		}


		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($id)
		{
			// Consolidate data
			$data = array('hello' => 'world');
			$this->setContent($data);
		}


		/**
		 * Update the specified resource in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update($id)
		{
			// Consolidate data
			$data = array('hello' => 'world');
			$this->setContent($data);
		}


		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			// Consolidate data
			$data = array('hello' => 'world');
			$this->setContent($data);
		}
	}