let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
//let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

// Attach event listeners to each menu category by their unique IDs
document.getElementById('fullmeals').addEventListener('click', handleMenuClick);
document.getElementById('fastfood').addEventListener('click', handleMenuClick);
document.getElementById('dessert').addEventListener('click', handleMenuClick);
document.getElementById('drinks').addEventListener('click', handleMenuClick);

// Event handler function for all menu categories
function handleMenuClick(event) {
    var target = event.target;

    // Check if the clicked element is a button with the specified class
    if (target.classList.contains('add-to-cart')) {
        addToCart(target);
    } else if (target.classList.contains('minus') || target.classList.contains('plus')) {
        updateQuantity(target);
    }
}


function updateQuantity(button) {
    // Get the corresponding menu item element
    var menuItem = button.closest('.box');

    // Get the quantity element
    var quantityElement = menuItem.querySelector('.item-quantity');

    // Get the current quantity value
    var quantity = parseInt(quantityElement.textContent);

    // Update the quantity based on the action
    if (button.classList.contains('plus')) {
        quantity++;
    } else if (button.classList.contains('minus') && quantity > 0) {
        quantity--;
    }

    // Update the quantity element
    quantityElement.textContent = quantity;
}

//======================== CREATING LIST OF ORDERS========================
// Define a variable to keep track of the order items
const orderItems = [];

// Attach a click event listener to all "Add to Cart" buttons
const addToCartButtons = document.querySelectorAll('.add-to-cart');
addToCartButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        // Get the details of the meal item based on its index
        const mealName = document.querySelectorAll('.box h3')[index].textContent;
        const mealPrice = document.querySelectorAll('.box .price dd')[index].textContent;
        const quantity = parseInt(document.querySelectorAll('.box .item-quantity')[index].textContent);

        // Calculate the total price for this item
        let totalPrice = (parseFloat(mealPrice.replace('R', '')) * quantity).toFixed(2);
        
        // Create an object representing the order item
        const orderItem = {
            name: mealName,
            price: mealPrice,
            quantity: quantity,
            total: totalPrice
        };
        const itemToFind = orderItem;
        const foundObject = orderItems.find((obj) => (
            obj.name === itemToFind.name &&
            obj.quantity === itemToFind.quantity &&
            obj.price === itemToFind.price
        ));
        if (!foundObject && orderItem.quantity > 0) {
            orderItems.push(orderItem);
            const orderList = document.querySelector('.listCard');
            const listItem = document.createElement('li');

            listItem.innerHTML = `

                <span>${orderItem.name}</span>
                <span>${orderItem.quantity}</span>
                <span>${orderItem.price}</span>
                <span>${orderItem.total}</span>
            `;

            total.innerHTML = totalPrice;
            orderList.appendChild(listItem);
        }
              /*
        else{
            //orderItem.quantity = foundObject.quantity;
            listItem.innerHTML = `

                <span>${orderItem.name}</span>
                <span>${orderItem.quantity}</span>
                <span>${orderItem.price}</span>
                <span>${orderItem.total}</span>
            `;

            total.innerHTML = totalPrice;
            orderList.appendChild(listItem);
       }*/
       
        
    });
});


let openShopping = document.querySelector('.shopping');
    let closeShopping = document.querySelector('.closeShopping');
    let body = document.body; // Define body here

    openShopping.addEventListener('click', () => {
        body.classList.add('active');
    });

    closeShopping.addEventListener('click', () => {
        body.classList.remove('active');
    });

    // Add a click event listener for the shopping.svg image
    let shoppingImage = document.querySelector('.shopping img');
    shoppingImage.addEventListener('click', (event) => {
        // Prevent the default behavior of the image (e.g., navigation)
        event.preventDefault();
        // Add or remove the 'active' class to open/close the shopping cart
        body.classList.toggle('active');
    });

//============== NAVIGATION ACTIVE BARS FOR MYACCOUNT==================

/*var header = document.querySelector(".navbar");
var menu = header.getElementsByTagName("a");

for (var i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", function () {
        var current = header.getElementsByClassName("active");
        if (current.length > 0) {
            current[0].classList.remove("active");
        }
        this.classList.add("active");
    });
}

*/



/*======================= SIGN IN SECTION - FORM VALIDATIION ========================= */
function clicks() {
    window.location.href = 'myaccount.html';
}

function formValSignIn() {
    const submitButton = document.getElementById('button');
    const Username = document.getElementById('email').value;
    const Password = document.getElementById('password').value;
    

    if(Username =="" || Password==""){
        
        submitButton.style.backgroundColor = 'red';
        alert("Enter log in details");
        
        return false;
    }
    if (Password.length != 7 ) {
        submitButton.style.backgroundColor = 'red';
        alert("Password is incorrect");
        return false;
    } 
    
    
    else {
        submitButton.style.backgroundColor = 'green';
        clicks();
        return false;
    } 
}

//========================= CREATE ACCOUNT FORM ===================

function createclicks() {
    window.location.href = 'signin.html';
}

function formValCreate() {
    const createButton = document.getElementById('createbutton');
    
    
    const CreatePassword = document.getElementById('createpassword').value;
    const ConfirmPassword = document.getElementById('confirmPassword').value;

    if(CreatePassword==""){
        
        createButton.style.backgroundColor = 'red';
        alert("Enter log in details");
        
        return false;
    }
    if (CreatePassword.length != 7 ) {
        createButton.style.backgroundColor = 'red';
        alert("Password is incorrect");
        return false;
    } 
    if(CreatePassword != ConfirmPassword){
        alert("Password does not match");
        return false;
    }
    
    else {
        createButton.style.backgroundColor = 'green';
        createclicks();
        return false;
    } 
}


//==========================SLIDE SHOW IN THE GALLERY SECTION====================
// Variables to keep track of the current slide and total number of slides
let currentSlide = 0;
const totalSlides = document.querySelectorAll('.slide').length;

// Function to update the slide position
function updateSlidePosition() {
    const slider = document.querySelector('.slider');
    const slideWidth = slider.clientWidth;
    slider.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}

// Function to handle automatic sliding
function autoSlide() {
    if (currentSlide === totalSlides - 1) {
        currentSlide = 0;
    } else {
        currentSlide++;
    }
    updateSlidePosition();
}

// Set an interval for automatic sliding (adjust the time as needed)
setInterval(autoSlide, 1000);

// Function to handle slide navigation when control labels are clicked
document.querySelectorAll('.slider-controls label').forEach((label, index) => {
    label.addEventListener('click', () => {
        currentSlide = index;
        updateSlidePosition();
    });
});

// Initial update of the slide position
updateSlidePosition();

/*======================= ANIMATION =================*/
function animate(){
    const image = document.getElementById('animate-image');
    const bounceHeight = 20;
    const animationDuration = 1000;
    
    function bounce(){
        let currentPosition = 0;
        let direction = 1;
    
        function animate(){
            currentPosition += direction;
            image.style.top = currentPosition + 'px';
    
            if(currentPosition >= bounceHeight){
                direction = -1;
            }
    
            if (currentPosition <= 0){
                direction = 1;
            }
    
            requestAnimationFrame(animate);
        }
        animate();
    }
    
    // Start the bounce animation when the page loads
    window.addEventListener('load', () => {
        setTimeout(bounce, animationDuration);
    });
}
animate();

/*==================== BACKGROUND STYLING ==========================*/
function styling(){
    const btns = document.getElementsByClassName('btn');
    btns.style.backgroundColor = 'yellowgreen';
    
    const Sbody = document.getElementById("about");
    Sbody.style.backgroundColor = 'lightgrey';
}

styling();

//===============================BROWSER CONTENTS========================
// Browser Language
let language = window.navigator.language;
document.write("Browser Language: " + language + "<br>");

// Browser Name (Code Name)
let browser = window.navigator.appName;
document.write("Browser Code Name: " + browser + "<br>");
// Browser Version
let version = window.navigator.appVersion;
document.write("Browser Version: " + version + "<br>");
// Browser Engine
let engine = window.navigator.product;
document.write("Browser Engine: " + engine + "<br>");


// Platform
let platform = window.navigator.platform;
document.write("Platform: " + platform + "<br>");

// User Agent
let userAgent = window.navigator.userAgent;
document.write("User-agent header: " + userAgent + "<br>");

//############## Number 2 #####################
//navigator object methods

// Get the user's current location using the geolocation method of the navigator object
navigator.geolocation.getCurrentPosition(function(position) {
    document.write("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
});

// Check if the user's browser supports cookies using the cookieEnabled property of the navigator object
if (navigator.cookieEnabled) {
    document.write("Cookies are enabled in this browser.");
} else {
    document.write("Cookies are not enabled in this browser.");
}



//=================== DROPDOWN MENU===========================
function dropdown(){
    document.addEventListener('DOMContentLoaded', function() {
        const popularLink = document.getElementById('populardrop');
        const dropdown = document.getElementById('dropdown');
    
        popularLink.addEventListener('mouseover', function() {
            dropdown.style.display = 'block';
        });
    
        popularLink.addEventListener('mouseout', function() {
            dropdown.style.display = 'none';
        });
    
        dropdown.addEventListener('mouseover', function() {
            dropdown.style.display = 'block';
        });
    
        dropdown.addEventListener('mouseout', function() {
            dropdown.style.display = 'none';
        });
    });
}
dropdown();

//============================ CREATE AN ACCOUNT POP UP FORM ==================
/*function activeBar(){
    document.addEventListener("DOMContentLoaded", function () {
        // Get all the links
        const links = document.querySelectorAll("a");
      
        // Add a click event listener to each link
        links.forEach(function (link) {
          link.addEventListener("click", function (event) {
            // Remove the "active" class from all links
            links.forEach(function (l) {
              l.classList.remove("active");
            });
      
            // Add the "active" class to the clicked link
            link.classList.add("active");
          });
        });
      });
    }
activeBar();*/

