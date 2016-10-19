# Swagger\Client\DiaryApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**usersIdExerciseDiaryGet**](DiaryApi.md#usersIdExerciseDiaryGet) | **GET** /Users/{id}/Exercise_Diary | Get exercise diary reports
[**usersIdExerciseDiaryPost**](DiaryApi.md#usersIdExerciseDiaryPost) | **POST** /Users/{id}/Exercise_Diary | Post exercise diary reports
[**usersIdFoodDiaryGet**](DiaryApi.md#usersIdFoodDiaryGet) | **GET** /Users/{id}/Food_Diary | Get food diary reports
[**usersIdFoodDiaryPost**](DiaryApi.md#usersIdFoodDiaryPost) | **POST** /Users/{id}/Food_Diary | Post food diary reports


# **usersIdExerciseDiaryGet**
> \Swagger\Client\Model\ExerciseDiary usersIdExerciseDiaryGet($id)

Get exercise diary reports

Get exercise diary reports of a specific user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\DiaryApi();
$id = 56; // int | 

try {
    $result = $api_instance->usersIdExerciseDiaryGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DiaryApi->usersIdExerciseDiaryGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |

### Return type

[**\Swagger\Client\Model\ExerciseDiary**](../Model/ExerciseDiary.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdExerciseDiaryPost**
> \Swagger\Client\Model\ExerciseDiary usersIdExerciseDiaryPost($id, $exercises)

Post exercise diary reports

A specific user posts an exercise diary

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\DiaryApi();
$id = 56; // int | 
$exercises = "exercises_example"; // string | 

try {
    $result = $api_instance->usersIdExerciseDiaryPost($id, $exercises);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DiaryApi->usersIdExerciseDiaryPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |
 **exercises** | **string**|  |

### Return type

[**\Swagger\Client\Model\ExerciseDiary**](../Model/ExerciseDiary.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdFoodDiaryGet**
> \Swagger\Client\Model\FoodDiary usersIdFoodDiaryGet($id)

Get food diary reports

Get food diary reports of a specific user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\DiaryApi();
$id = 56; // int | 

try {
    $result = $api_instance->usersIdFoodDiaryGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DiaryApi->usersIdFoodDiaryGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |

### Return type

[**\Swagger\Client\Model\FoodDiary**](../Model/FoodDiary.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdFoodDiaryPost**
> \Swagger\Client\Model\FoodDiary usersIdFoodDiaryPost($id, $post_date, $number_week, $breakfast, $lunch, $dinner, $snacks)

Post food diary reports

A specific user posts a food diary

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\DiaryApi();
$id = 56; // int | 
$post_date = new \DateTime(); // \DateTime | 
$number_week = 56; // int | 
$breakfast = "breakfast_example"; // string | 
$lunch = "lunch_example"; // string | 
$dinner = "dinner_example"; // string | 
$snacks = "snacks_example"; // string | 

try {
    $result = $api_instance->usersIdFoodDiaryPost($id, $post_date, $number_week, $breakfast, $lunch, $dinner, $snacks);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DiaryApi->usersIdFoodDiaryPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |
 **post_date** | **\DateTime**|  |
 **number_week** | **int**|  |
 **breakfast** | **string**|  | [optional]
 **lunch** | **string**|  | [optional]
 **dinner** | **string**|  | [optional]
 **snacks** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\FoodDiary**](../Model/FoodDiary.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

