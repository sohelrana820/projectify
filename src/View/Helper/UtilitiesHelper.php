<?php
/**
 * @Author: Preview ICT Ltd.
 * @URI: http://previewict.com
 * @description: This component is creating doing the some extra work.
 */
namespace App\View\Helper;

use Cake\View\Helper;

class UtilitiesHelper extends Helper
{
    public $name = 'Utilities';

    public function getImageFromDir($imgDir)
    {
        $image = explode('/img/', $imgDir);
        if(isset($image[1]) && $image[1]){
            return $image[1];
        }
        return null;
    }

    /**
     * @param $category
     * @return bool|string
     */
    public function getPropertiesType($type)
    {
        switch ($type) {
            case 1:
                return 'Office';
                break;
            case 2:
                return 'Shop';
                break;
            case 3:
                return 'Villa';
                break;
            case 4:
                return 'Apartment';
                break;
            default:
                return false;
        }
    }
    /**
     * @param $category
     * @return bool|string
     */
    public function getPropertiesCategory($category)
    {
        switch ($category) {
            case 1:
                return 'Sell';
                break;
            case 2:
                return 'Rent';
                break;
            case 3:
                return 'Development';
                break;
            default:
                return false;
        }
    }
    public function getBackgroundFromAction($action)
    {
        switch ($action) {
            case 'index':
                return 'landing-page1';
                break;
            case 'termsAndConditions':
                return 'landing-page2';
                break;
            case 'sellerType':
                return 'landing-page3';
                break;
            default:
                return 'landing-page10';
        }
    }

}
