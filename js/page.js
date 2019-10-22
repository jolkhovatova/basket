"use strict";

//Обьект страницы

let PageObj = {
    addRowSum: function () {
        let sum = BasketObj.getPrice();

        let tbody = document.querySelector(".basket-open table tbody");
        tbody.innerHTML += `
        <tr>
            <td></td>
            <td>Итого</td>
            <td></td>
            <td></td>
            <td>${sum} грн</td>
            <td></td>
        </tr>`;
    },

    addRow: function (productObj) {
        // basketRow - id шаблона строки.
        let basketRowTr = document.getElementById("basketRow").content.cloneNode(true);
        let tbody = document.querySelector(".basket-open table tbody");
        basketRowTr.querySelector("td.img img").src = productObj.img;
        basketRowTr.querySelector("td.name").innerHTML = productObj.name;
        basketRowTr.querySelector("td.quantity").innerHTML = productObj.quantity + " шт";
        basketRowTr.querySelector("td.price").innerHTML = productObj.price + " грн";
        tbody.append(basketRowTr);
        tbody.querySelector("tr:last-child").dataset.productarticle = productObj.article;
    },

    showCountProducts: function () {
        let countLocationDomElement = document.querySelector(".basket span.count");
        countLocationDomElement.innerHTML = String(BasketObj.products.length);
    },

    resizeBasket: function () {
        let basketOpen = document.querySelector("div.basket-open");
        let countProducts = BasketObj.getProductCount();
        basketOpen.style.height = ((countProducts + 1) * 75) + "px"; // +1 для строки с "Итого:"
    },

    showProductsInBasket: function () {
        let thisObj = this;
        let trList = document.querySelectorAll(".basket-open table tbody tr");
        trList.forEach(function (tr) {
            tr.remove();
        });

        BasketObj.products.forEach(function (product) {
            thisObj.addRow(product);
        });
        this.addRowSum();
        this.resizeBasket();
        this.showCountProducts();
    },

    basketVisibility: function (visible) {
        let display = visible ? 'block' : 'none';
        document.querySelector("div.basket-open").style.display = display;
    },


};

