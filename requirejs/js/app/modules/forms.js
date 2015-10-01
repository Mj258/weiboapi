define(
  [
    'jquery',

  ],

  function( $, chosen ) {

    // DOM Configuration
    // --------------------

    var DOM = {
      chosen    : '.js-chosen',
      datepicker: '.js-datepicker',
      datepicker_diagonal:'.js-datepicker-diagonal',
      timepicker: '.js-timepicker',
      datetimepicker: '.js-datetimepicker',
      image_file: '.js-file-image',
      file_extension: 'input.js-file-ext',
      birthdatepicker: '.js-birthdatepicker',
      selectallcheckbox: '.js-select-all-checkbox',
      textarea_charactes_counter: '.js-textarea-char-count',
      confirmation_alert: '.js-confirmation',
      required_input: '.js-input-required'
    };

    // Private API
    // --------------------

    // Events & Handlers
    // --------------------

    function get_file_ext(file_name) {
      return file_name.split('.').pop();
    }

    var _imageFileExtension = function() {
      var ext = get_file_ext($(this).val()).toLowerCase();
      if( ext != 'jpg' && ext != 'jpeg' && ext != 'png' && ext != 'gif' && ext != 'bmp' && ext != 'jpg' ) {
        $(this).val('');
        alert(gettext('Image file supported (.jpg, .jpeg, .png, .gif, .bmp, .jpg)'));
      }
    };

    var _chosen_select_all_button = function() {
      // only if it is multiple select
      if(!$(this).attr('multiple'))
        return;
      // search for select all and deselect all button
      var buttonClass = ".js-" + $(this).attr('name') + "-chosen-select-all-button";
      var button = $(buttonClass);
      // if there is button
      if(button.length > 0) {
        // set default value for button
        if($(this).val()) {
          button.val(gettext('Deselect All'));
        } else {
          button.val(gettext('Select All'));
        }
        var chosenSelect = this;
        // on multiple select change update the button value
        $(this).on('change',function() {
          if($(this).val()) {
            button.val(gettext('Deselect All'));
          } else {
            button.val(gettext('Select All'));
          }
        });
        // on button click update the multiple select and button value
        button.on('click',function() {
          if($(chosenSelect).val()) {
            $(chosenSelect).val('');
            $(this).val(gettext('Select All'));
          } else {
            $(chosenSelect).children('option').prop('selected',true);
            $(this).val(gettext('Deselect All'));
          }
          $(chosenSelect).trigger("chosen:updated");
        });
      }
    };

    var _select_all_checkbox = function() {
      var checkboxesclass = $(this).attr('data-select-class');
      var ticked = $(checkboxesclass+':checked');
      if(ticked.length > 0) {
        $(ticked).prop('checked',false);
      } else {
        $(checkboxesclass).prop('checked',true);
      }
    };

    var _checkFileExtension = function() {
      var all_ext = $(this).attr('data-file-ext');
      var ext = all_ext.replace('.','').replace(' ','');
      var ext_arr = ext.split(',');
      var file_ext = get_file_ext($(this).val()).toLowerCase();
      for(var i = 0; i < ext_arr.length; ++i) {
        if( file_ext == ext_arr[i] )
          return true
      }
      $(this).val('');
      alert(gettext('The only file supported is ') + all_ext);
      return false;
    }

    var _updateCharCount = function() {
      var renderer = $($(this).attr('data-renderer'));
      var max_length = $(this).attr('maxlength');
      var value = $(this).val();
      renderer.html((max_length - value.length));
    };

    var _show_confirmation_alert = function() {
      var alertMessage = $(this).attr('data-confirmation-message');
      if(alertMessage) {
        return confirm(gettext(alertMessage));
      }
    };

    var eventMap = {
      chosenify: function() {
        $( DOM.chosen ).chosen({search_contains: true,});
        $( DOM.chosen ).each(_chosen_select_all_button);
      },
      datepicker: function() {
        $( DOM.datepicker ).each(function() {
          var defaultYearRange = '-100:+100';
          if($(this).attr('data-year-range')) {
            defaultYearRange = $(this).attr('data-year-range');
          }
          $(this).datepicker({
            dateFormat: 'dd-mm-yy',
            changeYear: true,
            changeMonth:true,
            yearRange:defaultYearRange
          })
        });
      },
      datepicker_diagonal:function() {
        $( DOM.datepicker_diagonal ).each(function() {
          var defaultYearRange = '-100:+100';
          if($(this).attr('data-year-range')) {
            defaultYearRange = $(this).attr('data-year-range');
          }
          $(this).datepicker({
            dateFormat: 'dd/mm/yy',
            changeYear: true,
            changeMonth:true,
            yearRange:defaultYearRange
          })
        });
      },
      datetimepicker: function() {
        $( DOM.datetimepicker ).each(function() {

          $(this).datetimepicker({
            showSecond: true,
            dateFormat: 'dd-mm-yy',
            minDate:1,
          });
        });
      },
      birthdatepicker: function() {
        $( DOM.birthdatepicker ).each(function() {
          var defaultYearRange = '-100:+0';
          var defaultDayRange = '-36500:+0';
          if($(this).attr('data-year-range')) {
            defaultYearRange = $(this).attr('data-year-range');
          }
          $(this).datepicker({
            dateFormat: 'dd-mm-yy',
            changeYear: true,
            changeMonth:true,
            yearRange:defaultYearRange,
            dateRange:defaultDayRange,
            beforeShow:function(){
              var mxd = new Date();
              return { maxDate: mxd };
            }
          })
        });
      },
      timepicker: function() {
        $( DOM.timepicker ).timepicker();
      },
      imageFileExtension: function() {
        $( DOM.image_file ).on('change', _imageFileExtension);
      },
      fileExtension: function() {
        $( DOM.file_extension ).each(function() {
          var file_extension = $(this).attr('data-file-ext');

          if(file_extension) {
            file_extension = file_extension.toLowerCase();
            $(this).attr('accept',file_extension);
            $(this).on("change",_checkFileExtension);
          }
        });
      },
      textAreaCharCounter: function() {
        $( DOM.textarea_charactes_counter ).each(_updateCharCount);
        $( DOM.textarea_charactes_counter ).on("propertychange keyup keydown input visible click change",_updateCharCount);
      },
      selectallCheckbox: function() {
        $( DOM.selectallcheckbox ).on('click', _select_all_checkbox);
      },
      confirmation_alert:function() {
        $( DOM.confirmation_alert ).on('click', _show_confirmation_alert);
      }
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
