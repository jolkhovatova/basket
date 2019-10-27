"use strict";

events(); //назначаются обработчики событий
BasketObj.load(); //loadLocalStorage - читает из локалСтореч и сохраняет в баскетПродуктс
PageObj.showProductsInBasket();

function events() {

    // Наводимся на корзину
    $("div.basket").on("mouseenter", function (e) {
        PageObj.basketVisibility(true);
    });

    // Уходим с корзины
    $("div.basket").on("mouseleave", function (e) {
        PageObj.basketVisibility(false);
    });

    // Нажимаем на кнопу купить
    $("div.catalog").on("click", ".btn-add-basket", function (e) {
        e.preventDefault();
        let button = e.target;
        let productDomElement = button.closest("div.product");
        let productObj = makeProductObj(productDomElement);
        BasketObj.addProduct(productObj);
        BasketObj.save();
        PageObj.showProductsInBasket();
    });

    /*
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
      );*/

    // Удалить продукт из корзины
    $("div.basket-open").on("click", "td.delete", function (e) {
        let tdDelete = e.target;
        let productArticle = tdDelete.closest("tr").dataset.productarticle;
        BasketObj.deleteProduct(productArticle);
        BasketObj.save();
        PageObj.showProductsInBasket();
    });

    // Увеличение кол-во товара
    $("div.basket-open").on("click", "button.plus", function (e) {
        let buttonPlus = e.target;
        let productArticle = buttonPlus.closest("tr").dataset.productarticle;
        let productObj = BasketObj.getProduct(productArticle);
        productObj.quantity++;
        BasketObj.save();
        PageObj.showProductsInBasket();
    });

    //Уменьшение кол-во товара
    $("div.basket-open").on("click", "button.minus", function (e) {
        let buttonMinus = e.target;
        let productArticle = buttonMinus.closest("tr").dataset.productarticle;
        let productObj = BasketObj.getProduct(productArticle);
        if (productObj.quantity <= 1) {
            return;
        }
        productObj.quantity--;
        BasketObj.save();
        PageObj.showProductsInBasket();
    });

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
