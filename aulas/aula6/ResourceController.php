<?php
include_once('Request.php');
include_once('DBConnector.php');

class ResourceController
{
	private $METHODMAP = ['GET' => 'search', 'POST' => 'create', 'PUT' => 'update', 'DELETE' => 'remove'];

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function treatRequest($request)
	{
		// Calling a function by string, according to which METHODMAP's array key
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	}

	/**
	 * Create SQL query SELECT
	 * @param Request $request
	 * @return string
	 */
	public function search($request)
	{
		$query = 'SELECT * FROM ' . $request->getPath() . ' WHERE ' . self::queryParams($request->getParams());
//		echo "<pre>";
//		var_dump($query);
//		echo "</pre>";
//		die;
		$conn = (new DBConnector())->query($query);
		$result = $conn->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	/**
	 * Separate parameters from queryString
	 * @param array $params = Query String ($_SERVER['QUERY_STRING'])
	 * @return string = conditions to SQL query (key = value)
	 */
	public function queryParams($params)
	{
		$query = '';
		foreach ($params as $key => $value) {
			$query .= $key . ' = ' . '"' . $value . '"' . ' AND ';
		}
		return substr($query, 0, -5);
	}

}
