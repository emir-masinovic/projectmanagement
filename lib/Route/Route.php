<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Route;

use OCA\ProjectManagement\Controller\TestController;
use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IRegistrationContext;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\AppFramework\Routing\IRouter;
use OCP\IURLGenerator;

class Route implements IBootstrap {
	public function register(IRegistrationContext $context): void {
		$context->registerRoute('projectmanagement.test.getCounter', '/test/counter', [
			'controller' => TestController::class,
			'action' => 'getCounter',
		]);

		$context->registerRoute('projectmanagement.test.incrementCounter', '/test/counter/increment', [
			'controller' => TestController::class,
			'action' => 'incrementCounter',
		]);
	}

	public function boot(IBootContext $context): void {}
} 