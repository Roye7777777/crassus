<?php
/**
 * ProfileApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Crassus API
 *
 * The Crassus API
 *
 * OpenAPI spec version: 1.0.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use \Swagger\Client\Configuration;
use \Swagger\Client\ApiClient;
use \Swagger\Client\ApiException;
use \Swagger\Client\ObjectSerializer;

/**
 * ProfileApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProfileApi
{

    /**
     * API Client
     *
     * @var \Swagger\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Swagger\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Swagger\Client\ApiClient $apiClient = null)
    {
        if ($apiClient == null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('http://crassus-php.azurewebsites.net/api');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Swagger\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Swagger\Client\ApiClient $apiClient set the API client
     *
     * @return ProfileApi
     */
    public function setApiClient(\Swagger\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation usersIdProfileGet
     *
     * Get profile of a specific user
     *
     * @param int $id  (required)
     * @param double $length  (optional)
     * @param double $weight  (optional)
     * @param \DateTime $date_of_birth  (optional)
     * @param string $gender  (optional)
     * @return \Swagger\Client\Model\Profile
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function usersIdProfileGet($id, $length = null, $weight = null, $date_of_birth = null, $gender = null)
    {
        list($response) = $this->usersIdProfileGetWithHttpInfo($id, $length, $weight, $date_of_birth, $gender);
        return $response;
    }

    /**
     * Operation usersIdProfileGetWithHttpInfo
     *
     * Get profile of a specific user
     *
     * @param int $id  (required)
     * @param double $length  (optional)
     * @param double $weight  (optional)
     * @param \DateTime $date_of_birth  (optional)
     * @param string $gender  (optional)
     * @return Array of \Swagger\Client\Model\Profile, HTTP status code, HTTP response headers (array of strings)
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function usersIdProfileGetWithHttpInfo($id, $length = null, $weight = null, $date_of_birth = null, $gender = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling usersIdProfileGet');
        }
        // parse inputs
        $resourcePath = "/Users/{id}/Profile";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // form params
        if ($length !== null) {
            $formParams['length'] = $this->apiClient->getSerializer()->toFormValue($length);
        }
        // form params
        if ($weight !== null) {
            $formParams['weight'] = $this->apiClient->getSerializer()->toFormValue($weight);
        }
        // form params
        if ($date_of_birth !== null) {
            $formParams['date_of_birth'] = $this->apiClient->getSerializer()->toFormValue($date_of_birth);
        }
        // form params
        if ($gender !== null) {
            $formParams['gender'] = $this->apiClient->getSerializer()->toFormValue($gender);
        }
        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\Profile',
                '/Users/{id}/Profile'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\Profile', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\Profile', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation usersIdProfilePut
     *
     * Update profile information
     *
     * @param int $id  (required)
     * @param double $length  (optional)
     * @param double $weight  (optional)
     * @param \DateTime $date_of_birth  (optional)
     * @param string $gender  (optional)
     * @return \Swagger\Client\Model\Profile
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function usersIdProfilePut($id, $length = null, $weight = null, $date_of_birth = null, $gender = null)
    {
        list($response) = $this->usersIdProfilePutWithHttpInfo($id, $length, $weight, $date_of_birth, $gender);
        return $response;
    }

    /**
     * Operation usersIdProfilePutWithHttpInfo
     *
     * Update profile information
     *
     * @param int $id  (required)
     * @param double $length  (optional)
     * @param double $weight  (optional)
     * @param \DateTime $date_of_birth  (optional)
     * @param string $gender  (optional)
     * @return Array of \Swagger\Client\Model\Profile, HTTP status code, HTTP response headers (array of strings)
     * @throws \Swagger\Client\ApiException on non-2xx response
     */
    public function usersIdProfilePutWithHttpInfo($id, $length = null, $weight = null, $date_of_birth = null, $gender = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling usersIdProfilePut');
        }
        // parse inputs
        $resourcePath = "/Users/{id}/Profile";
        $httpBody = '';
        $queryParams = array();
        $headerParams = array();
        $formParams = array();
        $_header_accept = $this->apiClient->selectHeaderAccept(array('application/json'));
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                "{" . "id" . "}",
                $this->apiClient->getSerializer()->toPathValue($id),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // form params
        if ($length !== null) {
            $formParams['length'] = $this->apiClient->getSerializer()->toFormValue($length);
        }
        // form params
        if ($weight !== null) {
            $formParams['weight'] = $this->apiClient->getSerializer()->toFormValue($weight);
        }
        // form params
        if ($date_of_birth !== null) {
            $formParams['date_of_birth'] = $this->apiClient->getSerializer()->toFormValue($date_of_birth);
        }
        // form params
        if ($gender !== null) {
            $formParams['gender'] = $this->apiClient->getSerializer()->toFormValue($gender);
        }
        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\Profile',
                '/Users/{id}/Profile'
            );

            return array($this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\Profile', $httpHeader), $statusCode, $httpHeader);
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\Profile', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

}
