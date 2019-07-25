<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    </head>

    <body>
        <table id="tableClienti" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Codice</th>
                    <th>Citt&agrave</th>
                    <th>Indirizzo</th>
                    <th>Telefono</th>
                    <th>Numero siti commissionati</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Codice</th>
                    <th>Citt&agrave</th>
                    <th>Indirizzo</th>
                    <th>Telefono</th>
                    <th>Numero siti commissionati</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        
        
        <div id="dialog-form" title="Inserisci Sito Web">
        <p class="validateTips">Tutti i campi sono richiesti</p>
     
            <form id='formInsertSW'>
                <fieldset>
                    <table>
                        <tr>
                            <td> <label for="url">Url Sito Web:</label> </td>
                            <td> <input type="text" name="url" id="url" class="text ui-widget-content ui-corner-all"> </td>
                        </tr>
                        <tr>
                            <td> <label for="id_cliente">Id Cliente:</label> </td>
                            <td> <input type="number" name="id_cliente" id="id_cliente"  class="text ui-widget-content ui-corner-all"> </td>
                        </tr>
                        <tr>
                            <td> <label for="id_layout">Id Layout:</label> </td>
                            <td> <input type="number" name="id_layout" id="id_layout"  class="text ui-widget-content ui-corner-all">      </td>
                        </tr>
                        <tr>
                            <td> <label for="datepicker">Data pubblicazione:</label> </td>
                            <td> <input type="text" id="datepicker"> </td>
                        </tr>
                    </table>
                    
                    <br>
                    
                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <table id="tableLayout" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Sviluppatore</th>
                                <th>Costo</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
              </fieldset>
              
            </form>
        </div>
    
        <div id="dialog-form-layout" title="Layout">
          <p class="validateTips">Tutti i campi sono richiesti</p>
         
          <form>
            <table id="tableModuli" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Costo</th>	 
                    </tr>
                </thead>
            </table>
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
          </form>
        </div>
    
    </body>

</html>


<script>
    var idSelectedLayout;
    var idSelectedUser;
    
    
   function ShowSitoWeb(id){
       idSelectedUser = id;
       dialogSitoWeb.dialog( "open" );
   }
   
   function ShowLayout(id){
       idSelectedLayout = id;
       dialogLayout.dialog( "open" );
       $('#tableModuli').dataTable( {
       "sAjaxSource": "datatable_modulo.php?idlayout="+id,
       "bFilter": true,
           "dom": "Bfrtip",
           "responsive": true,
           "bDestroy": true,         
           "aoColumns": [             
               { "mData": "ID" },
               { "mData": "Nome" },
               { "mData": "Costo"},
           ],
       });
   }
   
   function InsertSitoWeb(){
       //chiamata ajax => DA FARE
       console.log(idSelectedMenu);
       console.log(idSelectedUser);
   }
       
   $(document).ready( function() {
    
       $( "#datepicker" ).datepicker();
       
       dialogSitoWeb = $( "#dialog-form" ).dialog({
         autoOpen: false,
         height: 500,
         width: 550,
         modal: true,
         buttons: {
           "Inserisci SitoWeb": function() { InsertSitoWeb()},
           Cancel: function() {
             dialogSitoWeb.dialog( "close" );
           }
         },
         close: function() {
           //form[ 0 ].reset();
           //allFields.removeClass( "ui-state-error" );
         }
       });
       
       dialogLayout = $( "#dialog-form-layout" ).dialog({
         autoOpen: false,
         height: 500,
         width: 550,
         modal: true,
         buttons: {
           //"Inserisci Catering": function(){ InsertCatering()},
           Cancel: function() {
             dialogLayout.dialog( "close" );
           }
         },
         close: function() {
           //form[ 0 ].reset();
           //allFields.removeClass( "ui-state-error" );
         }
       });
       
        $('#tableClienti').dataTable( {
          "sAjaxSource": "datatable_cliente.php",
          "bFilter": true,
              "dom": "Bfrtip",
              "responsive": true,
              "bDestroy": true,         
              "aoColumns": [
                   
                  { "mData": "Codice" },
                  { "mData": "Citta"},
                  { "mData": "Indirizzo"},
                  { "mData": "Tel"},
                  { "mData": "N_Siti"},
                  { "mData": "button",
                    "mRender": function(data, type, row){									
                                  return '<input onclick="ShowSitoWeb(\''+row.Codice+'\')" type="button" value="Inserisci SitoWeb"/>';
                               }
                  },
              ],
              
        });
        $('#tableLayout').dataTable( {
        "sAjaxSource": "datatable_layout.php",
        "bFilter": true,
            "dom": "Bfrtip",
            "responsive": true,
            "bDestroy": true,    
            "rowId": 'ID',
            "aoColumns": [
                { "mData": "ID" },
                { "mData": "Sviluppatore" },
                { "mData": "Costo"},
                { "mData": "button",
                  "mRender": function(data, type, row) {								
                                    return "<input onclick='ShowLayout("+row.ID+")' type='button' value='Visualizza Layout'/>";
                                    }
                },
            ],
        });
        
        $('#tableLayout tbody').on( 'click', 'tr', function () {
        var table = $('#tableLayout').DataTable();
        idSelectedLayout= table.row(this).id();
        
        
        //alert(data.DT_RowId);	
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
       
    });
</script>