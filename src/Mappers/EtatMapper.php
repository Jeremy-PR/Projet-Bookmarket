<?php

class EtatMapper implements MapperContract
{
    public static function mapToObject(array $datas): Etat
    {
        return new Etat(
            $datas['id'],
            $datas['intitulé']
        );
    }
}