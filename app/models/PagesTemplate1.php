<?php

	class PagesTemplate1 extends Eloquent
	{
		/**
		 * @var string
		 */

		// table connection
		protected $table = 'pages_template1';
		public $timestamps = false;

		// get the about info
		public static function getAboutInfo($aboutInfo)
		{
			return self::where('menu_title', '=', $aboutInfo)
				->get();
		}

		// get seo info
		public static function getSeo($pageId)
		{
			return self::where('id', '=', $pageId)
				->get();
		}
	}