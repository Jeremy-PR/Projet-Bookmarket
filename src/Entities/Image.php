<?php

final class Image
{
    private int $id;
    private string $imagePath;
    private string $alt;

    public function __construct(int $id, string $imagePath, string $alt)
    {
        $this->id = $id;
        $this->imagePath = $imagePath;
        $this->alt = $alt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}