<?php

	class DisciplinesController extends BaseController
	{
		/**
		 * Show the disciplines info and which pages
		 *
		 * @param null $category
		 *
		 * @return mixed
		 */
		public function index($category = null)
		{
			if( !$category ) {
				return self::OutputHandler('blog');
			} else {
				$categoryPage = [ 'ondernemen' => 55, 'onderzoeken' => 59, 'onderwijzen' => 60 ];

				if( !array_key_exists($category, $categoryPage) ) {
					return App::abort(404);
				}

				$data = array(
					'category' => $category,
					'data' => PagesTemplate1::find($categoryPage[$category])
				);
				return self::OutputHandler('disciplines', $data);
			}
		}
	}