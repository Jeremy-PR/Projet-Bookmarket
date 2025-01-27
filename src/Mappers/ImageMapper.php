<?php

class ImageMapper implements MapperContract
{
    public static function mapToObject(array $datas): Image
    {
        return new Image(
            $datas['id'],
            $datas['image_path'],
            $datas['alt']
        );
    }
}