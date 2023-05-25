```php
use PureIntento\PrintifySdk\PrintifyClient;
use PureIntento\PrintifySdk\Catalog;
use PureIntento\PrintifySdk\Shop;

/**
 * Init printifyclient with argument auth token
 */
$authToken="YOU_AUTH_TOKEN_HERE";
$request=new PrintifyClient($authToken);

/**
 * Създава инстанция на Catalog с аргумент PrintifyClient
 * Каталога се използва за извличане на данни в каталога на Printify
 * Create instance on Catalog with argument PrintifyClient instance
 * The catalog is used to retrieve data in the Printify catalog
 */
$catalog=new Catalog($request);
/**
 * Създаване на инстанция на Shop с аргумент PrintifyClient инстнация
 * Shop се използва за извличане на данни за магазините в Printify
 * 
 * Create an instance of Shop with argument PrintifyClient instance
 * Shop is used to retrieve data about stores in Printify
 */
$shop=new Shop($request);


$blueprintId=3;
print_r($catalog->blueprint($blueprintId));
print_r($catalog->blueprints());

$printProviderId=43;
print_r($catalog->blueprintProviderVariants($blueprintId,$printProviderId));
print_r($catalog->blueprintProviderShipping($blueprintId,$printProviderId));
print_r($catalog->printProviders());
print_r($catalog->printProvider($printProviderId));


print_r($shop->shops());

$shopId=2;
print_r($shop->deleteShop($shopId));


```

<h2>Product</h2>

```php

$product= new Product($request);

//Retrive a list of products
$shopId=8694565;
print_r($product->products(8694565));

//Retrive a specific product
$productId="6440b092312ec5473b05598b";
$specificProduct=$product->product($shopId,$productId);
print_r($specificProduct);


```

<h2>Upload Image</h2>

```php

use PureIntento\PrintifySdk\Upload;

$upload= new Upload($request);


//Retrive a list to  uploaded images
print_r($upload->uploadedImages([
    "query"=>[
        "page"=>1
    ]
]));


//Retrive a specific uploaded image
print_r($upload->uploadedImage("64248f5782e54a4934c2121e"));


//Upload image by url address
print_r($upload->uploadImageByUrl("https://pbs.twimg.com/media/DeDxDEcW0AET15l.jpg"));

//Upload image by base64 content
print_r($upload->uploadImageByBase64("BASE64 CONTENT HERE"));

```


<h2>Create Product</h2>

```php
use PureIntento\PrintifySdk\Structures\Templates\ProductCreationTemplate;
use PureIntento\PrintifySdk\Structures\Templates\PrintAreaTemplate;
use PureIntento\PrintifySdk\Structures\Templates\ImageTemplate;
use PureIntento\PrintifySdk\Product;



$blueprintId=384;
$printProviderId=1;

$pct=new ProductCreationTemplate("Product Name","Product description",$blueprintId,$printProviderId);


$bluePrintVariantId=45740;
$price=1000;
$isEnabled=true;

/*
    Този метод добавя вариянт на printprovider за конкретния blueprint
    This method adds a printprovider variant for the specific blueprint
*/
$pct->addVariant($bluePrintVariantId,$price,$isEnabled);



$blueprintVariantIds=[
    45740
];
/**
 * Този class описва как да се се визуализират снимките. Тяхната позиция размер и кои снимки да бъдат добавени.
 * This class describes how to render pictures. Their item size and which photos to add.
 */
$pat=new PrintAreaTemplate($blueprintVariantIds);
$position="front";
$images=[
    /*
        Този class създава дизайн на снимката в която се посочва идентификатора на снимката
        нейното разположение на кординати x и y. Също така нейната scale и ъгълът на въртене предполагам от 0 до 360 градуса.
        This class creates a photo design specifying the photo ID
        its location in x and y coordinates. Also its scale and angle of rotation I guess from 0 to 360 degrees.
    */
    new ImageTemplate("IMAGE ID WHO CAN BE GETTED FROM Upload class","x","y","scale","angle")
];

$pat->addPlaceholder("Blueprint Provider variant position. For example, it can be front, back etc",$images);


//Add print are to ProductCreationTemplate
$pct->addPrintArea($pat);

```

<h2>How to update,delete,publish,sucessedPublish failedPublish and, unpublish product</h2>

```php
use PureIntento\PrintifySdk\Product;
use PureIntento\PrintifySdk\PrintifyClient;

$authToken="YOU_AUTH_TOKEN_HERE";
$client=new PrintifyClient($authToken);

$product= new Product($client);

$shopId="SHOP ID HERE";
$product->updateProduct($shopId,"PRODUCT ID HERE",[
    "title"=>"NEW TITLE"
]);

$product->deleteProduct($shopId,"PRODUCT ID HERE")


print_r($product->publish($shopId,"product_id"));
print_r($product->succeededPublish($shopId,"646fb1cc84d647f62800b424","you product id","you product handle example url"));
print_r($product->failedPublish($shopId,"646fb1cc84d647f62800b424","reason for failed"));
print_r($product->unpublish($shopId,"646fb1cc84d647f62800b424"));

```