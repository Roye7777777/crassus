# Swagger\Client\QuizApi

All URIs are relative to *http://crassus-php.azurewebsites.net/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**questionsGet**](QuizApi.md#questionsGet) | **GET** /Questions | Get questions
[**usersIdScoresGet**](QuizApi.md#usersIdScoresGet) | **GET** /Users/{id}/Scores | Get scores
[**usersIdScoresPost**](QuizApi.md#usersIdScoresPost) | **POST** /Users/{id}/Scores | Post score


# **questionsGet**
> \Swagger\Client\Model\Question questionsGet($number_week, $options, $correct_answer)

Get questions

Get questions to be answered by users

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new Swagger\Client\Api\QuizApi();
$number_week = 56; // int | 
$options = array("options_example"); // string[] | 
$correct_answer = 56; // int | 

try {
    $result = $api_instance->questionsGet($number_week, $options, $correct_answer);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling QuizApi->questionsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **number_week** | **int**|  |
 **options** | [**string[]**](../Model/string.md)|  |
 **correct_answer** | **int**|  |

### Return type

[**\Swagger\Client\Model\Question**](../Model/Question.md)

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

$api_instance = new Swagger\Client\Api\QuizApi();
$id = 56; // int | 
$number_week = 56; // int | 

try {
    $api_instance->usersIdScoresGet($id, $number_week);
} catch (Exception $e) {
    echo 'Exception when calling QuizApi->usersIdScoresGet: ', $e->getMessage(), PHP_EOL;
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

$api_instance = new Swagger\Client\Api\QuizApi();
$id = 56; // int | 
$number_week = 56; // int | 

try {
    $api_instance->usersIdScoresPost($id, $number_week);
} catch (Exception $e) {
    echo 'Exception when calling QuizApi->usersIdScoresPost: ', $e->getMessage(), PHP_EOL;
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

