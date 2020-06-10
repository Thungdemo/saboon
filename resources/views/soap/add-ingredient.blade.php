<tr>
    <td>
    	{!! Form::select("ingredient[$rowId][ingredient_id]",$ingredients,old("ingredient.$rowId.ingredient_id",isset($soapIngredient) ? $soapIngredient->ingredient_id : null),['class'=>'form-control','placeholder'=>'Select Ingredient']) !!}
    	<span class="error">{{$errors->first("ingredient.$rowId.ingredient_id")}}</span>
    </td>
    <td>
    	{!! Form::text("ingredient[$rowId][quantity]",old("ingredient.$rowId.quantity",isset($soapIngredient) ? $soapIngredient->quantity : null),['class'=>'form-control']) !!}
    	<span class="error">{{$errors->first("ingredient.$rowId.quantity")}}</span>
    </td>
    <td>
    	<button type="button" class="btn btn-sm btn-danger remove-ingredient">Remove</button>
    </td>
</tr>