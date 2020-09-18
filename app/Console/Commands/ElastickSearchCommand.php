<?php

namespace App\Console\Commands;

use Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;
use App\Model\Product;
class ElastickSearchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ElastickSearchCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $list_product = Product::where('pro_active',1)->get();

        $list_product = $list_product->toArray();
        $hosts = [
            'host'=>'127.0.0.1',
            'port'=>'9200',
            'scheme'=>'http'
        ];

        // tạo ra đối tượng elastickseach
        $client = ClientBuilder::create()->setHosts($hosts)->build();

        // check index article có tồn tại hay không
//        $exits = $client->indices()->exists(['index'=>'products']);
////        dd($exits);
//        if (!$exits)
//        {
//            // creat index, chỉ khởi tạo khi index khi nó chưa có trong index
//            $client->indices()->create(['index'=>'products']);
//        }
        // creat index, chỉ khởi tạo khi index khi nó chưa có trong index
        $client->indices()->create(['index'=>'products']);

        // Update- Create document in index
        $param=[];
        foreach ($list_product as $value) {
            $param = [
//                foreach ($list_product as $value) {
                'index' => 'products',
                'type' => 'products_type',
                'id'=> $value["pro_id"],
                'body' =>

                    [
                        'pro_id' => $value["pro_id"],
                        'pro_cat_id' => $value["pro_cat_id"],
                        'pro_cat_root_id' => $value["pro_cat_root_id"],
                        'pro_name' => $value["pro_name"],
                        'pro_rewrite' => $value["pro_rewrite"],
                        'pro_price' => $value["pro_price"],
                        'pro_link' => $value["pro_link"],
                        'pro_picture'=>$value["pro_picture"]
                    ]
            ];
            $result = $client->index($param);
        }

    }
    public function Command()
    {

    }
}
