let carts = document.querySelectorAll('.add-cart');

let products = [
	{
		name: "Food",
		tag: '24',
		price: 'cant buy',
		inCart: 0
	}
];


for(let i=0; i<carts.length; i++) {
		carts[i].addEventListener('click', () => {
		cartNumbers(products[i]);
	})
}
function onLoadCartNumbers() {
	let productNumbers = localStorage.getItem('cartNubmers');

	if(productNumbers) {
		document.querySelector('.shopping-cart span').textContent = productNumbers;
	}
}

function cartNumbers(product) {
	let productNumbers = localStorage.getItem('cartNubmers');
	var buttonClicked = event.target;
    event.preventDefault();

    var input = buttonClicked.parentElement.children[4];
    var inputValue = input.value;

    inputValue = parseInt(inputValue);
	productNumbers = parseInt(productNumbers);
	localStorage.setItem('cartNubmers', inputValue);

	if(productNumbers) {
		localStorage.setItem('cartNubmers', productNumbers + inputValue);
		document.querySelector('.shopping-cart span').textContent = productNumbers + inputValue ;
	} else {
		localStorage.setItem('cartNubmers', 1);
		document.querySelector('.shopping-cart span').textContent = inputValue;
	}

	setItems(product);
}

function setItems(product) {
	let cartItems = localStorage.getItem('productsInCart');
	cartItems = JSON.parse(cartItems);

	if(cartItems != null) {
		cartItems[products.tag].inCart += 1;
	}
	products.inCart = 1;
	cartItems = {
		[products.tag]: product
	}

	localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}
onLoadCartNumbers();