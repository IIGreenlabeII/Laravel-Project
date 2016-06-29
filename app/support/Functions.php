<?php

	function intl_date($value, $format)
	{
		$newDate = strtolower(date($format, strtotime($value)));

		$translationCategories = Lang::get('dates');
		$oldValues = [];
		$newValues = [];
		if(!empty($translationCategories))
		{
			foreach((array)$translationCategories as $category)
			{
				$oldValues = array_merge($oldValues, array_keys($category));
				$newValues = array_merge($newValues, array_values($category));
			}
		}

		return str_replace($oldValues, $newValues, $newDate);
	}
