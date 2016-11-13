<section class="classsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="class">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Section
            </button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
            <p class="exist"><?php echo $this->session->flashdata('exist'); ?></p>
            <p class="msg"><?php echo validation_errors(); ?></p>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchClass' ?>" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control right search" placeholder="Section name...." name="search" id="combobox">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search">
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <tr>
                                <th>Sl No</th>
                                <th>Class Name</th>
                                <th>Section Name</th>
                                <th>Teacher Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $sl = 0;
                            foreach ($allsectionlist as $single):
                                $sl++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $single->class_name; ?></td>
                                    <td><?php echo $single->section_name; ?></td>
                                    <td><?php echo $single->teacher_name; ?></td>
                                    <td>
                                        <?php echo anchor('', ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?> |

                                        <?php
                                        $onclick = array('onclick' => "return confirm('Do you want to delete it?')");
                                        echo anchor('Dashboard/sectionDelete/' . $single->section_id, '<span class="glyphicon glyphicon-trash btn btn-danger samebtn" aria-hidden="true"></span>', $onclick);
                                        ?>
                                    </td>

                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </table>
                    </div>
                    <?php echo $pagination; ?>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Section</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/sectionaddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Section Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="sectionname" class="col-md-offset-1 col-md-3 ttl">Class Name</label>
                                <div class="col-md-6">
                                    <select class="classname form-control" id="classname" name="classname">
                                        <option>Select One</option>
                                        <?php
                                        foreach ($allclass as $single):
                                            ?>
                                            <option value="<?php echo $single->class_id; ?>"><?php echo $single->class_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="teachername" class="col-md-offset-1 col-md-3 ttl">Teacher Name</label>
                                <div class="col-md-6">
                                    <select class="teachername form-control" id="teachername" name="teachername">
                                        <option>Select One</option>
                                        <?php
                                        foreach ($allteacher as $singlete):
                                            ?>
                                            <option value="<?php echo $singlete->teacher_id; ?>"><?php echo $singlete->teacher_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Section">
                                </div>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    // autocomlete search begin//////////
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val()?selected.text():"";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val(value)
          .attr( "title", "" )
          .attr( "placeholder", "Type A Section Name" )
          .attr("style", "background-color: #fff")
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Products" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 

      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
 
    $( "#combobox" ).combobox();
    $( "#toggle" ).on( "click", function() {
      $( "#combobox" ).toggle();
    });
// autocomlete search END //////////
</script>