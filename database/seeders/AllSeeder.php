<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AllSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 'c3b92967-999b-47c7-89f3-8016412a31d7',
                'name' => 'Electronics',
                'description' => 'Category for electronic products',
                'parent_id' => null,
            ],
            [
                'id' => '6b8c9ed5-2d59-4ad3-b454-db63f9a051ba',
                'name' => 'Clothing',
                'description' => 'Category for clothing items',
                'parent_id' => null,
            ],
            [
                'id' => '119fa29f-5091-4dc4-bde4-76a29d749ee9',
                'name' => 'Books',
                'description' => 'Category for books',
                'parent_id' => null,
            ],

        ];
        $categories = array_merge(
            $categories,
            [
                [
                    'id' => '6b07a6fa-cc59-4df6-ad71-b865c9c2df4f',
                    'name' => 'Mobile Phones',
                    'description' => 'Subcategory for mobile phones',
                    'parent_id' => $categories[0]['id'],
                ],
                [
                    'id' => '26574511-2c86-4763-af81-66dd73c1c4e0',
                    'name' => 'Laptops',
                    'description' => 'Subcategory for laptops',
                    'parent_id' => $categories[0]['id'],
                ],
                [
                    'id' => '8a3d249f-f237-4d18-83fc-0e0b3a5ebc9f',
                    'name' => 'T-Shirts',
                    'description' => 'Subcategory for T-shirts',
                    'parent_id' => $categories[1]['id'],
                ],
                [
                    'id' => 'f3e2370d-4f2e-4c83-9263-68362e3d25e7',
                    'name' => 'Jeans',
                    'description' => 'Subcategory for Jeans',
                    'parent_id' => $categories[1]['id'],
                ],
                [
                    'id' => 'ab866a3f-6682-4496-8b7a-6b6e26767a2b',
                    'name' => 'Novels',
                    'description' => 'Subcategory for novels',
                    'parent_id' => $categories[2]['id'],
                ]
            ]
        );
        $products = [
            [
                'id' => '9a0c0b3b-69dc-4234-9a89-329766957a96',
                'name' => 'iPhone 13',
                'description' => 'A high-end smartphone',
                'brand' => 'Apple',
                'original_price' => 999.99,
                'discount' => 10,

            ],
            [
                'id' => 'c64f08d8-3a24-4b24-842d-ec6ab487bcb2',
                'name' => 'MacBook Pro',
                'description' => 'A powerful laptop',
                'brand' => 'Apple',
                'original_price' => 1499.99,
                'discount' => 15,

            ],
            [
                'id' => 'df923c34-22c0-4bb0-8ee0-8d6186e1e5df',
                'name' => 'Graphic T-Shirt',
                'description' => 'A comfortable graphic T-shirt',
                'brand' => 'Nike',
                'original_price' => 29.99,
                'discount' => 5,

            ],
            [
                'id' => 'a2a80e60-8c5f-4ed0-9e88-6a689e784bed',
                'name' => 'Samsung Galaxy S21',
                'description' => 'A premium Android smartphone',
                'brand' => 'Samsung',
                'original_price' => 799.99,
                'discount' => 12,

            ],
            [
                'id' => 'da508e10-f4d6-47a6-83a4-ece7238b1d94',
                'name' => 'Dell XPS 15',
                'description' => 'A high-performance laptop',
                'brand' => 'Dell',
                'original_price' => 1599.99,
                'discount' => 18,

            ],
            [
                'id' => '83fba78b-7e2d-47e2-9e4a-0d8e8d06b8fc',
                'name' => 'Jeans',
                'description' => 'A classic pair of jeans',
                'brand' => 'Levi\'s',
                'original_price' => 49.99,
                'discount' => 7,

            ],
            [
                'id' => 'fc0e944c-9e89-431c-9aa5-7499d0195a9b',
                'name' => 'The Great Gatsby',
                'description' => 'A classic novel by F. Scott Fitzgerald',
                'brand' => 'Vintage Books',
                'original_price' => 12.99,
                'discount' => 0,

            ],
            [
                'id' => 'c9c09c9c-7e7e-7e7e-7e7e-7e7e7e7e7e7e',
                'name' => 'Smart Watch',
                'description' => 'A stylish and functional smartwatch',
                'brand' => 'Fitbit',
                'original_price' => 79.99,
                'discount' => 8,

            ],
            [
                'id' => 'b2b1b1b2-1010-4545-8989-222222222222',
                'name' => 'HP Pavilion',
                'description' => 'A budget-friendly laptop for everyday use',
                'brand' => 'HP',
                'original_price' => 799.99,
                'discount' => 10,

            ],
        ];
        $allProductImages = [];

        $Images = [
            [
                'https://m.media-amazon.com/images/I/31gtkpuHM4L.jpg',
                'https://m.media-amazon.com/images/I/31RbHXz7-fL.jpg',
                'https://m.media-amazon.com/images/I/31qTUSTORqL.jpg',
                'https://m.media-amazon.com/images/I/313jEJeM8XL.jpg',
                'https://m.media-amazon.com/images/I/41zDCLDAGXL.jpg',
                'https://m.media-amazon.com/images/I/31ECrunQOKL.jpg',
                'https://m.media-amazon.com/images/I/01RdGnBdS6L.jpg',
            ],
            [
                'https://m.media-amazon.com/images/I/31YH5wvKCfL.jpg',
                'https://m.media-amazon.com/images/I/31WuZ43BkEL.jpg',
                'https://m.media-amazon.com/images/I/31OJRW9ETRL.jpg',
                'https://m.media-amazon.com/images/I/51wS-mNssuL.jpg',
                'https://m.media-amazon.com/images/I/41yfr1OqNnL.jpg',
                'https://m.media-amazon.com/images/I/31epxsZ6PdL.jpg',
                'https://m.media-amazon.com/images/I/310FahXtAeL.jpg',
            ],
            [
                'https://m.media-amazon.com/images/I/31AFh8QUkbS.jpg',
                'https://m.media-amazon.com/images/I/31XvvxUcSWS.jpg',
                'https://m.media-amazon.com/images/I/31IZM4ROhdS.jpg',
                'https://m.media-amazon.com/images/I/417Bc6cifnS.jpg',
                'https://m.media-amazon.com/images/I/31MhgN0zpcS.jpg',
            ], [
                'https://m.media-amazon.com/images/I/31wzXlla8OL.jpg',
                'https://m.media-amazon.com/images/I/31cPTwP6+wL.jpg',
                'https://m.media-amazon.com/images/I/31uhxVq3XRL.jpg',
                'https://m.media-amazon.com/images/I/11A-OfnqCcL.jpg',
                'https://m.media-amazon.com/images/I/51vVhDMy98L.jpg',
                'https://m.media-amazon.com/images/I/41uTFlRELGL.jpg',
            ],
            [
                'https://m.media-amazon.com/images/I/41K+pcVp-gL.jpg',
                'https://m.media-amazon.com/images/I/218NQ94ebkL.jpg',
                'https://m.media-amazon.com/images/I/21KtLAFC3oL.jpg',
                'https://m.media-amazon.com/images/I/414QDYiBdlL.jpg',
                'https://m.media-amazon.com/images/I/41K74qg82xL.jpg',
                'https://m.media-amazon.com/images/I/216VSZQaK5L.jpg,',
            ],
            [
                'https://m.media-amazon.com/images/I/41ahCF7dyuL.jpg',
                'https://m.media-amazon.com/images/I/41EJou5-V0L.jpg',
                'https://m.media-amazon.com/images/I/51gRuC1uNaL.jpg',
                'https://m.media-amazon.com/images/I/51pAnIrfpRL.jpg',
                'https://m.media-amazon.com/images/I/41YQso23IlL.jpg',
            ],
            ['https://m.media-amazon.com/images/I/41BiT3sOQBL._SX322_BO1,204,203,200_.jpg'],

            [
                'https://m.media-amazon.com/images/I/416KNlA6rAL.jpg',
                'https://m.media-amazon.com/images/I/41Uz98cNebL.jpg',
                'https://m.media-amazon.com/images/I/41enLR3DyxL.jpg',
                'https://m.media-amazon.com/images/I/51eFK1+X3YL.jpg',
                'https://m.media-amazon.com/images/I/41c-4CBVwPL.jpg',
                'https://m.media-amazon.com/images/I/51ev6Ny1uuL.jpg',
                'https://m.media-amazon.com/images/I/418b4guUguL.jpg',
            ],
            [
                'https://m.media-amazon.com/images/I/41UyE7kqLPL.jpg',
                'https://m.media-amazon.com/images/I/41cYsMnj04L.jpg',
                'https://m.media-amazon.com/images/I/41Xk95E4uSL.jpg',
                'https://m.media-amazon.com/images/I/41u4NKVoR-L.jpg',
                'https://m.media-amazon.com/images/I/31H5gd7gq1L.jpg',
                'https://m.media-amazon.com/images/I/61k8WMy4eKL.jpg',
                'https://m.media-amazon.com/images/I/41l+TQ7EluL.jpg',
            ]


        ];
        foreach ($products as $key => $product) {
            $productImages = [
                [
                    'id' => Str::uuid(),
                    'item_id' => $product['id'],
                    'name' => 'banner',
                    'name_on_disk' => $Images[$key][0],
                ]
            ];
            foreach ($Images[$key] as $image) {
                $productImages[] = [
                    'id' => Str::uuid(),
                    'item_id' => $product['id'],
                    'name' => 'anonymous',
                    'name_on_disk' => $image,
                ];
            }
            $allProductImages = array_merge($allProductImages, $productImages);
        }


       


        // Provided IDs and names
        $ids = [
            '119fa29f-5091-4dc4-bde4-76a29d749ee9',
            '26574511-2c86-4763-af81-66dd73c1c4e0',
            '6b07a6fa-cc59-4df6-ad71-b865c9c2df4f',
            '6b8c9ed5-2d59-4ad3-b454-db63f9a051ba',
            '8a3d249f-f237-4d18-83fc-0e0b3a5ebc9f',
            'ab866a3f-6682-4496-8b7a-6b6e26767a2b',
            'c3b92967-999b-47c7-89f3-8016412a31d7',
            'f3e2370d-4f2e-4c83-9263-68362e3d25e7'
        ];

        $names = [
            'books.jpeg',
            'laptops.jpg',
            'mobiles.jpg',
            'clothing.jpg',
            'tshirts.jpg',
            'novels.webp',
            'electronics.jpg',
            'jeans.webp',
        ];

        // Create the array
        $categoriesImages = [];

        foreach ($ids as $index => $id) {
            $categoriesImages[] = [
                'id' => Str::uuid(),
                'item_id' => $id,
                'name' => 'banner',
                'name_on_disk' => '/Images/'.$names[$index]
            ];
        }



        $productCategories = [
            [
                'id' => Str::uuid(),
                'product_id' => '9a0c0b3b-69dc-4234-9a89-329766957a96', // iPhone 13
                'category_id' => $categories[3]['id'], // Mobile Phones
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'c64f08d8-3a24-4b24-842d-ec6ab487bcb2', // MacBook Pro
                'category_id' => $categories[4]['id'], // Laptops
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'df923c34-22c0-4bb0-8ee0-8d6186e1e5df', // Graphic T-Shirt
                'category_id' => $categories[5]['id'], // T-Shirts
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'a2a80e60-8c5f-4ed0-9e88-6a689e784bed', // Samsung Galaxy S21
                'category_id' => $categories[3]['id'], // Mobile Phones
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'da508e10-f4d6-47a6-83a4-ece7238b1d94', // Dell XPS 15
                'category_id' => $categories[4]['id'], // Laptops
            ],
            [
                'id' => Str::uuid(),
                'product_id' => '83fba78b-7e2d-47e2-9e4a-0d8e8d06b8fc', // Jeans
                'category_id' => $categories[6]['id'], // Jeans
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'fc0e944c-9e89-431c-9aa5-7499d0195a9b', // The Great Gatsby
                'category_id' => $categories[7]['id'], // Novels
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'c9c09c9c-7e7e-7e7e-7e7e-7e7e7e7e7e7e', // Smart Watch
                'category_id' => $categories[3]['id'], // Mobile Phones
            ],
            [
                'id' => Str::uuid(),
                'product_id' => 'b2b1b1b2-1010-4545-8989-222222222222', // HP Pavilion
                'category_id' => $categories[4]['id'], // Laptops
            ],
            // Add more products and their corresponding categories as needed
        ];
        Product::insert($products);
        Category::insert($categories);
        Image::insert($allProductImages);
        Image::insert($categoriesImages);
        User::insert(['id' => 'c9c09c9c-7e7e-7e7e-7e7e-7e7e7e7e7534', 'name' => 'admin', 'email' => 'mohamedgira0901@gmail.com','password'=>'123123123','role'=>'admin']);
        ProductCategory::insert($productCategories);
    }
}
