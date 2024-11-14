function adespc_tdms_merignac() {
   this.salary_ui     = document.getElementById("salary");
   this.position_ui   = document.getElementById("position");
   this.line_ui       = document.getElementById("line");
   this.left_mask_ui  = document.getElementById("left-mask");
   this.right_mask_ui = document.getElementById("right-mask");
   const area         = document.getElementById("graph").getBoundingClientRect();
   this.line_2000     = area.bottom - 118.0;
   this.line_scale    = ( area.height - 170.0 ) / ( 14_000.0 - 2_000.0 );
   this.add_event_handlers();
}

adespc_tdms_merignac.prototype.add_event_handlers = function() {
   this.salary_ui  .addEventListener( 'input' , e => this.onSalaryChange( e ));
   this.position_ui.addEventListener( 'change', e => this.onPositionChange( e ));
}

adespc_tdms_merignac.prototype.onSalaryChange = function( e ) {
   const value = parseFloat( this.salary_ui.value );
   if( value > 1_999.99 && value < 14_000.01 ) {
      const y = this.line_2000 - this.line_scale * ( value - 2_000.0 );
      this.line_ui.style.top = y + "px";
      this.line_ui.style.display = 'block';
   }
   else {
      this.line_ui.style.display = 'none';
   }
}

adespc_tdms_merignac.prototype.onPositionChange = function( e ) {
   const position = this.position_ui.value;
   if( position == "ALL" ) {
      this.left_mask_ui .style.display = "none";
      this.right_mask_ui.style.display = "none";
   }
   else {
      const column_width = 92.5;
      const ndx          = parseInt( position.substring( 1 )) - 5;
      this.left_mask_ui .style.display = ( position == "C5" )? "none" : "block";
      this.left_mask_ui .style.width   = (     ndx*column_width) + "px";
      this.right_mask_ui.style.display = ( position == "H16" )? "none" : "block";
      this.right_mask_ui.style.left    = ( 118+(ndx+1)*column_width) + "px";
      this.right_mask_ui.style.width   = (1015-ndx*column_width) + "px";
   }
}

new adespc_tdms_merignac();
