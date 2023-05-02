<?php
namespace PureIntento\PrintifySdk\Structures;

class Image extends Structure{
    protected array $requiredAttributes = [
        "id",
        "file_name",
        "height",
        "width",
        "size",
        "mime_type",
        "preview_url",
        "upload_time"
    ];
}