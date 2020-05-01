/* Anonymous function to create drag and drop feature */

$( function() {
        // Make each required course listed draggable
        $( ".listitems" ).draggable({
                grid: [ 10, 10 ],
                // Create clone of each course to allow it to be dragged outside of the scrollable course column
                helper: 'clone',
                appendTo: '#table',
                cursor: 'move',
                start: function (event, ui) {
                        // Gets rid of course in the course column after course starts the get dragged
                        $(this).hide();
                }       
        });     
        
        // Make the table of the 12 boxes droppable so that the courses could be dragged into it
        $( "#table" ).droppable({
                // Have the table accept the clone of each required course      
                accept: '.listitems',
                // Drop the required courses into the desired position in the tab;e
                drop: function( event, ui ) {      
                        // Get the position of the dropped item
                        var pos = ui.position;
                        var $obj = ui.helper.clone();
                        // Drop the item at the desired position
                        $obj.css({
                                position: 'absolute',
                                top: pos.top + "px",
                                left: pos.left + "px"
                        });     
                        // Add the courses to the table after being dropped
                        $obj.appendTo("#table");
                        
                        // Allow courses to be dragged and dropped more than once
                        $($obj).draggable({
                                helper: 'clone',
                                start: function (event, ui) {
                                        $(this).hide(); 
                                }       
                        });     
                }       
     });        
     // Add the clone of each required course to each table to allow users to drag and drop courses more than once
     clone.appendTo('#table');
});  
