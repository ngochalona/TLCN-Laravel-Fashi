<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\ProductsAttributes;
use App\Import;
use App\ImportDetails;
use DB;

class ProductsImportFile implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $sl = 0;
        foreach($collection as $key => $value){
            if($key > 0)
            {
                $sl += $value[2];
            }
        }
        $import = new Import;
        $import->total_qty = $sl;
        $import->save();
        $import_id = DB::getPdo()->lastinsertID();
        foreach($collection as $key => $value){
            if($key > 0)
            {
                $importd = new ImportDetails;
                $importd->import_id = $import_id;
                $importd->product_id = $value[0];
                $importd->size = $value[1];
                $importd->quantity = $value[2];
                $importd->save();

                $stock = DB::table('products_attributes')->where(['product_id'=>$value[0], 'size' => $value[1]])->select('stock')->first();
                ProductsAttributes::where(['product_id'=>$value[0], 'size' => $value[1]])->update(['stock' => $stock->stock + $value[2]]);
            }
        }
    }
}
