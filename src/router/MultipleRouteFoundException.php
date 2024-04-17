<?php
# src/router/MultipleRouteFoundException.php
declare(strict_types=1);
namespace app\guild\router;
class MultipleRouteFoundException extends  \Exception
{
	public function __construct($message = "More than 1 route has been found")
		{
			parent::__construct($message, 1);
		}
}