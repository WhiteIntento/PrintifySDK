<?php
namespace PureIntento\PrintifySdk\Structures\Order;

use PureIntento\PrintifySdk\Structures\Structure;

/**
 * Този класс описва върната структура на порчъка от printify
 * This class describes an order structure returned by printify
 */
class Order extends Structure{

    protected array $requiredAttributes=[
        "id",
        "address_to" =>[
            "first_name",
            "last_name",
            "region",
            "address1",
            "city",
            "zip",
            "email",
            "phone",
            "country",
            "company"
        ],
        "line_items"=>[
            "product_id",
            "quantity",
            "variant_id",
            "print_provider_id",
            "cost",
            "shipping_cost",
            "status",
            "metadata"=>[
                "title",
                "price",
                "variant_label",
                "sku",
                "country"
            ],
            "sent_to_production_at",
            "fulfilled_at",
        ],
        "metadata"=>[
            "order_type",
            "shop_order_id",
            "shop_order_label",
            "shop_fulfilled_at"
        ],
        "total_price",
        "total_shipping",
        "total_tax",
        "status",
        "shipping_method",
        "shipments"=>[
            "carrier",
            "number",
            "url",
            "delivered_at"
        ],
        "created_at",
        "sent_to_production_at",
        "fulfilled_at"
    ];
}