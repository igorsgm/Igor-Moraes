<?php

/**
 * Class Request
 */
class Request
{
	/**
	 * $_SERVER['REQUEST_METHOD']
	 * @var string Which request method was used to access the page (GET, POST PUT, DELETE, HEAD)
	 */
	private $method;

	/**
	 * $_SERVER['SERVER_PROTOCOL']
	 * ('HTTP/version' or 'HTTPS/version)
	 * @var string Name and revision of the information protocol via which the page was requested.
	 */
	private $protocol;

	/**
	 * $_SERVER['SERVER_NAME']
	 * @var string The name of the server host under which the current script is executing. If the script is running
	 * on a virtual host, this will be the value defined for that virtual host.
	 */
	private $serverAddress;

	/**
	 * $_SERVER['REMOTE_ADDR']
	 * @var string The IP address from which the user is viewing the current page.
	 */
	private $clientAddress;

	/**
	 * $_SERVER['REQUEST_URI'], $_SERVER['PATH_INFO']
	 * @var string The URI which was given in order to access this page; for instance, '/index.html'.
	 */
	private $path;

	/**
	 * $_SERVER['QUERY_STRING']
	 * @var string The query string, if any, via which the page was accessed.
	 */
	private $querystring;

	/**
	 * @read http://www.php.net/manual/pt_BR/wrappers.php.php#wrappers.php.input
	 * @var string
	 */
	private $body;


	/**
	 * Request constructor
	 * @param string $method
	 * @param string $protocol
	 * @param string $serverAddress
	 * @param string $clientAddress
	 * @param string $path
	 * @param string $queryString
	 * @param string $body
	 */
	public function __construct($method, $protocol, $serverAddress, $clientAddress, $path, $queryString, $body)
	{
		$this->setMethod($method);
		$this->setProtocol($protocol);
		$this->setServerAddress($serverAddress);
		$this->setClientAddress($clientAddress);
		$this->setPath($path);
		$this->setQueryString($queryString);
		$this->setBody($body);
	}

	/**
	 * @return mixed
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * @param string $method
	 */
	public function setMethod($method)
	{
		$this->method = $method;
	}

	/**
	 * @return mixed
	 */
	public function getProtocol()
	{
		return $this->protocol;
	}

	/**
	 * @param string $protocol
	 */
	public function setProtocol($protocol)
	{
		$this->protocol = $protocol;
	}

	/**
	 * @return mixed
	 */
	public function getServerAddress()
	{
		return $this->serverAddress;
	}

	/**
	 * @param string $serverAddress
	 */
	public function setServerAddress($serverAddress)
	{
		$this->serverAddress = $serverAddress;
	}

	/**
	 * @return mixed
	 */
	public function getClientAddress()
	{
		return $this->clientAddress;
	}

	/**
	 * @param string $clientAddress
	 */
	public function setClientAddress($clientAddress)
	{
		$this->clientAddress = $clientAddress;
	}

	/**
	 * @return mixed
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * @param string $path
	 */
	public function setPath($path)
	{
		$this->path = $path;
	}

	/**
	 * @return mixed|array
	 */
	public function getQueryString()
	{
		return $this->querystring;
	}

	/**
	 * @param string $queryString
	 */
	public function setQueryString($queryString)
	{
		parse_str($queryString, $paramsArray);
		$this->querystring = $paramsArray;
	}

	/**
	 * @return mixed
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * @param string $body
	 */
	public function setBody($body)
	{
		$this->body = $body;
	}

}
