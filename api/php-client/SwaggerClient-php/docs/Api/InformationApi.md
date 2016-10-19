# Swagger\Client\InformationApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**informationGet**](InformationApi.md#informationGet) | **GET** /Information | Information
[**informationIdGet**](InformationApi.md#informationIdGet) | **GET** /Information/{id} | Information


# **informationGet**
> \Swagger\Client\Model\Information informationGet()

Information

All information

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\InformationApi();

try {
    $result = $api_instance->informationGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InformationApi->informationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\Information**](../Model/Information.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **informationIdGet**
> \Swagger\Client\Model\Information informationIdGet($id)

Information

specific information

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\InformationApi();
$id = 56; // int | 

try {
    $result = $api_instance->informationIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InformationApi->informationIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |

### Return type

[**\Swagger\Client\Model\Information**](../Model/Information.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

