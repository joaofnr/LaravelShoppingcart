<?php
 use App\Product;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/usage', function () {
	//adicionando um produto
	echo '<pre>adicionando um produto</pre><br />';
    $add = Cart::add('293ad', 'Product 1', 1, 9.99);
    var_dump($add); // CartItem
    echo '<hr />';
    
    //adicionando um produto com uma opção (boa para dados de ocupante)
	echo '<pre>adicionando um produto com uma opção </pre><br />';
    $add = Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
    var_dump($add); // CartItem
    echo '<hr />';
    
    //adicionando produto usando um array - necessário usar as chaves corretas
	echo '<pre>adicionando um produto usando um array</pre><br />';
    $add = Cart::add(['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 9.99, 'options' => ['size' => 'large']]);
    var_dump($add); // CartItem
    echo '<hr />';

    /**
     * New in version 2 of the package is the possibility to work with the Buyable interface. The way this works is that you have a model implement the Buyable interface, which will make you implement a few methods so the package knows how to get the id, name and price from your model. This way you can just pass the add() method a model and the quantity and it will automatically add it to the cart.
    */
    // adicionando um produto que implementa Buyable (interface para pegar o id, nome e preço para usar no carrinho) 
    echo '<pre>adicionando um produto que implementa Buyable (interface para pegar o id, nome e preço para usar no carrinho) </pre><br />';
    $product = new Product(1); // deve ser uma classe que implementa Buyable
    $add = Cart::add($product, 1, ['nome_ocupante' => 'João']);
    var_dump($add); // CartItem
    echo '<hr />';

    // adicionar vários produtos de uma vez
    echo '<pre>adicionar vários produtos de uma vez</pre><br />';
    $add = Cart::add([
	  ['id' => '293ad', 'name' => 'Product 1', 'qty' => 1, 'price' => 10.00],
	  ['id' => '4832k', 'name' => 'Product 2', 'qty' => 1, 'price' => 10.00, 'options' => ['size' => 'large']]
	]);
    var_dump($add); // CartItem
    echo '<hr />';

    // ou usando Buyable
    echo '<pre>ou usando Buyable</pre><br />';
    $product1 = new Product(2);
    $product2 = new Product(3);
	$add = Cart::add([$product1, $product2]);
	var_dump($add); // CartItem
    echo '<hr />';

});
