<?php

namespace MSP;


class CommentFile
{
    const imageExtensions = [
        'png', 'jpg', 'jpeg', 'gif', 'bmp', 'svg', 'webp'
    ];

    private
        $name,
        $extension,
        $url,
        $content,
        $type;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->content = $data['content'];
        $this->url = $data['content_url'];
        $this->extension = pathinfo($data['name'])['extension'];
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

    public function content()
    {
        return $this->content;
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