<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        $homepage_secion_banner_one = Advertisement::where('key', 'homepage_secion_banner_one')->first();
        $homepage_secion_banner_one = json_decode($homepage_secion_banner_one->value);

        $homepage_secion_banner_two = Advertisement::where('key', 'homepage_secion_banner_two')->first();
        $homepage_secion_banner_two = json_decode($homepage_secion_banner_two?->value);

        $homepage_secion_banner_three = Advertisement::where('key', 'homepage_secion_banner_three')->first();
        $homepage_secion_banner_three = json_decode($homepage_secion_banner_three?->value);

        $homepage_secion_banner_four = Advertisement::where('key', 'homepage_secion_banner_four')->first();
        $homepage_secion_banner_four = json_decode($homepage_secion_banner_four?->value);

        return view('admin.advertisement.index',compact('homepage_secion_banner_one','homepage_secion_banner_two','homepage_secion_banner_three','homepage_secion_banner_four'));
    }

    public function homepageBannerSecionOne(Request $request)
    {
        $request->validate([
            'banner_image' => ['image'],
            'banner_url' => ['required']
           ]);
    
            /** Handle the image upload */
            $imagePath = $this->updateImage($request, 'banner_image', 'uploads');
    
            $value = [
                'banner_one' => [
                    'banner_url' => $request->banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ]
            ];
            if(!empty($imagePath)){
                $value['banner_one']['banner_image'] = $imagePath;
            }else {
    
                $value['banner_one']['banner_image'] = $request->banner_old_image;
            }
    
            $value = json_encode($value);
            Advertisement::updateOrCreate(
                ['key' => 'homepage_secion_banner_one'],
                ['value' => $value]
            );
        toastr('zaktualizowano','success','success');
        return redirect()->back();

    }

    public function homepageBannerSecionTwo(Request $request)
    {
        $request->validate([
            'banner_one_banner_image' => ['image'],
            'banner_one_banner_url' => ['required'],
            'banner_two_banner_image' => ['image'],
            'banner_two_banner_url' => ['required']
           ]);
    
            /** Handle the image upload */
            $imagePath = $this->updateImage($request, 'banner_one_banner_image', 'uploads');
            $imagePathTwo = $this->updateImage($request, 'banner_two_banner_image', 'uploads');
    
            $value = [
                'banner_one' => [
                    'banner_url' => $request->banner_one_banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ],
                'banner_two' => [
                    'banner_url' => $request->banner_two_banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ]
            ];
            if(!empty($imagePath)){
                $value['banner_one']['banner_image'] = $imagePath;
            }else {
    
                $value['banner_one']['banner_image'] = $request->banner_one_banner_old_image;
            }
            if(!empty($imagePathTwo)){
                $value['banner_two']['banner_image'] = $imagePathTwo;
            }else {
    
                $value['banner_two']['banner_image'] = $request->banner_two_banner_old_image;
            }
    
            $value = json_encode($value);
            Advertisement::updateOrCreate(
                ['key' => 'homepage_secion_banner_two'],
                ['value' => $value]
            );
        toastr('zaktualizowano','success','success');
        return redirect()->back();

    }
    public function homepageBannerSecionThree(Request $request)
    {
        $request->validate([
            'banner_one_banner_image' => ['image'],
            'banner_one_banner_url' => ['required'],
            'banner_two_banner_image' => ['image'],
            'banner_two_banner_url' => ['required'],
            'banner_three_banner_image' => ['image'],
            'banner_three_banner_url' => ['required']
           ]);
    
            /** Handle the image upload */
            $imagePath = $this->updateImage($request, 'banner_one_banner_image', 'uploads');
            $imagePathTwo = $this->updateImage($request, 'banner_two_banner_image', 'uploads');
            $imagePathThree = $this->updateImage($request, 'banner_three_banner_image', 'uploads');
    
            $value = [
                'banner_one' => [
                    'banner_url' => $request->banner_one_banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ],
                'banner_two' => [
                    'banner_url' => $request->banner_two_banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ],
                'banner_three' => [
                    'banner_url' => $request->banner_three_banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ]
            ];
            if(!empty($imagePath)){
                $value['banner_one']['banner_image'] = $imagePath;
            }else {
    
                $value['banner_one']['banner_image'] = $request->banner_one_banner_old_image;
            }
            if(!empty($imagePathTwo)){
                $value['banner_two']['banner_image'] = $imagePathTwo;
            }else {
    
                $value['banner_two']['banner_image'] = $request->banner_two_banner_old_image;
            }
            if(!empty($imagePathThree)){
                $value['banner_three']['banner_image'] = $imagePathThree;
            }else {
    
                $value['banner_three']['banner_image'] = $request->banner_three_banner_old_image;
            }
    
            $value = json_encode($value);
            Advertisement::updateOrCreate(
                ['key' => 'homepage_secion_banner_three'],
                ['value' => $value]
            );
        toastr('zaktualizowano','success','success');
        return redirect()->back();

    }
    public function homepageBannerSecionFour(Request $request)
    {
        $request->validate([
            'banner_image' => ['image'],
            'banner_url' => ['required']
           ]);
    
            /** Handle the image upload */
            $imagePath = $this->updateImage($request, 'banner_image', 'uploads');
    
            $value = [
                'banner_one' => [
                    'banner_url' => $request->banner_url,
                    'status' => $request->status == 'on' ? 1 : 0
                ]
            ];
            if(!empty($imagePath)){
                $value['banner_one']['banner_image'] = $imagePath;
            }else {
    
                $value['banner_one']['banner_image'] = $request->banner_old_image;
            }
    
            $value = json_encode($value);
            Advertisement::updateOrCreate(
                ['key' => 'homepage_secion_banner_four'],
                ['value' => $value]
            );
        toastr('zaktualizowano','success','success');
        return redirect()->back();

    }
}
