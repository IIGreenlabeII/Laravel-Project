<?php

	class VenturesController extends BaseController
	{
		/**
		 * Show the ventures info and which pages
		 *
		 * @param null $category
		 *
		 * @return mixed
		 */
		public function index($category = null)
		{
			if( !$category )
			{
				return self::OutputHandler('blog');
			}
			else
			{

				$categories = [ 'ondernemen' => 1, 'onderzoeken' => 3, 'onderwijzen' => 2 ];

				if( !array_key_exists($category, $categories) )
				{
					return App::abort(404);
				}

				$data = [
					'category' => $category,
					'ventures' => VenturesConnect::getAllFromCat($categories[$category])
				];

				return self::OutputHandler('ventures', $data);
			}
		}
	}