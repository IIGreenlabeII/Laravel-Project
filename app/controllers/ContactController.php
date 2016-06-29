<?php

	class ContactController extends BaseController
	{
		/**
		 * Show the contact info
		 *
		 * @param null $category
		 *
		 * @return mixed
		 */
		public function index($category = null)
		{
			return self::OutputHandler('contact2');
		}
	}