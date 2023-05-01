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
```
    $product= new Product($request);

    //Revice a list of products
    $shopId=8694565;
    print_r($product->products(8694565));

    ////Revice a specific product
    $productId="6440b092312ec5473b05598b";
    $specificProduct=$product->product($shopId,$productId);
    print_r($specificProduct);
```