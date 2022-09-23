<?php

namespace App\Controller;

use App\Import\ImportContextTaggedLocator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Test extends AbstractController
{
	#[Route('/test', name: 'test')]
	public function index(ImportContextTaggedLocator $importContextTaggedLocator): Response
	{
		$users = $importContextTaggedLocator->execute(__DIR__.'/../../tests/Fixtures/user.csv');

		dd($users);
		return $this->render('test/index.html.twig', [
			'controller_name' => 'TestController',
			'users' => $users,
		]);
	}

}
