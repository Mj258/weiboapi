/**
 * Configuration file to be used as the entry point for all Requirejs
 * modules in the system.
 **/

require.config({
  urlArgs: "cache="+(new Date()).getTime(),
  waitSeconds: 0,
  paths: {
    jquery: '../../vendor/jquery-1.10.2.min'
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
