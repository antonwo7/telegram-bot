<?php


class CommentFile
{
    const imageExtensions = [
        'png', 'jpg', 'jpeg', 'gif', 'bmp', 'svg', 'webp'
    ];

    private
        $name,
        $extension,
        $url,
        $type;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->url = $data['url'];
        $this->extension = $data['data_type'];
        $this->type = $this->getFileType();
    }

    private function getFileType()
    {
        return in_array($this->extension, self::imageExtensions) ? 'photo' : 'document';
    }

    public function isPhoto()
    {
        return $this->type == 'photo';
    }

    public function name()
    {
        return $this->name;
    }

    public function extension()
    {
        return $this->extension;
    }

    public function url()
    {
        return $this->url;
    }
}