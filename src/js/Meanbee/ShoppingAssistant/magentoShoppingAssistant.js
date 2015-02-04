;'use strict';

var Meanbee_ShoppingAssistant = Class.create();
Meanbee_ShoppingAssistant.prototype = {
    initialize: function(options) {
        this.options = Object.extend({
            startElements: "[data-shoppingassistant-start]",
            started: false
        }, options || {} );

        document.addEventListener('togetherjs:ready', this.notifyAdmin.bind(this));

        $$(this.options.startElements).each(function(element) {
            Event.observe(element,'click', this.toggleSession.bind(this));
        }.bind(this));
    },

    toggleSession: function() {
        TogetherJS(this);
    },

    notifyAdmin: function() {
        new Ajax.Request(MeanbeeBaseUrl + 'shopping_assistant', {
            parameters: {url: TogetherJS.shareUrl()},
            onSuccess: function(transport) {
                var response = transport.responseText || "no response text";
                alert("Success! \n\n" + response);
            },
            onFailure: function() { alert('Something went wrong...'); }
        });
    }

};

window.meanbee_shoppingassistant = new Meanbee_ShoppingAssistant();