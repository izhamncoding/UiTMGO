var total, display;
var count = 0;
var getList = [];
var getID = [];
var getQuantity = [];

function quantity(target){
    target.name = target.value;
}

function storeID(target){
    createCookie("storeID",target.id,"10");
    createCookie("vendorID",target.value,"10");
}

function redirect() {
    setTimeout(function () {
        window.location.href = "addcart.php";
    }, 5000);

    var timeleft = 5;
    var downloadTimer = setInterval(function () {
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            document.getElementById("count").innerHTML = "Finished";
        } else {
            document.getElementById("count").innerHTML = timeleft + " seconds";
        }
        timeleft -= 1;
    }, 1000);
}

function displayCheckOut() {
    var testList = JSON.parse(localStorage.getItem("value"));
    var totalPrice = localStorage.getItem("price");
    var text = "",
        item,
        price;

    const cart = document.querySelector("#cart");
    const total = document.querySelector("#total");

    for (var i = 0; i < testList.length; i++) {
        item = testList[i].substr(0, testList[i].search("RM") - 1);
        price = testList[i].substr(testList[i].search("RM"), 8);

        var cartLast = '<div style="padding: 2% 10% 5% 15%" id="cart"><div><div style="float: left;font-size:15px">' + item + '</div><div style="float: right;font-size:15px">' + price + '</div></div></div>';

        cart.insertAdjacentHTML('beforeend', cartLast);
    }

    var totalList = '<p style="float: right;font-size: 20px;margin: 2% 0%" id="total"> RM ' + totalPrice + '</p>';
    total.insertAdjacentHTML('afterend', totalList);    
}

function createCookie(name, value, days) {
    var expires;
      
    if (days) { 
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = escape(name) + "=" + 
        escape(value) + expires + "; path=/";
}

function checkStatus(clicked_id){
    createCookie("ID",clicked_id,"10");
}

function check() {
    var price,
        item;

    var test = "";
    var quantity = "";
    var text = "";
    var passID = "";

    localStorage.setItem("price", total.innerText);
    
    for (var i = 0; i < display.length; i++) {
        item = display[i].innerText.substr(0, display[i].innerText.search("RM") - 1);
        price = display[i].innerText.substr(display[i].innerText.search("RM"), 10);
        
        quantity += document.getElementById("cd-product-" + getID[i].substr(getID[i].search("cd-product-") + 11, 5)).name + ";";
        passID += getID[i].substr(getID[i].search("cd-product-") + 11, 5) + ";";
        getList[i] = item + " " + price;
    }   
    
    localStorage.setItem("value", JSON.stringify(getList));
    var passPrice = localStorage.getItem("price");
    
    createCookie("quantity",quantity,"10");
    createCookie("total",passPrice,"10");
    createCookie("getID", passID, "10");
    window.location.href = "addcart.php";
    display = [0];
}
  

(function () {
    // Add to Cart Interaction - by CodyHouse.co
    var cart = document.getElementsByClassName('js-cd-cart');
    if (cart.length > 0) {
        var cartAddBtns = document.getElementsByClassName('js-cd-add-to-cart'),
            cartBody = cart[0].getElementsByClassName('cd-cart__body')[0],
            cartList = cartBody.getElementsByTagName('ul')[0],
            cartListItems = cartList.getElementsByClassName('cd-cart__product'),
            cartTotal = cart[0].getElementsByClassName('cd-cart__checkout')[0].getElementsByTagName('span')[0],
            cartCount = cart[0].getElementsByClassName('cd-cart__count')[0],
            cartCountItems = cartCount.getElementsByTagName('li'),
            cartUndo = cart[0].getElementsByClassName('cd-cart__undo')[0],
            productId = 0, //this is a placeholder -> use your real product ids instead
            cartTimeoutId = false,
            animatingQuantity = false,
            count = 0;

        initCartEvents();

        function initCartEvents() {
            // add products to cart
            for (var i = 0; i < cartAddBtns.length; i++) {
                (function (i) {
                    cartAddBtns[i].addEventListener('click', addToCart);
                })(i);
            }

            // open/close cart
            cart[0].getElementsByClassName('cd-cart__trigger')[0].addEventListener('click', function (event) {
                event.preventDefault();
                toggleCart();
            });

            cart[0].addEventListener('click', function (event) {
                if (event.target == cart[0]) { // close cart when clicking on bg layer
                    toggleCart(true);
                } else if (event.target.closest('.cd-cart__delete-item')) { // remove product from cart
                    event.preventDefault();
                    removeProduct(event.target.closest('.cd-cart__product'));
                }
            });

            // update product quantity inside cart
            cart[0].addEventListener('change', function (event) {
                if (event.target.tagName.toLowerCase() == 'select') quickUpdateCart();
            });

            //reinsert product deleted from the cart
            cartUndo.addEventListener('click', function (event) {
                if (event.target.tagName.toLowerCase() == 'a') {
                    event.preventDefault();
                    if (cartTimeoutId) clearInterval(cartTimeoutId);
                    // reinsert deleted product
                    var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted')[0];
                    Util.addClass(deletedProduct, 'cd-cart__product--undo');
                    deletedProduct.addEventListener('animationend', function cb() {
                        deletedProduct.removeEventListener('animationend', cb);
                        Util.removeClass(deletedProduct, 'cd-cart__product--deleted cd-cart__product--undo');
                        deletedProduct.removeAttribute('style');
                        quickUpdateCart();
                    });
                    Util.removeClass(cartUndo, 'cd-cart__undo--visible');
                }
            });
        };


        function addToCart(event) {
            event.preventDefault();
            if (animatingQuantity) return;
            var cartIsEmpty = Util.hasClass(cart[0], 'cd-cart--empty');
            //update cart product list
            addProduct(this);
            //update number of items 
            updateCartCount(cartIsEmpty);
            //update total price
            updateCartTotal(this.getAttribute('data-price'), true);
            //show cart
            Util.removeClass(cart[0], 'cd-cart--empty');
        };

        function toggleCart(bool) { // toggle cart visibility
            var cartIsOpen = (typeof bool === 'undefined') ? Util.hasClass(cart[0], 'cd-cart--open') : bool;

            if (cartIsOpen) {
                Util.removeClass(cart[0], 'cd-cart--open');
                //reset undo
                if (cartTimeoutId) clearInterval(cartTimeoutId);
                Util.removeClass(cartUndo, 'cd-cart__undo--visible');
                removePreviousProduct(); // if a product was deleted, remove it definitively from the cart

                setTimeout(function () {
                    cartBody.scrollTop = 0;
                    //check if cart empty to hide it
                    if (Number(cartCountItems[0].innerText) == 0) Util.addClass(cart[0], 'cd-cart--empty');
                }, 500);
            } else {
                Util.addClass(cart[0], 'cd-cart--open');
            }
        };

        function addProduct(target) {
            // this is just a product placeholder
            // you should insert an item with the selected product info
            // replace productId, productName, price and url with your real product info
            // you should also check if the product was already in the cart -> if it is, just update the quantity
            // this is just a product placeholder
            // you should insert an item with the selected product info
            // replace productId, productName, price and url with your real product info
            // you should also check if the product was already in the cart -> if it is, just update the quantity
            var productName = target.innerText.substr(0,target.innerText.search("RM"));
            var productPrice = target.innerText.substr(target.innerText.search("RM"), target.innerText.search("Add") - target.innerText.search("RM"));
            var productId = target.id;
            var productImage = target.innerHTML.substr(target.innerHTML.search("id=")+4, target.innerHTML.search("RM") - target.innerHTML.search("id=") - 6);
            
            var productAdded = '<li class="cd-cart__product"><div class="cd-cart__image"><a href="#0"><img src="Images/'+ productImage + '" alt="placeholder"></a></div><div class="cd-cart__details"><h3 class="truncate"><a href="#0">' + productName + '</a></h3><span class="cd-cart__price">' + productPrice + '</span><div class="cd-cart__actions"><a href="#0" class="cd-cart__delete-item">Delete</a><div class="cd-cart__quantity"><label for="cd-product-' + productId + '">Qty</label><span class="cd-cart__select"><select class="reset" onchange="quantity(this)" id="cd-product-' + productId + '" name="1"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select><svg class="icon" viewBox="0 0 12 12"><polyline fill="none" stroke="currentColor" points="2,4 6,8 10,4 "/></svg></span></div></div></div></li>';
            
            cartList.insertAdjacentHTML('beforeend', productAdded);
            getID[count] = productAdded;
            total = cartTotal;
            display = cartListItems;
            count++;
        };

        function removeProduct(product) {
            if (cartTimeoutId) clearInterval(cartTimeoutId);
            removePreviousProduct(); // prduct previously deleted -> definitively remove it from the cart

            var topPosition = product.offsetTop,
                productQuantity = Number(product.getElementsByTagName('select')[0].value),
                productTotPrice = Number((product.getElementsByClassName('cd-cart__price')[0].innerText).replace('RM', '')) * productQuantity;

            product.style.top = topPosition + 'px';
            Util.addClass(product, 'cd-cart__product--deleted');

            //update items count + total price
            updateCartTotal(productTotPrice, false);
            updateCartCount(true, -productQuantity);
            Util.addClass(cartUndo, 'cd-cart__undo--visible');

            //wait 8sec before completely remove the item
            cartTimeoutId = setTimeout(function () {
                Util.removeClass(cartUndo, 'cd-cart__undo--visible');
                removePreviousProduct();
            }, 8000);
        };

        function removePreviousProduct() { // definitively removed a product from the cart (undo not possible anymore)
            var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted');
            if (deletedProduct.length > 0) deletedProduct[0].remove();
        };

        function updateCartCount(emptyCart, quantity) {
            if (typeof quantity === 'undefined') {
                var actual = Number(cartCountItems[0].innerText) + 1;
                var next = actual + 1;

                if (emptyCart) {
                    cartCountItems[0].innerText = actual;
                    cartCountItems[1].innerText = next;
                    animatingQuantity = false;
                } else {
                    Util.addClass(cartCount, 'cd-cart__count--update');

                    setTimeout(function () {
                        cartCountItems[0].innerText = actual;
                    }, 150);

                    setTimeout(function () {
                        Util.removeClass(cartCount, 'cd-cart__count--update');
                    }, 200);

                    setTimeout(function () {
                        cartCountItems[1].innerText = next;
                        animatingQuantity = false;
                    }, 230);
                }
            } else {
                var actual = Number(cartCountItems[0].innerText) + quantity;
                var next = actual + 1;

                cartCountItems[0].innerText = actual;
                cartCountItems[1].innerText = next;
                animatingQuantity = false;
            }
        };

        function updateCartTotal(price, bool) {
            cartTotal.innerText = bool ? (Number(cartTotal.innerText) + Number(price)).toFixed(2) : (Number(cartTotal.innerText) - Number(price)).toFixed(2);
        };

        function quickUpdateCart() {
            var quantity = 0;
            var price = 0;

            for (var i = 0; i < cartListItems.length; i++) {
                if (!Util.hasClass(cartListItems[i], 'cd-cart__product--deleted')) {
                    var singleQuantity = Number(cartListItems[i].getElementsByTagName('select')[0].value);
                    quantity = quantity + singleQuantity;
                    price = price + singleQuantity * Number((cartListItems[i].getElementsByClassName('cd-cart__price')[0].innerText).replace('RM', ''));
                }
            }

            cartTotal.innerText = price.toFixed(2);
            cartCountItems[0].innerText = quantity;
            cartCountItems[1].innerText = quantity + 1;
        };
    }
})();
