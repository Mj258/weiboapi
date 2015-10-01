/**
 * Configuration file to be used as the entry point for all Requirejs
 * modules in the system.
 **/

require.config({
    urlArgs: "cache="+(new Date()).getTime(),
    waitSeconds: 0,
    paths: {
        jquery: 'vendor/jquery',
        jqueryui: 'vendor/jquery-ui-custom.min',
        bootstrap: 'vendor/bootstrap.min'
    },
    shim: {
        jqueryuitt: {
            deps: ['jqueryui']
        },
        jqueryuitt: {
            deps: ['jqueryui']
        }
    }
});

require(
    [
        // Include common modules to be used throughout the site here
    ],

    function() {
        // Main function body for common modules imported
    }
)
