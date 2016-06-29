<?php

	class BlogsComments extends Eloquent
	{
		/**
		 * @var string
		 */

		// table connection
		protected $table = 'blogs_comments';
		public $timestamps = false;
		private static $rules = array(
			'name'    => 'required|min:2',
			'email'   => 'email',
			'comment' => 'required|min:15'
		);

		// validator for the form
		public static function validator($data)
		{
			$vali = Validator::make($data, self::$rules);

			if( !$vali->passes() )
			{
				return $vali->messages();
			}
			else
			{
				return false;
			}
		}
	}