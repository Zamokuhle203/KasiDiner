const orderItems = [];
const orderList = document.querySelector('.listCard');
const total = document.querySelector('.total');

// Attach event listeners to each menu category by their unique IDs
document.getElementById('fullmeals').addEventListener('click', handleMenuClick);
document.getElementById('fastfood').addEventListener('click', handleMenuClick);
document.getElementById('dessert').addEventListener('click', handleMenuClick);
document.getElementById('drinks').addEventListener('click', handleMenuClick);

// Event handler function for all menu categories, calling the add-to-cart and updateQuantity methods
function handleMenuClick(event) {
    const target = event.target;

    // Check if the clicked element is a button with the specified class
    if (target.classList.contains('add-to-cart')) {
        addToCart(target);
    } else if (target.classList.contains('minus') || target.classList.contains('plus')) {
        updateQuantity(target);
    }
}

//Add-to-cart method, when the add-to-cart button is clicked the menu item is inserted in the orderList and
//shown in the order summary
function addToCart(clickedButton) {
    // Get the details of the meal item based on the button's parent element
    const mealItem = clickedButton.closest('.box');
    const mealName = mealItem.querySelector('h3').textContent;
    const mealPrice = mealItem.querySelector('.price dd').textContent;
    const quantity = parseInt(mealItem.querySelector('.item-quantity').textContent);
    const mealImageSrc = mealItem.querySelector('img').src;

    // Calculate the total price for this item
    const totalPrice = (parseFloat(mealPrice.replace('R', '')) * quantity).toFixed(2);

    // Create an object representing the order item
    const orderItem = {
        name: mealName,
        price: mealPrice,
        quantity: quantity,
        total: totalPrice,
        imageSrc: mealImageSrc
    };

    const existingItemIndex = orderItems.findIndex(item => item.name === orderItem.name);

    if (existingItemIndex === -1 && orderItem.quantity > 0) {
        // Item not in cart, add it
        orderItems.push(orderItem);
    } else if (orderItem.quantity === 0) {
        // Remove the item from the cart
        if (existingItemIndex !== -1) {
            orderItems.splice(existingItemIndex, 1);
        }
    } else {
        // Update quantity if item already in cart
        orderItems[existingItemIndex].quantity = orderItem.quantity;
        orderItems[existingItemIndex].total = totalPrice;
    }

    // Update the order summary
    updateOrderSummary();
}

//updating contents of the order summary or orderList in the myaccount.php
function updateOrderSummary() {
    orderList.innerHTML = '';
    let totalPrice = 0;

    orderItems.forEach(orderItem => {
        const listItem = document.createElement('li');
        listItem.innerHTML = `
            <img src="${orderItem.imageSrc}" alt="${orderItem.name}" width="60px" height="60px">
            <span>${orderItem.name}    </span>
            <span>${orderItem.quantity}    </span>
            <span>R${orderItem.total}</span>
        `;
        orderList.appendChild(listItem);
        totalPrice += parseFloat(orderItem.total);
    });

    total.textContent = totalPrice.toFixed(2);
}

//plus and minus buttons clicked to update the quantities of the menu-item
function updateQuantity(button) {
    // Get the corresponding menu item element
    const menuItem = button.closest('.box');

    // Get the quantity element
    const quantityElement = menuItem.querySelector('.item-quantity');

    // Get the current quantity value
    let quantity = parseInt(quantityElement.textContent);

    // Update the quantity based on the action
    if (button.classList.contains('plus')) {
        quantity++;
    } else if (button.classList.contains('minus') && quantity > 0) {
        quantity--;
    }

    // Update the quantity element
    quantityElement.textContent = quantity;
}

// Additional code for opening and closing the shopping cart
const openShopping = document.querySelector('.shopping');
const closeShopping = document.querySelector('.closeShopping');
const body = document.body;


//closing and opening the shopping bag in 
openShopping.addEventListener('click', () => {
    body.classList.add('active');
});

closeShopping.addEventListener('click', () => {
    body.classList.remove('active');
});

// Add a click event listener for the shopping.svg image
const shoppingImage = document.querySelector('.shopping img');
shoppingImage.addEventListener('click', (event) => {
    // Prevent the default behavior of the image (e.g., navigation)
    event.preventDefault();
    // Add or remove the 'active' class to open/close the shopping cart
    body.classList.toggle('active');
});


function activeBar() {
    document.addEventListener("DOMContentLoaded", function () {
        // Get the navigation container
        const nav = document.getElementById("mySidenav");

        if (nav) {
            // Add a click event listener to the navigation
            nav.addEventListener("click", function (event) {
                if (event.target.classList.contains("menu")) {
                    // Remove the "active" class from all links
                    const links = nav.querySelectorAll(".menu");
                    links.forEach(function (link) {
                        link.classList.remove("active");
                    });

                    // Add the "active" class to the clicked link
                    event.target.classList.add("active");
                }
            });
        }
    });
}

activeBar();

// Update the submitOrder function to send a POST request with order details
function submitOrder() {
    const userEmail = document.getElementById('userEmail').value;
    const orderDetails = JSON.stringify(orderItems);

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the URL of the PHP script that handles the order submission
    var url = "submit_order.php";

    // Create a callback function to handle the response from the server
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle the response from the server (if needed)
            alert(xhr.responseText); // You can replace this with a better user message
        }
    };

    // Set up the request
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the order data to the server
    xhr.send("userEmail=" + userEmail + "&orderDetails=" + orderDetails);
}

// Add a click event listener to the "Submit" button
document.querySelector(".submitOrder").addEventListener("click", submitOrder);

  