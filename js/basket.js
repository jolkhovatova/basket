"use strict";

//Обьект корзины

let BasketObj = {
    products: [],

    addProduct: function (productObj) {
        let productInBasket = this.getProduct(productObj.article);
        if(productInBasket){
            productInBasket.quantity += productObj.quantity;
        }else{
            this.products.push(productObj);
        }
    },

    getProduct: function (productArticle){
        let result = null; // result - результат
        this.products.forEach(function (productObj) {
            if (productArticle === productObj.article) {
                result = productObj;
            }
        });
        return result;

    },

    deleteProduct: function (productArticle) {
        let thisObj = this;
        this.products.forEach(function (productObj, i) {
            if (productObj.article === productArticle) {
                thisObj.products.splice(i,1); //удалить эл массива с интексом i
            }
        });
    },

    getProductCount: function () {
        return this.products.length;
    },

    getPrice: function () {
        let sum = 0;
        this.products.forEach(function (product) {
            sum += product.quantity * product.price;
        });
        return sum;
    },

    //loadLocalStorage - читает из локалСтореч и сохраняет в баскетПродуктс
    load: function () {
        let getLocalStorage = localStorage.getItem("productsInBasket");
        this.products = JSON.parse(getLocalStorage) || [];
    },

    save: function () {
        let json = JSON.stringify(this.products);
        localStorage.setItem("productsInBasket", json);
    },

};
