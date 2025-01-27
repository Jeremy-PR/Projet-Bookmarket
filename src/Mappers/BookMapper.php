<?php

class BookMapper implements MapperContract
{
    public static function mapToObject(array $datas): Book
    {
        return new Book(
            $datas['titre'] ?? '', 
            $datas['auteur'] ?? '', 
            $datas['description'] ?? '', 
            $datas['id_genre'] ?? null, 
            $datas['prix'] ?? null, 
            $datas['id_image'] ?? null, 
            $datas['id_vendeur'] ?? null, 
            $datas['id_etat'] ?? null, 
            $datas['id_annonce'] ?? null, 
            $datas['id'] ?? null 
        );
    }
}
