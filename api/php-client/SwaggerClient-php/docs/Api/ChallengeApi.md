# Swagger\Client\ChallengeApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**challengeWeekGet**](ChallengeApi.md#challengeWeekGet) | **GET** /Challenge/{week} | Challenges
[**challengesGet**](ChallengeApi.md#challengesGet) | **GET** /Challenges | Challenges


# **challengeWeekGet**
> \Swagger\Client\Model\Challenge challengeWeekGet($week)

Challenges

Array of challenges for the given number of the week

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ChallengeApi();
$week = 56; // int | 

try {
    $result = $api_instance->challengeWeekGet($week);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChallengeApi->challengeWeekGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **week** | **int**|  |

### Return type

[**\Swagger\Client\Model\Challenge**](../Model/Challenge.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **challengesGet**
> \Swagger\Client\Model\Challenge challengesGet()

Challenges

Array of challenges

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ChallengeApi();

try {
    $result = $api_instance->challengesGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChallengeApi->challengesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\Challenge**](../Model/Challenge.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

