<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryAndProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Appetizers',
                'image' => './category_images/Appetizers.jpg',
                'products' => [
                    [
                        'name' => 'Bruschetta',
                        'description' => 'Bruschetta is a classic Italian appetizer featuring toasted bread topped 
                                        with a fresh mixture of diced tomatoes, garlic, basil, and olive oil. The crispy texture of 
                                        the bread combined with the vibrant flavors of the topping makes it a perfect light and 
                                        refreshing starter for any meal. It\'s often served as an antipasto and pairs well with cheese, 
                                        cured meats, or balsamic glaze.',
                        'ingredients' => 'Italian bread, Ripe tomatoes, Garlic, Fresh basil, Extra virgin olive oil, 
                                        Balsamic vinegar, Salt, Black pepper, Red pepper flakes, Shredded Parmesan cheese',
                        'price' => 420.00,
                        'image' => './product_images/Bruschetta.jpg',
                    ],
                    [
                        'name' => 'Spinach Artichoke Dip',
                        'description' => 'Spinach Artichoke Dip is a creamy and savory appetizer made with a 
                                        rich blend of spinach, artichokes, cheese, and seasonings. This warm, cheesy dip is a crowd favorite, 
                                        often served with tortilla chips, toasted bread, or vegetable sticks. 
                                        Its creamy texture and bold flavors make it perfect for parties, gatherings, or as a comforting snack.',
                        'ingredients' => 'Fresh spinach, Artichoke hearts, Cream cheese, Sour cream, Mayonnaise, 
                                        Shredded mozzarella cheese, Grated Parmesan cheese, Garlic, Salt, Black pepper, 
                                        Red pepper flakes, Olive oil',
                        'price' => 530.00,
                        'image' => './product_images/spinach-artichoke-dip.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Soups',
                'image' => './category_images/Soups.jpg',
                'products' => [
                    [
                        'name' => 'Creamy Tomato Basil Soup',
                        'description' => 'Creamy Tomato Basil Soup is a comforting and velvety dish that combines the tangy sweetness of ripe 
                                        tomatoes with the aromatic freshness of basil. The addition of cream gives the soup a luxurious texture, making it an 
                                        ideal starter or a cozy main dish when paired with crusty bread or grilled cheese. It’s a timeless classic that’s 
                                        simple yet flavorful.',
                        'ingredients' => 'Ripe Tomatoes, Onion, Garlic, Carrots, Vegetable Broth, Heavy Cream, Fresh Basil Leaves, Olive Oil, Sugar, Parmesan Cheese',
                        'price' => 450.00,
                        'image' => './product_images/creamy-tomato-basil-soup-image.jpg',
                    ],
                    [
                        'name' => 'Creamy of Mushroom Soup',
                        'description' => 'Cream of Mushroom Soup is a rich and velvety soup made with fresh mushrooms, 
                                        butter, cream, and aromatic seasonings. This comforting dish is known for its deep umami 
                                        flavor and smooth texture, making it a favorite starter or a standalone meal. 
                                        It is often served with toasted bread or croutons for added crunch.',
                        'ingredients' => 'fresh mushrooms, Onion, Butter, chicken broth, heavy cream, salt, black pepper, Parmesan cheese',
                        'price' => 670.00,
                        'image' => './product_images/Cream-of-Mushroom-Soup.jpg',
                    ],
                ],
                
            ],
            [
                'name' => 'Main Courses',
                'image' => './category_images/MainCourses.jpg',
                'products' => [
                    [
                        'name' => 'Chicken Fried Rice',
                        'description' => 'Fried rice is a versatile and delicious dish made by stir-frying cooked rice with a mix of vegetables, 
                                        protein (like eggs, chicken, shrimp, or tofu), and flavorful seasonings. Popular in many cuisines, such as Chinese, Thai, 
                                        and Indonesian, fried rice can be customized with various ingredients to suit your taste.',
                        'ingredients' => 'Chicken, Rice, Seasonings and Sauces, Vegetables',
                        'price' => 850.00,
                        'image' => './product_images/Chicken_Fried_Rice.jpg',
                    ],
                    [
                        'name' => 'Chicken Biriyani',
                        'description' => 'Chicken Biryani is a flavorful and aromatic rice dish originating from the Indian subcontinent. 
                                        This dish combines fragrant basmati rice, tender marinated chicken, and a rich blend of spices, 
                                        layered and cooked together to create a symphony of flavors. It is often garnished with fried onions, 
                                        boiled eggs, and fresh herbs. Chicken Biryani is a celebration dish, enjoyed at gatherings and special occasions.',
                        'ingredients' => 'Chicken, Basmati Rice, Yogurt, Spices, Herbs, Fried Onions, Boiled Eggs',
                        'price' => 1200.00,
                        'image' => './product_images/chicken-biryani-5.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Beverages',
                'image' => './category_images/beverages.jpg',
                'products' => [
                    [
                        'name' => 'Mojito',
                        'description' => 'The Mojito is a refreshing Cuban cocktail known for its perfect balance
                                        of sweetness, citrus, and mint flavors. Made with fresh lime juice, mint leaves, 
                                        and soda water, this classic drink is a go-to choice for a cool and invigorating experience. 
                                        Traditionally served over ice, it\'s a favorite for hot summer days.',
                        'ingredients' => 'Fresh mint leaves, Lime juice, White rum, Sugar, Soda water (club soda), Ice cubes',
                        'price' => 640.00,
                        'image' => './product_images/mojito.jpg',
                    ],
                    [
                        'name' => 'Iced Milo',
                        'description' => 'Iced Milo is a delicious and refreshing chocolate malt drink, popular in 
                                        many countries, especially in Southeast Asia. It is made with Milo powder, milk, and ice, 
                                        often topped with extra Milo powder for a rich, malty flavor. This cold beverage is a 
                                        favorite among children and adults, providing a perfect blend of chocolatey sweetness and creaminess.',
                        'ingredients' => 'Milo powder, milk, sweetened condensed milk, Ice cubes',
                        'price' => 680.00,
                        'image' => './product_images/Iced_milo.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Desserts',
                'image' => './category_images/Desserts.jpg',
                'products' => [
                    [
                        'name' => 'Tiramisu',
                        'description' => 'Tiramisu is a classic Italian dessert known for its creamy layers and indulgent flavor. 
                                        It consists of coffee-soaked ladyfingers layered with a rich mascarpone cheese mixture, 
                                        lightly sweetened with sugar and flavored with a hint of liqueur. 
                                        The dessert is finished with a dusting of cocoa powder, creating an elegant and decadent treat. 
                                        Tiramisu is best served chilled, allowing the flavors to meld together beautifully.',
                        'ingredients' => 'Cocoa Powder, Cocoa Butter, Milk, Sugar, Eggs, Vanilla Extract, Cream, Mascarpone Cheese',
                        'price' => 300.00,
                        'image' => './product_images/Tiramisu.jpg',
                    ],
                    [
                        'name' => 'Chocolate Ice-cream',
                        'description' => 'A rich, creamy, and smooth chocolate-flavored ice cream made with high-quality cocoa and 
                                        fresh dairy ingredients. Perfectly balanced between sweetness and deep chocolate notes, offering a velvety 
                                        texture and a delightful melt-in-your-mouth experience.',
                        'ingredients' => 'Cocoa Powder, Cocoa Butter, Milk, Sugar, Eggs, Vanilla Extract, Cream, High-quality Cocoa',
                        'price' => 250.00,
                        'image' => './product_images/Chocolate-Ice-Cream.jpg',
                    ],
                ],
            ],
        ];
        // Loop through categories and insert them into the database
        foreach ($categories as $categoryData) {
            $category = Category::create([
                'name' => $categoryData['name'],
                'image' => $categoryData['image'],
            ]);

            // Loop through the products in each category
            foreach ($categoryData['products'] as $productData) {
                Product::create([
                    'name' => $productData['name'],
                    'image' => $productData['image'],
                    'description' => $productData['description'],
                    'ingredients' => $productData['ingredients'],
                    'price' => $productData['price'],
                    'category_id' => $category->id,
                    'category_name' => $category->name,
                    'status' => true,
                ]);
            }
        }
    }
}
