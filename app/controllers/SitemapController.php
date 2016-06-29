<?php

	class SitemapController extends BaseController
	{
		/**
		 * builds a xml with the following urls
		 * @return mixed
		 */
		public function index()
		{
			$uri_prefix = 'http://' . $_SERVER['HTTP_HOST'] . '/';

			$uris[] = array(
				'url' => $uri_prefix.'blog',
				'priority' => 1
			);

			$uris[] = array(
				'url' => $uri_prefix.'blog/ondernemen',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'blog/onderwijzen'
			);

			$uris[] = array(
				'url' => $uri_prefix.'blog/onderzoeken',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'about/about-us',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'about/activiteiten',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'disciplines/onderzoeken',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'disciplines/onderwijzen',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'disciplines/ondernemen',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'ventures/onderzoeken',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'ventures/onderwijzen',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'ventures/ondernemen',
				'priority' => '0.8'
			);

			$uris[] = array(
				'url' => $uri_prefix.'contact',
				'priority' => '0.8'
			);

			return Response::view('sitemap', [ 'uris' => $uris ])->header('Content-Type', 'text/xml, application/xml');
		}
	}