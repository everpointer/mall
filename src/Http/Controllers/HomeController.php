<?php

namespace Notadd\Shop\Http\Controllers;

use Notadd\Shop\Http\Handlers\HomeDataHandler;

class HomeController extends Controller
{
    public function index(HomeDataHandler $handler)
    {
        // $seeder = new \DatabaseSeeder();
        // dd($seeder->run());

        // $members = Member::with('profile')->get()->toArray();
        // dd($members);

        return $handler->toResponse()->generateHttpResponse();
    }

    private function createTags()
    {
        $product = Product::select(['id', 'name'])->get();

        foreach ($product as $value) {
            $prod = Product::find($value->id);

            $prod->tags = str_replace(' ', ',', $value->name);

            $prod->save();
        }
    }
}
