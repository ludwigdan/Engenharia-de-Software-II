QUnit.test( "Primeiro teste com QUnit", function( assert ) {
 $('input[name^=lucro]').val(100);
 $('input[name^=quantidadeIngrediente]').val(1);
 $('input[name^=precoItem]').val(10);
 $('input[name^=precoUnitario]').val(10);
 $( "#lucro" ).trigger( "change" );
 assert.ok( $('input[name^=precovenda]').val() == "20", "Passou!" );
});