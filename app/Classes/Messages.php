<?php namespace App\Classes;

/**
 * Class Messages
 * @author Martin Tonev
 *         
 * @package App\Classes
 */
use Session;

class Messages
{
	static $instance;
	
	public static function make()
	{
		if (self::$instance == NULL)
		{
			self::$instance = new self;
		}
		
		return self::$instance;
	}
		
	
	public static function set($data, $group = FALSE, $return_only = FALSE)
	{
		$errors = array();

		if (is_array($data))
		{
			foreach ($data as $type => $text)
			{
				$errors[] = array(
					'type' => $type,
					'text' => $text
				);
			}

			if ($group)
				Session::flash('group_messages', 'danger');
		}
		elseif (is_object($data) AND get_class($data) == "Illuminate\Validation\Validator")
		{
			$validation_errors = $data->messages();

			foreach ($validation_errors->all() as $text)
			{
				$errors[] = array(
					'type' => 'danger',
					'text' => $text
				);
			}

			if ($group)
				Session::flash('group_messages', 'danger');
		}

		if ($return_only)
			return $errors;

		Session::flash('messages', $errors);
	}


	public static function get()
	{
		if (Session::has('messages'))
		{
			$messages = Session::get('messages');

			if (Session::has('group_messages'))
			{
				$text = '';
				foreach ($messages as $message)
				{
					$text .= ($text == '') ? $message['text'] : '<br />' . $message['text'];
				}

				echo self::get_html(Session::get('group_messages'), $text);
				return;
			}

			foreach ($messages as $message)
			{
				echo self::get_html($message['type'], $message['text']);
			}

		}

	}

	public static function get_html($type, $message)
	{
		if (is_array($message))
			$message = implode('<br />', $message);
		
		
		return "<div class=\"alert alert-" . $type . "\" role=\"alert\">" . $message ."
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
			</div>";
	}

	public static function check()
	{
		return (bool) Session::has('messages');
	}
}

