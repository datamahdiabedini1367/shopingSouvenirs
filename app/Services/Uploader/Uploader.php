<?php

namespace App\Services\Uploader;

use App\Models\Picture;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Object_;

class Uploader
{
    private $request;
    private $storageManager;
    private $file;
    private $product;

    public function __construct(Request $request, StorageManager $storageManager,Product $product)
    {
        $this->request = $request;
        $this->storageManager = $storageManager;
        $this->file = $request->file;
    }

    public function upload(Product $product)
    {
        $this->putFileIntoStorage($product->id);
    }

    private function putFileIntoStorage($product)
    {
        $this->storageManager->putFileAsPublic($this->file->getClientOriginalName(), $this->file, 'product/'.$product.'/image');
    }

//    private function saveFileIntoDatabase()
//    {
//        $file = new Picture([
//            'product_id'=>$this->,
//            'path'=>,
//
//
//        ]);
//
//
//    }

}
