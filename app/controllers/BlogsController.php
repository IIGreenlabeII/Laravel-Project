<?php

	class BlogsController extends BaseController
	{
		/**
		 * show the blogs info and which pages
		 *
		 * @param null $category
		 *
		 * @return mixed
		 */
		public function index($category = null)
		{
			if( !$category )
			{
				// connects the right data ot the right category
				$data = [
					'ondernemen'  => BlogsConnect::getLatestFromCat(1),
					'onderzoeken' => BlogsConnect::getLatestFromCat(3),
					'onderwijzen' => BlogsConnect::getLatestFromCat(2)
				];
				// returns the right info
				return self::OutputHandler('blog', $data);
			}
			else
			{
				$categories   = [ 'ondernemen' => 1, 'onderzoeken' => 3, 'onderwijzen' => 2 ];
				$categoryPage = [ 'ondernemen' => 55, 'onderzoeken' => 59, 'onderwijzen' => 60 ];

				// throws a error when the category is invalid
				if( !array_key_exists($category, $categories) )
				{
					App::abort(404);
				}

				// show last 10 posts of each category
				$blogsQuery = BlogsConnect::get10FromCat($categories[$category])->toArray();
				$blogs      = array();
				foreach( $blogsQuery as $blog )
				{
					$blog['title']   = utf8_decode($blog['title']);
					$blog['content'] = self::reformatContent($blog['content']);
					$blog['image']   = PagesImages::where('sourceType', '=', 'blogs')
						->where('sourceId', '=', $blog['id'])
						->orderBy('rank', 'ASC')
						->first([ 'img' ]);

					if( !empty( $blog['image'] ) )
					{
						$blog['image'] = $blog['image']->toArray();
					}

					$blogs[] = $blog;
				}

				$data = [
					'category' => $category,
					'blogs'    => $blogs,
					'data'     => PagesTemplate1::find($categoryPage[$category])
				];

				// returns details to the right detailspage
				return self::OutputHandler('blogDetails', $data);
			}
		}

		// save the reactions in a database
		public function store()
		{
			Input::merge(array( 'comment' => Input::get('reaction') ));

			// checks for invalid fields and errors
			if( $errors = BlogsComments::validator(Input::all()) )
			{
				return 'false';
			}
			else
			{
				$blogComment                = new BlogsComments();
				$blogComment->name          = Input::get('name');
				$blogComment->email         = Input::get('email');
				$blogComment->comment       = Input::get('reaction');
				$blogComment->date          = date("Y-m-d H:i:s");
				$blogComment->blogs_blog_id = Input::get('blog_id');
				$blogComment->ip            = $_SERVER['REMOTE_ADDR'];
				$blogComment->save();

				return 'true';
			}

		}
	}