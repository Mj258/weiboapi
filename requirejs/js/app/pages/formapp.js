require( ['../main'], function() {
    require(
        [
            '../modules/app',
        ],
        function( App) {
            app.init();
        }
    );
});