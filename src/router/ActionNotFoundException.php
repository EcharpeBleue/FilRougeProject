<?php
# src/router/ActionNotFoundException.php
declare(strict_types=1);
namespace app\guild\router;
class ActionNotFoundException extends  \Exception
{
	public function __construct($message = "Controller was not found")
		{
			parent::__construct($message, 1);
		}
}