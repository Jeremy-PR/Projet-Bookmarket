<?php

class RoleMapper implements MapperContract
{
    public static function mapToObject(array $datas): Role
    {
        return new Role(
            $datas['id'],
            $datas['role']
        );
    }
}