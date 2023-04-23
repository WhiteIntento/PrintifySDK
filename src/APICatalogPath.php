<?php
namespace PureIntento\PrintifySdk;


class APICatalogPath{


    /**
     * APi path for retrieve a list of all available blueprints
     */
    public static function blueprints() : string{
        return "catalog/blueprints.json";
    }

    /**
     * Api path for retrieve a specific blueprint
     */

    public static function blueprint(string $id) : string{
        return "catalog/blueprints/$id.json";
    }

    /**
     * Api path for retrieve a list of all print providers that fulfill orders for a specific blueprint
     */

    public  static function blueprintProviders(string $blueprintId) : string {
        return "catalog/blueprints/$blueprintId/print_providers.json";
    }

    /**
     * Api path for retrieve a list of all variants of a blueprint from a specific print provider
     */

    public static function blueprintProviderVariants(string $blueprintId,string $printproviderId) : string{
        return "catalog/blueprints/$blueprintId/print_providers/$printproviderId/variants.json";
    }

    /**
     * Api path for retrieve the shipping information for all variants of a blueprint from a specific print provider
     */

    public static function blueprintProviderShipping(string $blueprintId, string $printproviderId) : string {
        return "catalog/blueprints/$blueprintId/print_providers/$printproviderId/shipping.json";
    }

    /**
     * Api path for retrieve a list of all available print-providers
     */
    
    public static function printProviders() : string{
        return "catalog/print_providers.json";
    }

    public static function printProvider(string $id): string{
        return "catalog/print_providers/$id.json";
    }
}