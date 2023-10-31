/**
 * Config
 * -------------------------------------------------------------------------------------
 * ! IMPORTANT: Make sure you clear the browser local storage In order to see the config changes in the template.
 * ! To clear local storage: (https://www.leadshook.com/help/how-to-clear-local-storage-in-google-chrome-browser/).
 */

'use strict';

// JS global variables
let config = {
  colors: {
    primary: '#696cff',
    secondary: '#8592a3',
    success: '#71dd37',
    info: '#03c3ec',
    warning: '#ffab00',
    danger: '#ff3e1d',
    dark: '#233446',
    black: '#000',
    white: '#fff',
    body: '#f4f5fb',
    headingColor: '#566a7f',
    axisColor: '#a1acb8',
    borderColor: '#eceef1'
  }
};


// rich text producto  
tinymce.init({
  selector: '#descripproduct',
  width: "100%",
  menubar: false,
  plugins: 'emoticons advlist lists table charmap fullscreen wordcount preview',
  toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align numlist bullist | table | lineheight outdent indent | forecolor backcolor removeformat | charmap emoticons | fullscreen preview | print ",
  table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol'
});
