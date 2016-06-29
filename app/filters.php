<?php

	App::missing(function ($exception)
	{
		$baseController = new BaseController();

		return $baseController->OutputHandler('error404');
	});