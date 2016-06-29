<?php

	class AboutController extends BaseController
	{
		/**
		 * Show the about info and which pages
		 *
		 * @param null $category
		 *
		 * @return mixed
		 */
		public function index($category = null)
		{
			// empty array of data
			$data = [ ];
			if( !$category )
			{
				// return to blog
				return self::OutputHandler('blog');
			}
			else
			{
				// sends you to the about-us page
				if( $category == 'about-us' )
				{
					$data = [
						'category' => $category,
						// locates the id and sends you to the right page
						'about'    => PagesTemplate1::find(57)
					];
				}
				// sends you to the activiteiten page
				elseif( $category == 'activiteiten' )
				{
					$data = [
						'category' => $category,
						// locates the id and sends you to the right page
						'about'    => PagesTemplate1::find(52)
					];
				}
				// sends you to the 404 page
				else
				{
					App::abort(404);
				}
				// sends you to the about-us page with data
				return self::OutputHandler('aboutUs', $data);
			}
		}
	}