<?php 
namespace App;
use \Gloudemans\Shoppingcart\Contracts\Buyable;

class Product implements Buyable{

	public $id;
	public $name;
	public $price;
	public $options;

	// array fixo no lugar de base de dados
	private $products = [
		['id'=>'1','name'=>'Ingresso','price'=>99.90,'options'=>[]],
		['id'=>'2','name'=>'Ingresso com ocupante','price'=>99.90,'options'=>['ocupante_nome'=>'NOME','ocupante_tipodoc'=>'TIPODOC','ocupante_doc'=>'DOC']],
		['id'=>'3','name'=>'Ingresso mais caro','price'=>199.90,'options'=>[]],
		['id'=>'3','name'=>'Ingresso premium','price'=>399.90,'options'=>[]]
	];

	public function __construct($id){
		$indice=$id;
		$this->id      = $this->products[$indice]['id'];
		$this->name    = $this->products[$indice]['name'];
		$this->price   = $this->products[$indice]['price'];
		$this->options = $this->products[$indice]['options'];

		return $this;
	}

	public function getBuyableIdentifier($options = null){
		return $this->id;
	}

	public function getBuyableDescription($options = null){
		return $this->name;

	}

	public function getBuyablePrice($options = null){
		return $this->price;

	}
} 