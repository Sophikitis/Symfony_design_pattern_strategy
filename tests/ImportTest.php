<?php

namespace App\Tests;

use App\Import\ImportContextInterface;
use App\Import\ImportContextTaggedLocator;
use Generator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ImportTest extends KernelTestCase
{

	/**
	 * @dataProvider providerUri
	 */
	public function testImport(string $uri): void
	{
		self::bootKernel();

		/** @var ImportContextInterface $importContext */
		$importContext = self::getContainer()->get(ImportContextTaggedLocator::class);


		$users = $importContext->execute($uri);

		self::assertCount(2, $users);
//		self::assertInstanceOf(User::class, $users);
	}

	public function providerUri(): Generator
	{
		yield 'csv' => [__DIR__.'/Fixtures/user.csv'];
		yield 'json' => [__DIR__.'/Fixtures/user.json'];
	}
}
