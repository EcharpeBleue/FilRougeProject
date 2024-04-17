<?php
# src/router/ControllerNotFoundException.php
declare(strict_types=1);
namespace app\guild\router;
class ControllerNotFoundException extends  \Exception
{
	public function __construct($message = "Action was not found")
		{
			parent::__construct($message, 1);
		}
}