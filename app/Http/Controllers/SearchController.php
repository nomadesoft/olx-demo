<?php
/**
 * SearchController.php
 *
 * PHP version 5.6
 *
 * @category  Olx-Demo
 * @package   Controllers
 * @author    Jesus Farfan <jesu.farfan23@gmai.com>
 * @copyright 2016 - MIT
 * @license   Mit License<http://opensource.org/licenses/MIT>
 * @link      http://opensource.org/licenses/MIT
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;

/**
 * SearchController.php
 *
 * PHP version 5.6
 *
 * @category  Olx-Demo
 * @package   Controllers
 * @author    Jesus Farfan <jesu.farfan23@gmai.com>
 * @copyright 2016 - MIT
 * @license   Mit License<http://opensource.org/licenses/MIT>
 * @link      http://opensource.org/licenses/MIT
 */
class SearchController extends Controller
{
    protected $urlEndpointOLX;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * search
     *
     * get list of items filtering by item search criteria
     * 
     * @param  Request $request Request http
     * 
     * @return string view
     */
    public function search(Request $request)
    {

        // I have to get the input data form Form search
        $searchCriteria = $request->input('item-search');

        try {

            // Get all Items, by criteria
            $aCollectionItems = $this->getItemsFromOlxBySearchCriteria($searchCriteria);

        } catch (Exception $e) {
            
            //if there are any error calling curl I catch and set the error in view
            return view('items-list', [
                'searchCriteria' => $searchCriteria,
                'items' => array(),
                'error' => "Service unavailbe, please contact with support are."
            ]);

        }

        return view('items-list', [
            'searchCriteria' => $searchCriteria,
            'items' => $aCollectionItems,
            'error' => ""
        ]);
    }

    /**
     * getItemsFromOlxBySearchCriteria
     * 
     * @param  string  $searchCriteria Search
     * @param  integer $offset         Offset
     * @param  integer $pageSize       PageSize
     * 
     * @return array Collection items
     */
    protected function getItemsFromOlxBySearchCriteria($searchCriteria, $offset = 0, $pageSize = 50)
    {
        // Hardcode url endpoint olx
        $urlEndpoint = "http://api-v2.olx.com/items?location=www.olx.com.ar&searchTerm=" . $searchCriteria;

        $channel = curl_init();

        // set URL
        curl_setopt($channel, CURLOPT_URL, $urlEndpoint);
        curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($channel);

        // If result is false, the I have to throw the error
        if ($result === false) {
            $errorStr = curl_error($channel);
            throw new \Exception($errorStr);
        }

        curl_close($channel);

        $result = json_decode($result, false);

        // If result does not contain data, I have to throw the error
        if (!isset($result->data)) {
            throw new \Exception('Error, retrieviring data');
        }

        return $result->data;;
    }
}
