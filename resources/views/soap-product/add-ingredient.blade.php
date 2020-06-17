<tr>
	<td>
		{!! Form::select("ingredients[$rowId][ingredient_id]",$ingredients,old("ingredients.$rowId.ingredient_id",isset($soapIngredient) ? $soapIngredient->ingredient_id : null),['class'=>'form-control','placeholder'=>'Select Ingredient']) !!}
		<span class="error">{{$errors->first("ingredients.$rowId.ingredient_id")}}</span>
	</td>
	<td>
		{!! Form::text("ingredients[$rowId][quantity]",old("ingredients.$rowId.quantity",isset($soapIngredient) ? $soapIngredient->quantity : null),['class'=>'form-control']) !!}
		<span class="error">{{$errors->first("ingredients.$rowId.quantity")}}</span>
	</td>
	<td><button type="button" class="btn btn-sm btn-danger remove-ingredient">Remove</button></td>
</tr>