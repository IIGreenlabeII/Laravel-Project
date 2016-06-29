<?php
	class BaseController extends Controller
	{
		/**
		 * output handler with template and data
		 *
		 * @param string $template
		 * @param array $data
		 *
		 * @return mixed
		 */
		public function OutputHandler($template = '', $data = [ ])
		{
			// empty pageTitle and seo
			$pageTitle = '';
			$seo       = '';
			//checks if each segment is equally to the required name
			if( Request::segment(1) == 'blog' )
			{
				if( Request::segment(2) == 'ondernemen' )
				{
					$pageTitle = 'Ondernemen';
					$seo       = 55;
				}
				elseif( Request::segment(2) == 'onderwijzen' )
				{
					$pageTitle = 'Onderwijzen';
					$seo       = 60;
				}
				elseif( Request::segment(2) == 'onderzoeken' )
				{
					$pageTitle = 'Onderzoeken';
					$seo       = 59;
				}
			}
			elseif( Request::segment(1) == 'about' && Request::segment(2) == 'about-us' )
			{
				$pageTitle = 'Viagroep';
				$seo       = 57;
			}
			elseif( Request::segment(1) == 'about' && Request::segment(2) == 'activiteiten' )
			{
				$pageTitle = 'Viagroep';
				$seo       = 52;
			}
			elseif( Request::segment(1) == 'ventures' )
			{
				$pageTitle = 'Ventures';
				$seo       = 64;
			}
			elseif( Request::segment(1) == 'disciplines' )
			{
				$pageTitle = 'Disciplines';
				$seo       = 56;
			}
			elseif( Request::segment(1) == 'contact' )
			{
				$pageTitle = 'Contact';
				$seo       = 53;
			}

			$headerData = [ 'segments'  => Request::segments(),
							'pageTitle' => $pageTitle,
							'data'      => PagesTemplate1::find($seo)
			];

			$data['imgUrl'] = 'http://www.viagroep.nl/userfiles';

			// makes a template to send to the controller
			echo View::make('_header', $headerData);
			echo View::make($template, $data);
			if( $template == 'error404' )
			{
				return Response::view('_footer', [ ], 404);
			}

			return View::make('_footer');
		}

		// refactor code for the video's
		public function reformatContent($content)
		{
			// Strip all content images
			$content = str_replace("<img", "<span", $content);
			$content = str_replace("<div", "<span", $content);
			$content = str_replace("</div", "</span", $content);
			// Iframe reset
			$contentParts = explode('<iframe', $content);
			$content      = '';
			foreach( $contentParts as $contentPart )
			{
				if( $content != '' )
				{
					$contentSubparts = explode('</iframe>', $contentPart);

					$iframeSource = explode('src="', $contentSubparts[0]);
					$iframeSource = explode('"', $iframeSource[1]);

					#$content .= '<iframe width="100%" height="200" src="'.$iframeSource[0].'"></iframe>';

					// New method: show youtube image with link
					$youtubeId = explode("embed/", $iframeSource[0]);
					$youtubeId = explode("?", $youtubeId[1]);
					$youtubeId = $youtubeId[0];
					#$youtubeLink = 'http://img.youtube.com/vi/'.$youtubeId.'/maxresdefault.jpg'; (not always available)
					$youtubeLink = 'http://img.youtube.com/vi/' . $youtubeId . '/0.jpg';

					$content .= '<div class="youtubeWrapper"><a target="_blank" href="https://www.youtube.com/watch?v=' . $youtubeId . '"><img class="youtube" src="' . $youtubeLink . '" alt="" width="100%" /><img class="playButton" src="/images/youtube-btn.svg" alt="" width="100%" /></a></div>';

					$content .= $contentSubparts[1];
				}
				else
				{
					$content .= $contentPart;
				}
			}

			// Return new content
			return $content;
		}

	}
