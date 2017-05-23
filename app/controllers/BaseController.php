<?php

class BaseController extends Controller {

    public function __construct()
    {
        // Check the csrf-token on POST requests.
        $this->beforeFilter('csrf', array('on' => 'post'));
	}

	protected function updateUser($id)
	{
		$input = Input::all();

		$validator = User::validateUpdate($input);

		if($validator->passes())
		{
			// Fill $id with the values entered by the user
			$id->fill($input);

			return $id;
		}

		return false;
	}
}
