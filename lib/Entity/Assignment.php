<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Entity;

use OCP\AppFramework\Db\Entity;

class Assignment extends Entity {
	protected int $projectId;
	protected string $userId;
	protected \DateTime $createdAt;

	public function __construct() {
		$this->addType('projectId', 'integer');
		$this->addType('userId', 'string');
		$this->addType('createdAt', 'datetime');
	}

	public function getProjectId(): int {
		return $this->projectId;
	}

	public function setProjectId(int $projectId): void {
		$this->projectId = $projectId;
	}

	public function getUserId(): string {
		return $this->userId;
	}

	public function setUserId(string $userId): void {
		$this->userId = $userId;
	}

	public function getCreatedAt(): \DateTime {
		return $this->createdAt;
	}

	public function setCreatedAt(\DateTime $createdAt): void {
		$this->createdAt = $createdAt;
	}
} 