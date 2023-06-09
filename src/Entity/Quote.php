<?php

namespace App\Entity;

use App\Repository\QuoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuoteRepository::class)]
class Quote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $currentPrice = null;

    #[ORM\Column]
    private ?float $change = null;

    #[ORM\Column]
    private ?float $percentChange = null;

    #[ORM\Column]
    private ?float $highPriceOfDay = null;

    #[ORM\Column]
    private ?float $lowPriceOfDay = null;

    #[ORM\Column]
    private ?float $openPriceOfDay = null;

    #[ORM\Column]
    private ?float $previousClosePrice = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateTime = null;

    #[ORM\Column(length: 255)]
    private ?string $shareName = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentPrice(): ?float
    {
        return $this->currentPrice;
    }

    public function setCurrentPrice(float $currentPrice): self
    {
        $this->currentPrice = $currentPrice;

        return $this;
    }

    public function getChange(): ?float
    {
        return $this->change;
    }

    public function setChange(float $change): self
    {
        $this->change = $change;

        return $this;
    }

    public function getPercentChange(): ?float
    {
        return $this->percentChange;
    }

    public function setPercentChange(float $percentChange): self
    {
        $this->percentChange = $percentChange;

        return $this;
    }

    public function getHighPriceOfDay(): ?float
    {
        return $this->highPriceOfDay;
    }

    public function setHighPriceOfDay(float $highPriceOfDay): self
    {
        $this->highPriceOfDay = $highPriceOfDay;

        return $this;
    }

    public function getLowPriceOfDay(): ?float
    {
        return $this->lowPriceOfDay;
    }

    public function setLowPriceOfDay(float $lowPriceOfDay): self
    {
        $this->lowPriceOfDay = $lowPriceOfDay;

        return $this;
    }

    public function getOpenPriceOfDay(): ?float
    {
        return $this->openPriceOfDay;
    }

    public function setOpenPriceOfDay(float $openPriceOfDay): self
    {
        $this->openPriceOfDay = $openPriceOfDay;

        return $this;
    }

    public function getPreviousClosePrice(): ?float
    {
        return $this->previousClosePrice;
    }

    public function setPreviousClosePrice(float $previousClosePrice): self
    {
        $this->previousClosePrice = $previousClosePrice;

        return $this;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $dateTime): self
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    public function getShareName(): ?string
    {
        return $this->shareName;
    }

    public function setShareName(string $shareName): self
    {
        $this->shareName = $shareName;

        return $this;
    }

}
