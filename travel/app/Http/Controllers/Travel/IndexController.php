<?php

namespace App\Http\Controllers\Travel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;
class IndexController extends Controller
{
	public function __construct(Tour $objmTour){
		$this->objmTour = $objmTour;
	}
    public function index(){
    	$objItemsHD = $this->objmTour->getItemsHD();
    	$objItemsSK = $this->objmTour->getItemsSK();
    	$objItemsYT = $this->objmTour->getItemsYT();
        $objItem1NB = $this->objmTour->getItem1NB();
        $id = $objItem1NB['0']['id_chitiet'];
        $objItemsNB = $this->objmTour->getItemsNB($id);         
    	return view('travel.index.index',compact('objItemsHD','objItem1NB','objItemsNB','objItemsSK','objItemsYT'));
    }
    //tìm kiếm tour trong index
    public function timkiem(Request $request){
        $objItems = $this->objmTour->tk($request);
        return view('travel.index.timkiem',compact('objItems','request'));
    }
}
