# Swagger\Client\UserApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**usersGet**](UserApi.md#usersGet) | **GET** /Users | Users
[**usersIdExerciseDiaryGet**](UserApi.md#usersIdExerciseDiaryGet) | **GET** /Users/{id}/Exercise_Diary | Get exercise diary reports
[**usersIdExerciseDiaryPost**](UserApi.md#usersIdExerciseDiaryPost) | **POST** /Users/{id}/Exercise_Diary | Post exercise diary reports
[**usersIdFoodDiaryGet**](UserApi.md#usersIdFoodDiaryGet) | **GET** /Users/{id}/Food_Diary | Get food diary reports
[**usersIdFoodDiaryPost**](UserApi.md#usersIdFoodDiaryPost) | **POST** /Users/{id}/Food_Diary | Post food diary reports
[**usersIdGet**](UserApi.md#usersIdGet) | **GET** /Users/{id} | Specific user
[**usersIdProfileGet**](UserApi.md#usersIdProfileGet) | **GET** /Users/{id}/Profile | Get profile of a specific user
[**usersIdProfilePut**](UserApi.md#usersIdProfilePut) | **PUT** /Users/{id}/Profile | Update profile information
[**usersIdPut**](UserApi.md#usersIdPut) | **PUT** /Users/{id} | User adjustment
[**usersIdScoresGet**](UserApi.md#usersIdScoresGet) | **GET** /Users/{id}/Scores | Get scores
[**usersIdScoresPost**](UserApi.md#usersIdScoresPost) | **POST** /Users/{id}/Scores | Post score
[**usersPost**](UserApi.md#usersPost) | **POST** /Users | User addition


# **usersGet**
> \Swagger\Client\Model\User[] usersGet()

Users

A collection of users to manage

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();

try {
    $result = $api_instance->usersGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\User[]**](../Model/User.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdExerciseDiaryGet**
> \Swagger\Client\Model\ExerciseDiary usersIdExerciseDiaryGet($id)

Get exercise diary reports

Get exercise diary reports of a specific user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 

try {
    $result = $api_instance->usersIdExerciseDiaryGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdExerciseDiaryGet: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 
$exercises = "exercises_example"; // string | 

try {
    $result = $api_instance->usersIdExerciseDiaryPost($id, $exercises);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdExerciseDiaryPost: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 

try {
    $result = $api_instance->usersIdFoodDiaryGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdFoodDiaryGet: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\UserApi();
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
    echo 'Exception when calling UserApi->usersIdFoodDiaryPost: ', $e->getMessage(), PHP_EOL;
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

# **usersIdGet**
> \Swagger\Client\Model\User usersIdGet($id, $x_authtoken)

Specific user

Return specific user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | user id
$x_authtoken = "x_authtoken_example"; // string | 

try {
    $result = $api_instance->usersIdGet($id, $x_authtoken);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| user id |
 **x_authtoken** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\User**](../Model/User.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdProfileGet**
> \Swagger\Client\Model\Profile usersIdProfileGet($id, $length, $weight, $date_of_birth, $gender)

Get profile of a specific user

Get all information of a specific user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 
$length = 1.2; // double | 
$weight = 1.2; // double | 
$date_of_birth = new \DateTime(); // \DateTime | 
$gender = "gender_example"; // string | 

try {
    $result = $api_instance->usersIdProfileGet($id, $length, $weight, $date_of_birth, $gender);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdProfileGet: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 
$length = 1.2; // double | 
$weight = 1.2; // double | 
$date_of_birth = new \DateTime(); // \DateTime | 
$gender = "gender_example"; // string | 

try {
    $result = $api_instance->usersIdProfilePut($id, $length, $weight, $date_of_birth, $gender);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdProfilePut: ', $e->getMessage(), PHP_EOL;
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

# **usersIdPut**
> \Swagger\Client\Model\User[] usersIdPut($id, $x_authtoken)

User adjustment

Edit data of an existing user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | user id
$x_authtoken = "x_authtoken_example"; // string | 

try {
    $result = $api_instance->usersIdPut($id, $x_authtoken);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| user id |
 **x_authtoken** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\User[]**](../Model/User.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdScoresGet**
> usersIdScoresGet($id, $number_week)

Get scores

Get scores by users

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 
$number_week = 56; // int | 

try {
    $api_instance->usersIdScoresGet($id, $number_week);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdScoresGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |
 **number_week** | **int**|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersIdScoresPost**
> usersIdScoresPost($id, $number_week)

Post score

Post score for certain week

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();
$id = 56; // int | 
$number_week = 56; // int | 

try {
    $api_instance->usersIdScoresPost($id, $number_week);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersIdScoresPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**|  |
 **number_week** | **int**|  |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **usersPost**
> \Swagger\Client\Model\User[] usersPost()

User addition

Add a new user

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\UserApi();

try {
    $result = $api_instance->usersPost();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->usersPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\User[]**](../Model/User.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

