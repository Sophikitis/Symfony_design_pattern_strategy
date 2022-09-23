<?php

declare(strict_types=1);
namespace App\Import;

use App\Entity\User;
use Symfony\Component\DependencyInjection\ServiceLocator;


class ImportContextTaggedLocator implements ImportContextInterface
{
	public function __construct(private readonly ServiceLocator $serviceLocator)
	{

	}

	/**
	 * @inheritdoc
	 */
	public function execute(string $uri): array
	{
		foreach ($this->serviceLocator->getProvidedServices() as $service) {
			if ($service::supports($uri)) {
				return $this->serviceLocator->get($service)->import($uri);
			}
		}

		throw new \RuntimeException('No importer found for ' . $uri);
	}
}

