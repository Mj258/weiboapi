define(
    [
        "jquery",
    ],
    function($) {
        var DOM = {

        };


        var eventMap = {

        };

        // Public API
        // --------------------

        var init = function() {
            var evt;
            for ( evt in eventMap ) {
                eventMap.hasOwnProperty( evt ) && eventMap[ evt ]();
            }
        };

        return { init: init };
    }
)
