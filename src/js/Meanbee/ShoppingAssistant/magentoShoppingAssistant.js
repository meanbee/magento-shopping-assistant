/** var document, TogetherJS **/
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
        new Ajax.Request(MeanbeeBaseUrl + 'shopping_assistant/request/create', {
            parameters: {
                url: TogetherJS.shareUrl(),
                name: TogetherJS.config.get("getUserName")(),
                email: TogetherJSConfig_getEmail()
            },
            onSuccess: function(response) {
                var json = response.responseJSON;
                if (json.response) {
                    $$(this.options.startElements).first().innerText = json.response;
                }
            }
        });
    }

};

window.meanbee_shoppingassistant = new Meanbee_ShoppingAssistant();