<?php

declare(strict_types=1);

namespace OCA\ProjectManagement\Entity;

use OCP\AppFramework\Db\Entity;

class Project extends Entity {
	protected string $name;
	protected ?string $description;
	protected int $clientId;
	protected \DateTime $startDate;
	protected \DateTime $endDate;
	protected ?int $folderId;
	protected \DateTime $createdAt;
	protected \DateTime $updatedAt;

	public function __construct() {
		$this->addType('name', 'string');
		$this->addType('description', 'string');
		$this->addType('clientId', 'integer');
		$this->addType('startDate', 'datetime');
		$this->addType('endDate', 'datetime');
		$this->addType('folderId', 'integer');
		$this->addType('createdAt', 'datetime');
		$this->addType('updatedAt', 'datetime');
	}

	public function getName(): string {
		return $this->name;
	}

	public function setName(string $name): void {
		$this->name = $name;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description): void {
		$this->description = $description;
	}

	public function getClientId(): int {
		return $this->clientId;
	}

	public function setClientId(int $clientId): void {
		$this->clientId = $clientId;
	}

	public function getStartDate(): \DateTime {
		return $this->startDate;
	}

	public function setStartDate(\DateTime $startDate): void {
		$this->startDate = $startDate;
	}

	public function getEndDate(): \DateTime {
		return $this->endDate;
	}

	public function setEndDate(\DateTime $endDate): void {
		$this->endDate = $endDate;
	}

	public function getFolderId(): ?int {
		return $this->folderId;
	}

	public function setFolderId(?int $folderId): void {
		$this->folderId = $folderId;
	}

	public function getCreatedAt(): \DateTime {
		return $this->createdAt;
	}

	public function setCreatedAt(\DateTime $createdAt): void {
		$this->createdAt = $createdAt;
	}

	public function getUpdatedAt(): \DateTime {
		return $this->updatedAt;
	}

	public function setUpdatedAt(\DateTime $updatedAt): void {
		$this->updatedAt = $updatedAt;
	}
} 