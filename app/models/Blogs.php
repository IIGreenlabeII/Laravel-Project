<?php

	class Blogs extends Eloquent
	{
		/**
		 * @var string
		 */

		// table connection
		protected $table = 'blogs_blog';
		public $timestamps = false;

		//  Which category to choose
		public function categories()
		{
			return $this->hasMany('BlogsConnect', 'blog_id');
		}
	}