<?php

class GenreMapper implements MapperContract
{
    public static function mapToObject(array $datas): Genre
    {
        return new Genre(
            $datas['id'],
            $datas['nom']
        );
    }
}