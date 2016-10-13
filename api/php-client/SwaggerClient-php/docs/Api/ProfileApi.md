# Swagger\Client\ProfileApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**usersIdProfileGet**](ProfileApi.md#usersIdProfileGet) | **GET** /Users/{id}/Profile | Get profile of a specific user
[**usersIdProfilePut**](ProfileApi.md#usersIdProfilePut) | **PUT** /Users/{id}/Profile | Update profile information


# **usersIdProfileGet**
> \Swagger\Client\Model\Profile usersIdProfileGet($id, $length, $weight, $date_of_birth, $gender)

Get profile of a specific user

Get all information of a specific user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ProfileApi();
$id = 56; // int | 
$length = 1.2; // double | 
$weight = 1.2; // double | 
$date_of_birth = new \DateTime(); // \DateTime | 
$gender = "gender_example"; // string | 

try {
    $result = $api_instance->usersIdProfileGet($id, $length, $weight, $date_of_birth, $gender);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->usersIdProfileGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |
 **length** | **double**|  | [optional]
 **weight** | **double**|  | [optional]
 **date_of_birth** | **\DateTime**|  | [optional]
 **gender** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdProfilePut**
> \Swagger\Client\Model\Profile usersIdProfilePut($id, $length, $weight, $date_of_birth, $gender)

Update profile information

Profile information

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\ProfileApi();
$id = 56; // int | 
$length = 1.2; // double | 
$weight = 1.2; // double | 
$date_of_birth = new \DateTime(); // \DateTime | 
$gender = "gender_example"; // string | 

try {
    $result = $api_instance->usersIdProfilePut($id, $length, $weight, $date_of_birth, $gender);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->usersIdProfilePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |
 **length** | **double**|  | [optional]
 **weight** | **double**|  | [optional]
 **date_of_birth** | **\DateTime**|  | [optional]
 **gender** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\Profile**](../Model/Profile.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

