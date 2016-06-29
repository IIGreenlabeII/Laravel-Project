<?php

	class VenturesConnect extends Eloquent
	{
		/**
		 * @var string
		 */

		// table connection
		protected $table = 'leden_connect';
		public $timestamps = false;

		// Get all posts for each catogory
		public static function getAllFromCat($catId)
		{
			return self::where('cat_id', '=', $catId)
				->join('partners', 'leden_connect.lid_id', '=', 'partners.id')
				->orderBy('id', 'ASC')
				->get();
		}
	}