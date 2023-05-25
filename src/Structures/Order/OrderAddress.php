<?php
namespace PureIntento\PrintifySdk\Structures\Order;

use PureIntento\PrintifySdk\Structures\Structure;

class OrderAddress extends Structure{

    protected array $requiredAttributes=[
        "first_name",
        "last_name",
        "email",
        "phone",
        "country",
        "region",
        "address1",
        "address2",
        "city",
        "zip"
    ];
}