@foreach($soap->soapIngredients as $soapIngredient)
@include('soap-product.add-ingredient',[
	'ingredients'=>$ingredients,
	'soapIngredient'=>$soapIngredient,
	'rowId' => uniqid()
])
@endforeach
