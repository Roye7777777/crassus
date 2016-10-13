# Swagger\Client\MotivationApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**motivatieGet**](MotivationApi.md#motivatieGet) | **GET** /Motivatie | Motivation


# **motivatieGet**
> \Swagger\Client\Model\Motivation motivatieGet()

Motivation

Show motivation

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\MotivationApi();

try {
    $result = $api_instance->motivatieGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MotivationApi->motivatieGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\Motivation**](../Model/Motivation.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

