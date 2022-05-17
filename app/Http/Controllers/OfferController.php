<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Traits\TraitOffer;
use LaravelLocalization;

class OfferController extends Controller
{

    use TraitOffer;

    public function index()
    {
        $offers = Offer::select('id','Name_'.LaravelLocalization::getCurrentLocale().' as name',
        'details_'.LaravelLocalization::getCurrentLocale().' as details','Price','Photo')->get();
        return view('Offers.index',compact('offers'));
    }

    public function create()
    {
        return view('Offers.create');
    }

    public function store(OfferRequest $request)
    {
        //Insert Data in DB
         $file_name = $this -> savePhoto('Images/Offer/',$request -> photo);

        $offers = Offer::create(
            [
                'Name_ar' => $request -> name_ar,
                'Name_en' => $request -> name_en,
                'details_ar' => $request -> details_ar,
                'details_en' => $request -> details_en,
                'Price' => $request -> price,
                'Photo' => $file_name
             ]
        );

        if(!$offers)
        {
            return 'Erreur';
        }

        return redirect() -> route('offers.index') ->with(['success' => __('message.Add Offers Successfuly')]);
        
    }

    public function destroy($offer_id)
    {
        $offers = Offer::find($offer_id);
        if(!$offers)
        {
            return redirect() -> back() -> with(['error' => __('message.This Offer doesnt Exist')]);
        }
        $offers -> delete();
        return redirect() -> back() -> with(['success' => __('message.Delete offer is succefuly')]);
    }

    public function edit($offer_id)
    {
        $offer = Offer::find($offer_id);
        if(!$offer)
        {
            return redirect() ->back() -> with(['error' => __('message.This Offer doesnt Exist')]);
        }
        return view('Offers.edit',compact('offer'));
    }

    public function update(OfferRequest $request,$offer_id)
    {

        $offers = Offer::find($offer_id);

        if(!$offers)
        {
            return redirect() -> back() -> with(['error' => __('message.This Offer doesnt Exist')]);
        }

        if($request -> has('photo'))
        {
            $file_name = $this -> savePhoto('Images/Offer/',$request -> photo);
            $offers -> update(
                [
                    'Photo' => $file_name
                ]
            );
        }

       $offers -> update($this -> dataForms($request));

        return redirect() -> route('offers.index') -> with(['success' => __('message.Update Has Success')]);

    }

    protected  function dataForms($requestData)
    {
        return $data = [
            'Name_ar' =>$requestData -> name_ar,
            'Name_en' => $requestData -> name_en,
            'details_ar' => $requestData -> details_ar,
            'details_en' => $requestData -> details_en,
            'Price' => $requestData -> price
        ];
    }


}
