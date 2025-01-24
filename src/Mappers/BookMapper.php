<?php

class BookMapper implements MapperContract
{
    public static function mapToObject(array $datas): Book
    {
        return new Book(
            $datas['id'],
            $datas['titre'],
            $datas['auteur'],
            $datas['description'],
            $datas['id_genre'],
            $datas['prix'],
            $datas['id_image'],
            $datas['id_vendeur'],
            $datas['id_etat'],
            $datas['id_annonce'],
            
            
        );
    }
}