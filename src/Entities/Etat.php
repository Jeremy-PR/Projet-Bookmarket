<?php

final class Etat
{
    private int $id;
    private string $intitulé;

    public function __construct(int $id, string $intitulé)
    {
        $this->id = $id;
        $this->intitulé = $intitulé;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getIntitulé(): string
    {
        return $this->intitulé;
    }
}