<?php

namespace hahaha;

use hahaha\config\application as config_application;
use Illuminate\Support\Facades\Config;

/*

use hahaha\function_base as function_base;
use hahaha\function_base as hahaha_function_base;

*/


class function_base
{
    use \hahaha\instance;

	/*

	*/
	public function Initial()
	{
		return $this;
    }

	/*

	*/
	public function Css($css)
	{
		return "<link rel=\"stylesheet\" href=\"{$css}\" type=\"text/css\" >";
    }

	/*

	*/
	public function Js($js)
	{
		return "<script type=\"text/javascript\" src=\"{$js}\" ></script>";
    }

	/*

	*/
	public function Url_Asset($asset)
	{

		if(Config::get('app.debug'))
		{
			return "/asset" . "/" . $asset . "?t=" . Config::get('app.time');
		}
		else
		{
			return "/asset" . "/" . $asset . "?v=" . Config::get('app.version');
		}
	}

	/*

	*/
	public function Url_Image($image)
	{

		if(Config::get('app.debug'))
		{
			return "/image" . "/" . $image . "?t=" . Config::get('app.time');
		}
		else
		{
			return "/image" . "/" . $image . "?v=" . Config::get('app.version');
		}
	}

	/*

	*/
	public function Url_File($file)
	{

		if(Config::get('app.debug'))
		{
			return "/file" . "/" . $file . "?t=" . Config::get('app.time');
		}
		else
		{
			return "/file" . "/" . $file . "?v=" . Config::get('app.version');
		}
	}

	/*

	*/
	public function Url_Js($js)
	{

		if(Config::get('app.debug'))
		{
			return "/asset/js" . "/" . $js . "?t=" . Config::get('app.time');
		}
		else
		{
			return "/asset/js" . "/" . $js . "?v=" . Config::get('app.version');
		}
	}

	/*

	*/
	public function Url_Css($css)
	{

		if(Config::get('app.debug'))
		{
			return "/asset/css" . "/" . $css . "?t=" . Config::get('app.time');
		}
		else
		{
			return "/asset/css" . "/" . $css . "?v=" . Config::get('app.version');
		}
	}

	/*

	*/
	public function Url_Plugin($plugin)
	{

		if(Config::get('app.debug'))
		{
			return "/asset/plugin" . "/" . $plugin . "?t=" . Config::get('app.time');
		}
		else
		{
			return "/asset/plugin" . "/" . $plugin . "?v=" . Config::get('app.version');
		}
	}
}
