<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\HomePageSettings;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomePageSettingsController extends Controller
{

public function index()
{
    $categories = Category::where('status', 1)->get();
    $popularCategorySection = HomePageSettings::where('key', 'popular_category_section')->first();
    $sliderSectionOne = HomePageSettings::where('key', 'product_slider_section_one')->first();
    $sliderSectionTwo = HomePageSettings::where('key', 'product_slider_section_two')->first();
    $sliderSectionThree = HomePageSettings::where('key', 'product_slider_section_three')->first();
    return view('admin.home-page-setting.index', compact('categories', 'popularCategorySection','sliderSectionOne','sliderSectionTwo','sliderSectionThree'));
}


    public function updatePopularCategory(Request $request)
    {
        $request->validate([
            'cat_one' => ['required'],
            'cat_two' => ['required'],
            'cat_three' => ['required'],
            'cat_four' => ['required']

        ], [
            'cat_one.required' => 'Kategoria 1 jest wymagana',
            'cat_two.required' => 'Kategoria 2 jest wymagana',
            'cat_three.required' => 'Kategoria 3 jest wymagana',
            'cat_four.required' => 'Kategoria 4 jest wymagana',
        ]);

        // dd($request->all());
        $data = [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one,
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two,
            ],
            [
                'category' => $request->cat_three,
                'sub_category' => $request->sub_cat_three,
                'child_category' => $request->child_cat_three,
            ],
            [
                'category' => $request->cat_four,
                'sub_category' => $request->sub_cat_four,
                'child_category' => $request->child_cat_four,
            ]
        ];

        HomePageSettings::updateOrCreate(
            [
                'key' => 'popular_category_section'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Zaktualizowano', 'success', 'success');

        return redirect()->back();
    }

    public function updateProductSliderSectionOne(Request $request)
    {
        $request->validate([
            'cat_one' => ['required'],


        ], [
            'cat_one.required' => 'Kategoria 1 jest wymagana',

        ]);

        // dd($request->all());
        $data = [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one, 
        ];

        HomePageSettings::updateOrCreate(
            [
                'key' => 'product_slider_section_one'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Zaktualizowano', 'success', 'success');

        return redirect()->back(); 
        
    }
    public function updateProductSliderSectionTwo(Request $request)
    {
        $request->validate([
            'cat_two' => ['required'],


        ], [
            'cat_two.required' => 'Kategoria 2 jest wymagana',

        ]);

        // dd($request->all());
        $data = [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two, 
        ];

        HomePageSettings::updateOrCreate(
            [
                'key' => 'product_slider_section_two'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Zaktualizowano', 'success', 'success');

        return redirect()->back(); 
        
    }
    public function updateProductSliderSectionThree(Request $request)
    {
        $request->validate([
            'cat_one' => ['required'],
            'cat_two' => ['required'],


        ], [
            'cat_one.required' => 'Kategoria 1 jest wymagana',
            'cat_two.required' => 'Kategoria 2 jest wymagana',

        ]);

        // dd($request->all());
        $data = [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one,
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two, 
            ],

        ];

        HomePageSettings::updateOrCreate(
            [
                'key' => 'product_slider_section_three'
            ],
            [
                'value' => json_encode($data)
            ]
        );


        toastr('Zaktualizowano', 'success', 'success');

        return redirect()->back(); 
        
    }
}