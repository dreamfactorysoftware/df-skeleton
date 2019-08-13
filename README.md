## DreamFactory Skeleton

> **Note:** This repository contains the code needed to create a new connector of the DreamFactory platform. 
If you want the full DreamFactory platform, visit the 
main [DreamFactory repository](https://github.com/dreamfactorysoftware/dreamfactory).

You can clone content of this repository to your own to get new functional connector of DreamFactory Platform. 

To connect it to DF just add the following to the require section of 
[main composer](https://github.com/dreamfactorysoftware/dreamfactory/blob/ce72cc6739979be286f51617050bc9ec9c657f39/composer.json#L30):
```
"require":     {
    "dreamfactory/df-skeleton":   "~0.1.0"    // instead of skeleton write name of your package
}
``` 

Then run `composer require dreamfactory/df-skeleton update--no-dev --ignore-platform-reqs `

## Documentation

Documentation for the platform can be found on the [DreamFactory wiki](http://wiki.dreamfactory.com).

# Create a new DreamFactory connector

First of all, your package composer need to require df-core 
and, in case of creating system service, df-system. 
Just add the following to the composer.json file of your package:
```json
"require":     {
    "dreamfactory/df-core":   "~0.15.1",
    "dreamfactory/df-system": "~0.2.0"
}
```

You would need: 
* Service that extends `DreamFactory\Core\Services\BaseRestService` (__see [src/Services](https://github.com/dreamfactorysoftware/df-skeleton/blob/add-examples/src/Services/ExampleService.php)__)
* Database table that describes your connector config (__see [database/migrations](https://github.com/dreamfactorysoftware/df-skeleton/blob/add-examples/database/migrations/2019_08_12_125323_create_example_table.php)__)
* Model that connects to the table and extends `DreamFactory\Core\Models\BaseServiceConfigModel` (__see [src/Models](https://github.com/dreamfactorysoftware/df-skeleton/blob/master/src/Models/ExampleModel.php)__)
  
  There is an opportunity to create connector not using database (__see [DreamFactory\Core\Models\BaseServiceConfigNoDbModel](https://github.com/dreamfactorysoftware/df-core/blob/master/src/Models/BaseServiceConfigNoDbModel.php)__)

* Resource that extends `DreamFactory\Core\Resources\BaseRestResource` (__see [src/Resources](https://github.com/dreamfactorysoftware/df-skeleton/blob/add-examples/src/Resources/ExampleResource.php)__)


For some parent classes you can override methods to satisfy your needs. 

In your resource you can specify methods like handleGET, handlePOST to determine responses of the resource (only if 
[$autoDispatch = true;](https://github.com/dreamfactorysoftware/df-core/blob/06e01cd46ed106684041fb1fdf8ef35695a1b2cf/src/Components/RestHandler.php#L88)).

If you would like your service to handle requests itself and not use resources you need to override processRequest or 
handleRequest methods. 