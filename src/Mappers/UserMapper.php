<?php

class UserMapper implements MapperContract
{
    public static function mapToObject(array $datas): User
    {
        return new User(
            $datas['role'],
            $datas['nom'],
            $datas['prenom'],
            $datas['adresse'],
            $datas['ville'],
            $datas['email'],
            $datas['password'],
            $datas['telephone'],
            $datas['id'],
            $datas['nom_entreprise'],
            $datas['adresse_entreprise'],
            
        );
    }
}