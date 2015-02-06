/** var document, TogetherJS **/
/**
 * This library wraps around TogetherJS in order to provide shopping assistant
 * functionality to Magento.  It will listen for requests from start elements
 * and send the request to Magento admin to be dealt with.
 */
;(function() {
    'use strict';

    var Meanbee_ShoppingAssistant = Class.create();

    Meanbee_ShoppingAssistant.prototype = {
        initialize: function(options) {
            this.options = Object.extend({
                startElements: "[data-shoppingassistant-start]",
                started: false,
                debug: false
            }, options || {} );

            // Listen to buttons which can be used to request a session
            $$(this.options.startElements).each(function(element) {
                Event.observe(element,'click', this.toggleSession.bind(this));
            }.bind(this));

            // TogetherJS callback for a party joining the session, e.g. admin
            TogetherJS.hub.on("togetherjs.hello", this.memberJoined.bind(this));
        },

        /**
         * Toggle debug mode
         *
         * @param enable
         */
        debug: function(enable) {
            this.options.debug = enable;
        },

        /**
         * Member has joined the shopping assistant session
         */
        memberJoined: function() {
            this.log("Member joined.");
            $$(this.options.startElements).first().innerText = "Assistant arrived.";
        },

        /**
         * Start or stop shopping assistant session
         */
        toggleSession: function() {

            if (!TogetherJS.running) {
                this.log("Starting Shopping Assistant");
                document.observe('togetherjs:ready', this.notifyAdmin.bind(this));
            } else {
                this.log("Ending Shopping Assistant")
            }

            TogetherJS(this);
        },

        /**
         * Send shopping assistant request to admin
         */
        notifyAdmin: function() {
            var self = this;

            self.log("Sending request to admin");

            new Ajax.Request(MeanbeeBaseUrl + 'shopping_assistant/request/create', {
                parameters: {
                    url: TogetherJS.shareUrl(),
                    name: TogetherJS.config.get("getUserName")(),
                    email: TogetherJSConfig_getEmail()
                },
                onSuccess: function(response) {
                    var json = response.responseJSON;
                    if (json.response) {
                        $$(self.options.startElements).first().innerText = json.response;
                    }
                }
            });
        },

        /**
         * Log messages to console if debug mode enabled.
         *
         * @param message
         */
        log: function(message) {
            if (this.options.debug) {
                console.log(message);
            }
        }

    };

    window.Meanbee_ShoppingAssistant = new Meanbee_ShoppingAssistant();
})();