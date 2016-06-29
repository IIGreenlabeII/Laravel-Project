<?php

class BlogsConnect extends Eloquent
{
	/**
	 * @var string
	 */

	// table connection
	protected $table = 'blogs_connect';
	public $timestamps = false;

	// To get the latest posts for each category
	public static function getLatestFromCat($catId)
	{
		return self::where('cat_id','=',$catId)
			->join('blogs_blog','blogs_connect.blog_id','=','blogs_blog.id')
			->where('status','=',1)
			->with('images')
			->orderBy('add_date','DESC')
			->first();
	}

	// Get 10 posts form each category
	public static function get10FromCat($catId)
	{
		return self::where('cat_id', '=', $catId)
			->join('blogs_blog', 'blogs_connect.blog_id', '=', 'blogs_blog.id')
			->where('status', '=', 1)
			->limit(10)
			->with('comments')
			->orderBy('add_date', 'DESC')
			->get();
	}

	// Return the images for each post
	public function images()
	{
		return $this->hasOne('PagesImages','sourceId','blog_id')->where('sourceType','=','blogs')->orderBy('rank','ASC')->limit(1);
	}

	// return the comments for each post
	public function comments()
	{
		return $this->hasMany('BlogsComments','blogs_blog_id','blog_id')->orderBy('date','DESC');
	}
}