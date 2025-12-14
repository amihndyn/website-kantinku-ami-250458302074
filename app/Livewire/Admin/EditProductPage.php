<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class EditProductPage extends Component
{
    use WithFileUploads;
    
    public $product;
    public $categories;
    
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|exists:categories,id')]
    public $category_id;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|string|unique:products,slug')]
    public $slug;

    #[Validate('nullable|string|max:1000')]
    public $description;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240')]
    public $image;
    
    public $fileSelected = false;

    public function mount($id)
    {
        $this->categories = Category::all();
        $this->product = Product::findOrFail($id);

        if (!$this->product) {
            return redirect()->route('dashboard.products')->with('error', 'Product not found.');
        }

        // Set values
        $this->name         = $this->product->name;
        $this->slug         = $this->product->slug;
        $this->category_id  = $this->product->category_id; // Perhatikan ini
        $this->price        = $this->product->price;
        $this->description  = $this->product->description;
    }

    public function update()
    {
        // Validasi dengan slug exception untuk product ini
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products,slug,' . $this->product->id, // FIXED
            'category_id' => 'required|exists:categories,id', // FIXED
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:10240'
        ]);

        // Handle image upload
        $imagePath = $this->product->image_path;
        if ($this->image) {
            // Delete old image jika ada
            if ($this->product->image_path && file_exists(storage_path('app/public/' . $this->product->image_path))) {
                unlink(storage_path('app/public/' . $this->product->image_path));
            }
            $imagePath = $this->image->store('products', 'public');
        }

        // Update product
        $this->product->update([
            'name' => $this->name,
            'slug' => $this->slug ?: Str::slug($this->name), // Gunakan helper Str
            'category_id' => $this->category_id, // FIXED
            'price' => $this->price,
            'description' => $this->description,
            'image_path' => $imagePath
        ]);
        return redirect()->route('dashboard.products')->with('success', 'Product updated successfully.');
    }
    
    public function updatedImage()
    {
        $this->fileSelected = $this->image ? true : false;
    }
    
    // Auto-generate slug dari nama
    public function updatedName($value)
    {
        if (!$this->slug) {
            $this->slug = Str::slug($value);
        }
    }
    
    // Auto-format slug
    public function updatedSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.admin.edit-product-page')->layout('components.layouts.dashboard');
    }
}