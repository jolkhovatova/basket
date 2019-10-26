"use strict";

events(); //назначаются обработчики событий
BasketObj.load(); //loadLocalStorage - читает из локалСтореч и сохраняет в баскетПродуктс
PageObj.showProductsInBasket();

function events() {
    let basket = document.querySelector("div.basket");

    // Наводимся на корзину
    basket.addEventListener(
        "mouseenter",
        function (e) {
            PageObj.basketVisibility(true);
        });

    // Уходим с корзины
    basket.addEventListener(
        "mouseleave",
        function (e) {
            PageObj.basketVisibility(false);
        });

    // Нажимаем на кнопу купить
    document.querySelector("div.catalog").addEventListener(
        "click",
        function (e) {
            let button = e.target; //обытие. таргет - дом елем на который нажали
            if (button.tagName !== "A" && button.tagName !== "BUTTON") {
                return;
            }
            if( !(button.tagName === "A" && button.classList.contains("btn-add-basket")) ){
                return;
            }
            e.preventDefault();


            let productDomElement = button.closest("div.product");
            let productObj = makeProductObj(productDomElement);
            BasketObj.addProduct(productObj);
            BasketObj.save();
            PageObj.showProductsInBasket();
        }
    );

    // Удалить продукт из корзины
    document.querySelector("div.basket-open").addEventListener(
        "click",
        function (e) {
            let tdDelete = e.target;
            if (!(tdDelete.tagName === "TD" && tdDelete.classList.contains("delete"))) {
                return;
            }

            let productArticle = tdDelete.closest("tr").dataset.productarticle;
            BasketObj.deleteProduct(productArticle);
            BasketObj.save();
            PageObj.showProductsInBasket();
        });

    // Увеличение кол-во товара
    document.querySelector("div.basket-open").addEventListener(
        "click",
        function (e) {
            let buttonPlus = e.target;
            if (!(buttonPlus.tagName === "BUTTON" && buttonPlus.classList.contains("plus"))) {
                return;
            }
            let productArticle = buttonPlus.closest("tr").dataset.productarticle;
            let productObj = BasketObj.getProduct(productArticle);
            productObj.quantity++;
            BasketObj.save();
            PageObj.showProductsInBasket();
        }
    );

    //Уменьшение кол-во товара
    document.querySelector("div.basket-open").addEventListener(
        "click",
        function (e) {
            let buttonMinus = e.target;
            if (!(buttonMinus.tagName === "BUTTON" && buttonMinus.classList.contains("minus"))) {
                return;
            }
            let productArticle = buttonMinus.closest("tr").dataset.productarticle;
            let productObj = BasketObj.getProduct(productArticle);
            if (productObj.quantity <= 1) {
                return;
            }
            productObj.quantity--;
            BasketObj.save();
            PageObj.showProductsInBasket();
        }
    );


}

// Делаем обьект продукта
function makeProductObj(productDomElement) {
    let imgProduct = productDomElement.querySelector("img").src;
    let productName = productDomElement.querySelector("div.name").innerHTML;
    let productPrice = productDomElement.querySelector("div.price span").innerHTML;
    let productArticle = productDomElement.dataset.productarticle;

    //Удаление пробелов в строке
    productPrice = productPrice.replace(/\s/g, '');
    productPrice = parseFloat(productPrice);

    let productObj = {
        img: imgProduct,
        name: productName,
        price: productPrice,
        article: productArticle,
        quantity: 1, // колличество товаров
    };
    return productObj;
}
