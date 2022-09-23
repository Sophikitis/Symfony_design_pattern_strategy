<?php
declare(strict_types=1);

namespace App\Entity;

class User
{
	public function __construct(
		public string $firstName,
		public string $lastName,
		public string $email,
	){}
}
