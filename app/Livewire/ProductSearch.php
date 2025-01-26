<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductSearch extends Component
{
    public $search = '';
    public $products = [];

    public function updatedSearch()
    {
        if ($this->search) {
            $this->products = Product::where('name', 'like', '%' . $this->search . '%')
                ->limit(10)
                ->get();
        } else {
            $this->products = [];
        }
    }

    public function selectProduct($productId)
    {
        $product = Product::find($productId);
        if ($product) {
            $this->search = $product->name;
            $this->products = [];
        }
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
