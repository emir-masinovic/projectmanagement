<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Db;

use OCP\AppFramework\Db\Entity;

class TestCounter extends Entity {
	protected $counter;
	protected $createdAt;

	public function __construct() {
		$this->addType('counter', 'integer');
		$this->addType('createdAt', 'datetime');
	}

	public function getCounter(): int {
		return $this->counter;
	}

	public function setCounter(int $counter): void {
		$this->counter = $counter;
	}

	public function getCreatedAt(): \DateTime {
		return $this->createdAt;
	}

	public function setCreatedAt(\DateTime $createdAt): void {
		$this->createdAt = $createdAt;
	}
} 