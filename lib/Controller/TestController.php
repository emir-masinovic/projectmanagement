<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Controller;

use OCA\ProjectManagement\Db\TestCounterMapper;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;

class TestController extends Controller {
	private TestCounterMapper $counterMapper;

	public function __construct(
		string $appName,
		IRequest $request,
		TestCounterMapper $counterMapper
	) {
		parent::__construct($appName, $request);
		$this->counterMapper = $counterMapper;
	}

	public function getCounter(): JSONResponse {
		return new JSONResponse([
			'counter' => $this->counterMapper->getCounter()
		]);
	}

	public function incrementCounter(): JSONResponse {
		$newValue = $this->counterMapper->incrementCounter();
		return new JSONResponse([
			'counter' => $newValue
		]);
	}
} 