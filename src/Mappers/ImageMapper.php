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
    public static function mapToArray(Image $Image): array
    {
        return [
            'image_path' => $Image->getImagePath(),
            'alt' => $Image->getAlt(),
           
        ];
    }
}