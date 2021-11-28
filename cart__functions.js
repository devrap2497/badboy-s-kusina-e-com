/*var _0x1c74=['json','479sVcoOM','#product_price','querySelectorAll','289198mPyYSh','.delete','Invalid\x20Quantity.','4271wqHkhw','888433ooLntS','fail','remove','38743BGNIwQ','val','#displayCheckout','1OIuWDz','forEach','#product_name','addEventListener','8ftyCae','click','responseText','ajax','#product_quantity','832499PnYpje','.add_cart','data','111698hcTkXK','390694JesfRI','POST','add','35YGPdfi','1OSEXFV','./cart.php','html'];function _0x3c59(_0x566dcb,_0x527431){return _0x3c59=function(_0x1c7456,_0x3c5909){_0x1c7456=_0x1c7456-0xa6;var _0x26007b=_0x1c74[_0x1c7456];return _0x26007b;},_0x3c59(_0x566dcb,_0x527431);}(function(_0x23cbeb,_0x447ba8){var _0x4aea7a=_0x3c59;while(!![]){try{var _0x3394d2=parseInt(_0x4aea7a(0xc5))*parseInt(_0x4aea7a(0xbd))+parseInt(_0x4aea7a(0xc2))+-parseInt(_0x4aea7a(0xa8))*parseInt(_0x4aea7a(0xb3))+parseInt(_0x4aea7a(0xc6))*-parseInt(_0x4aea7a(0xb9))+-parseInt(_0x4aea7a(0xaf))+parseInt(_0x4aea7a(0xb6))*-parseInt(_0x4aea7a(0xa7))+parseInt(_0x4aea7a(0xb2))*parseInt(_0x4aea7a(0xac));if(_0x3394d2===_0x447ba8)break;else _0x23cbeb['push'](_0x23cbeb['shift']());}catch(_0x4cf39a){_0x23cbeb['push'](_0x23cbeb['shift']());}}}(_0x1c74,0xceeca),$(document)['ready'](function(){var _0x4998f3=_0x3c59;alldeleteBtn=document[_0x4998f3(0xae)]('.delete'),alldeleteBtn[_0x4998f3(0xba)](_0x108a96=>{var _0x55f327=_0x4998f3;_0x108a96[_0x55f327(0xbc)]('click',_0x5767cf);});function _0x5767cf(){var _0x7c23b5=_0x4998f3;removable_id=this['id'],$['ajax']({'url':_0x7c23b5(0xa9),'method':_0x7c23b5(0xc7),'dataType':_0x7c23b5(0xab),'data':{'id_to_remove':removable_id,'action':_0x7c23b5(0xb5)},'success':function(_0x3e791a){var _0x2242df=_0x7c23b5;$(_0x2242df(0xb8))['html'](_0x3e791a),alldeleteBtn=document['querySelectorAll'](_0x2242df(0xb0)),alldeleteBtn[_0x2242df(0xba)](_0x4fefde=>{var _0x1cd668=_0x2242df;_0x4fefde[_0x1cd668(0xbc)](_0x1cd668(0xbe),_0x5767cf);});}})['fail'](function(_0x4323c9,_0x1ad4fa,_0x3a3598){alert(_0x4323c9['responseText']);});}$(_0x4998f3(0xc3))[_0x4998f3(0xbe)](function(){var _0x6d0634=_0x4998f3;id=$(this)[_0x6d0634(0xc4)]('id'),name=$(_0x6d0634(0xbb)+id)[_0x6d0634(0xb7)](),price=$(_0x6d0634(0xad)+id)[_0x6d0634(0xb7)](),quantity=$(_0x6d0634(0xc1)+id)[_0x6d0634(0xb7)]();if(quantity<0x1)alert(_0x6d0634(0xb1));else $[_0x6d0634(0xc0)]({'url':_0x6d0634(0xa9),'method':'POST','dataType':'json','data':{'cart_id':id,'cart_name':name,'cart_price':price,'cart_quantity':quantity,'action':_0x6d0634(0xa6)},'success':function(_0x2f4fdc){var _0x254610=_0x6d0634;$(_0x254610(0xb8))[_0x254610(0xaa)](_0x2f4fdc),alldeleteBtn=document[_0x254610(0xae)](_0x254610(0xb0)),alldeleteBtn[_0x254610(0xba)](_0x3686f2=>{var _0x514bb8=_0x254610;_0x3686f2['addEventListener'](_0x514bb8(0xbe),_0x5767cf);});}})[_0x6d0634(0xb4)](function(_0x46bfc7,_0x3bbc36,_0x10b48){var _0x3047ae=_0x6d0634;alert(_0x46bfc7[_0x3047ae(0xbf)]);});});}));

*/









// cart__functions not encrypted

      $(document).ready(function() {
        alldeleteBtn = document.querySelectorAll('.delete')
        alldeleteBtn.forEach(onebyone => {
        onebyone.addEventListener('click',deleteINsession)
             })

    function deleteINsession(){
        removable_id = this.id;
        $.ajax({
                    url:'cart.php',
                    method:'POST',
                    dataType:'json',
                    data:{ 
                    id_to_remove:removable_id,
                    action:'remove' 
                    },
                    success:function(data){
                            $('#displayCheckout').html(data);
                alldeleteBtn = document.querySelectorAll('.delete')
                alldeleteBtn.forEach(onebyone => {
                onebyone.addEventListener('click',deleteINsession)
             })
                          }
                  }).fail( function(xhr, textStatus, errorThrown) {
            alert(xhr.responseText);
        });

    } 
        $(document).on('click', '.add_cart', function () {
          id = $(this).data('id');
          name = $('#product_name' + id).val()
          price = $('#product_price' + id).val()
          quantity = $('#product_quantity' + id).val()

          if(quantity < 1) {
            alert("Invalid Quantity.");
          }
          else 
          $.ajax({
            url:'cart.php',
            method:'POST',
            dataType:'json',
            data:{
              cart_id: id,
              cart_name : name,
              cart_price : price,
              cart_quantity : quantity,
              action:'add'
            },
                success:function(data){
                            $('#displayCheckout').html(data);
                            alldeleteBtn = document.querySelectorAll('.delete')
             alldeleteBtn.forEach(onebyone => {
                onebyone.addEventListener('click',deleteINsession)
             })
                          }
          }).fail(function(xhr, textStatus, errorThrown){
            alert(xhr.responseText);
          
          });
        })

        $(document).on('click', '.decrement_cart', function () {
          id = $(this).data('id');
          name = $('#product_name' + id).val()
          price = $('#product_price' + id).val()
          quantity = $('#product_quantity' + id).val()

          if(quantity < 1) {
            alert("Invalid Quantity.");
          }
          else 
          $.ajax({
            url:'cart.php',
            method:'POST',
            dataType:'json',
            data:{
              cart_id: id,
              cart_name : name,
              cart_price : price,
              cart_quantity : quantity,
              action:'decrement'
            },
                success:function(data){
                            $('#displayCheckout').html(data);
                            alldeleteBtn = document.querySelectorAll('.delete')
             alldeleteBtn.forEach(onebyone => {
                onebyone.addEventListener('click',deleteINsession)
             })
                          }
          }).fail(function(xhr, textStatus, errorThrown){
            alert(xhr.responseText);
          
          });
        })
        
      }
    )



// increment / decrement not encrypted

var btnIncrement = document.getElementsByClassName('btn_increment');
var btnDecrement = document.getElementsByClassName('btn_decrement');

//INCREMENT
for(var i = 0; i < btnIncrement.length; i++) {
  var button = btnIncrement[i];
  button.addEventListener('click', function(event) {

      var buttonClicked = event.target;
      event.preventDefault();
      var input = buttonClicked.parentElement.children[4];
      var inputValue = input.value;
      var newValue = parseInt(inputValue) +1;

      input.value = newValue;

  })
}
//DECREMENT
  for(var i = 0; i < btnDecrement.length; i++) {
  var button = btnDecrement[i];
  button.addEventListener('click', function(event) {
      event.preventDefault();
      var buttonClicked = event.target;
      var input = buttonClicked.parentElement.children[4];
      var inputValue = input.value;
      var newValue = parseInt(inputValue) -1;

      if(newValue >= 1 ) {
        input.value = newValue;
      }



  })
}


