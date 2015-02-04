;'use strict';

var Meanbee_ShoppingAssistant = Class.create();
Meanbee_ShoppingAssistant.prototype = {
    initialize: function(options) {
        this.options = Object.extend({
            startElements: "[data-shoppingassistant-start]"
        }, options || {} );


        // Observe blur on each email field
        $$(this.options.startElements).each(function(element) {
            Event.observe(element,'click',TogetherJS);
        }.bind(this));

    }
};

window.meanbee_shoppingassistant = new Meanbee_ShoppingAssistant();