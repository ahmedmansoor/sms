// edit User details
var modalAddStock = document.getElementById('modalAddStock');
function btnModalAddStock(id, name) {

    $id = document.getElementById('id');
    $id.value = id;

    $name = document.getElementById('name');
    $name.value = name; 
    
}

// edit User details
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