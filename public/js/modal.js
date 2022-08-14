var modalAddStock = document.getElementById('modalAddStock');
function btnModalAddStock(id, name) {
    // console.log(id, name);
    $id = document.getElementById('itemId');
    $id.value = id;
    
    $name = document.getElementById('itemName');
    $name.value = name; 
}


var modalPlaceOrder = document.getElementById('modalPlaceOrder');
function btnModalPlaceOrder(id, name, qty) {

    $id = document.getElementById('orderId');
    $id.value = id;

    $name = document.getElementById('orderName');
    $name.value = name; 

    $qty = document.getElementById('orderQty');
    $qty.innerHTML = qty;
    // $qty.value = qty; 
    
}