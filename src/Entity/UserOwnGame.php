<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Controller\Api\Review\PostReviewController;
use App\Repository\UserOwnGameRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: UserOwnGameRepository::class)]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/reviews/{id}',
            controller: PostReviewController::class,
            normalizationContext: [
                'groups' => [
                    'userOwnGame:post'
                ],
            ],
            denormalizationContext: [
                'groups' =>
                    'userOwnGame:post',
            ]
        ),
        new Patch(
            normalizationContext: [
                'groups' => [
                    'userOwnGame:post'
                ],
            ],
            denormalizationContext: [
                'groups' =>
                    'userOwnGame:post',
            ]
        )
    ]
)]
class UserOwnGame
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(
        'userOwnGame:post'
    )]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(
        'userOwnGame:post'
    )]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Groups(
        'userOwnGame:post'
    )]
    private ?int $gameTime = null;

    #[ORM\Column(nullable: true)]
    #[Groups(
        'userOwnGame:post'
    )]
    private ?\DateTimeImmutable $lastUsedAt = null;

    #[ORM\Column]
    #[Groups(
        'userOwnGame:post'
    )]
    private ?bool $isInstalled = null;

    #[ORM\ManyToOne(inversedBy: 'ownedByUser')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Game $game = null;

    #[ORM\ManyToOne(inversedBy: 'ownedGames')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getGameTime(): ?int
    {
        return $this->gameTime;
    }

    public function setGameTime(int $gameTime): static
    {
        $this->gameTime = $gameTime;

        return $this;
    }

    public function getLastUsedAt(): ?\DateTimeImmutable
    {
        return $this->lastUsedAt;
    }

    public function setLastUsedAt(?\DateTimeImmutable $lastUsedAt): static
    {
        $this->lastUsedAt = $lastUsedAt;

        return $this;
    }

    public function isInstalled(): ?bool
    {
        return $this->isInstalled;
    }

    public function setIsInstalled(bool $isInstalled): static
    {
        $this->isInstalled = $isInstalled;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
