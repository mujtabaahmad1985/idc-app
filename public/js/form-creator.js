/*
var selected_element = null;
var selected_element_type = null;
$(function(){
    $(".form-button").click(function(){
        var element = $(this).attr('data-element');
        var form_element = "";
        var label = $('label');
        switch (element){
            case "single-line-text":
                form_element += '<div class="form-group">';
                form_element += '<label>Single Line Element</label>';
                form_element += '<input type="text" class="form-control new-form-element" />';
                form_element += '</div>';
                break;
            case "multi-line-text":
                form_element += '<div class="form-group">';
                form_element += '<label>Multi Line Element</label>';
                form_element += '<textarea class="form-control new-form-element"></textarea>';
                form_element += '</div>';
                break;
            case "checkbox":
                form_element += '<div class="form-group">';
                //form_element += '<label>Checkbox</label>';
                form_element += '<input type="checkbox" class="new-form-element" /> Checkbox';
                form_element += '</div>';
                break;
            case "radio":
                form_element += '<div class="form-group">';
                //form_element += '<label>Checkbox</label>';
                form_element += '<input type="radio" name="radio" class="new-form-element" /> Radio 1';
                form_element += '<input type="radio" name="radio" class="new-form-element" /> Radio 2';
                form_element += '</div>';
                break;
            case "list":
                form_element += '<div class="form-group">';
                //form_element += '<label>Checkbox</label>';
                form_element += '<select class="form-control new-form-element"><option value="">Add List Options</option> </select>';

                form_element += '</div>';
                break;
            case "captcha":
                break;
        }


        $("#form-content").append(form_element);

        $(".new-form-element").click(function(e){
            //$(this).parent().find('label').html('test');

            selected_element = $(this);
          //  console.log(e.target.);
            selected_element_type = e.target.nodeName;
            $("#element_label").val( selected_element.parent().find('label').html());
            $("#element_type").val( selected_element.parent().find('input').attr('type'));

            switch (selected_element_type){
                case "INPUT":
                   var type =  selected_element.parent().find('input').attr('type');
                   if(type==="checkbox"){
                        $("#element_type").hide();
                   }else if(type==="radio"){
                       $("#element_type").hide();
                   }else{
                       $("#element_type").show();
                   }

                    break;
                case "TEXTAREA":
                    break;
                case "SELECT":
                    break;
            }
            $("#responsive").modal();
        });
       // alert(form_element);
    });

    $(".save-element-changes").click(function(){
        var element_label = $("#element_label").val();
        var element_name = element_label.toLowerCase();
        element_name = element_name.replace(' ','_');

        var element_type = $("#element_type").val();

        selected_element.parent().find('label').html(element_label);

        selected_element.parent().find('input').attr('type',element_type);
        selected_element.parent().find('input').attr('name',element_name);
        $("#responsive").modal('hide');
    });


});*/

jQuery(function($) {
    var fields = [
        {
            label: 'Star Rating',
            attrs: {
                type: 'starRating'
            },
            icon: 'ðŸŒŸ'
        }
    ];

    var actionButtons = [{
        id: 'smile',
        className: 'btn btn-success',
        label: 'ðŸ˜',
        type: 'button',
        events: {
            click: function() {
                alert('ðŸ˜ðŸ˜ðŸ˜ !SMILE! ðŸ˜ðŸ˜ðŸ˜');
            }
        }
    }];

    var templates = {
        starRating: function(fieldData) {
            return {
                field: '<span id="'+fieldData.name+'">',
                onRender: function() {
                    $(document.getElementById(fieldData.name)).rateYo({rating: 3.6});
                }
            };
        }
    };

    var inputSets = [{
        label: 'User Details',
        name: 'user-details', // optional
        showHeader: true, // optional
        fields: [{
            type: 'text',
            label: 'First Name',
            className: 'form-control'
        }, {
            type: 'select',
            label: 'Profession',
            className: 'form-control',
            values: [{
                label: 'Street Sweeper',
                value: 'option-2',
                selected: false
            }, {
                label: 'Brain Surgeon',
                value: 'option-3',
                selected: false
            }]
        }, {
            type: 'textarea',
            label: 'Short Bio:',
            className: 'form-control'
        }]
    }, {
        label: 'User Agreement',
        fields: [{
            type: 'header',
            subtype: 'h3',
            label: 'Terms & Conditions',
            className: 'header'
        }, {
            type: 'paragraph',
            label: 'Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.',
        }, {
            type: 'paragraph',
            label: 'Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.',
        }, {
            type: 'checkbox',
            label: 'Do you agree to the terms and conditions?',
        }]
    }];

    var typeUserDisabledAttrs = {
        autocomplete: ['access']
    };

    var typeUserAttrs = {
        text: {
            className: {
                label: 'Class',
                options: {
                    'red form-control': 'Red',
                    'green form-control': 'Green',
                    'blue form-control': 'Blue'
                },
                style: 'border: 1px solid red'
            }
        }
    };

    // test disabledAttrs
    var disabledAttrs = ['placeholder'];

    var fbOptions = {
        subtypes: {
            text: ['datetime-local']
        },
        onSave: function(e, formData) {
            toggleEdit();
            $('.render-wrap').formRender({
                formData: formData,
                templates: templates
            });
            window.sessionStorage.setItem('formData', JSON.stringify(formData));
        },
        stickyControls: {
            enable: true
        },
        sortableControls: true,
        fields: fields,
        templates: templates,
        inputSets: inputSets,
        typeUserDisabledAttrs: typeUserDisabledAttrs,
        typeUserAttrs: typeUserAttrs,
        disableInjectedStyle: false,
        actionButtons: actionButtons
        // controlPosition: 'left'
        // disabledAttrs
    };
    var formData = window.sessionStorage.getItem('formData');
    var editing = true;

    if (formData) {
        fbOptions.formData = JSON.parse(formData);
    }

    /**
     * Toggles the edit mode for the demo
     * @return {Boolean} editMode
     */
    function toggleEdit() {
        document.body.classList.toggle('form-rendered', editing);
        return editing = !editing;
    }

    var setFormData = '[{"type":"text","label":"Full Name","subtype":"text","className":"form-control","name":"text-1476748004559"},{"type":"select","label":"Occupation","className":"form-control","name":"select-1476748006618","values":[{"label":"Street Sweeper","value":"option-1","selected":true},{"label":"Moth Man","value":"option-2"},{"label":"Chemist","value":"option-3"}]},{"type":"textarea","label":"Short Bio","rows":"5","className":"form-control","name":"textarea-1476748007461"}]';

    var formBuilder = $('.build-wrap').formBuilder(fbOptions);
    var fbPromise = formBuilder.promise;

    fbPromise.then(function(fb) {
        var apiBtns = {
            showData: fb.actions.showData,
            clearFields: fb.actions.clearFields,
            getData: function() {
                console.log(fb.actions.getData());
            },
            setData: function() {
                fb.actions.setData(setFormData);
            },
            addField: function() {
                var field = {
                    type: 'text',
                    class: 'form-control',
                    label: 'Text Field added at: ' + new Date().getTime()
                };
                fb.actions.addField(field);
            },
            removeField: function() {
                fb.actions.removeField();
            },
            testSubmit: function() {
                var formData = new FormData(document.forms[0]);
                console.log('Can submit: ', document.forms[0].checkValidity());
                // Display the key/value pairs
                console.log('FormData: ', );
                for(var pair of formData.entries()) {
                    console.log(pair[0]+ ': '+ pair[1]);
                }
            },
            resetDemo: function() {
                window.sessionStorage.removeItem('formData');
                location.reload();
            }
        };

        Object.keys(apiBtns).forEach(function(action) {
            document.getElementById(action)
                .addEventListener('click', function(e) {
                    apiBtns[action]();
                });
        });

        document.getElementById('setLanguage')
            .addEventListener('change', function(e) {
                fb.actions.setLang(e.target.value);
            });

        document.getElementById('getXML').addEventListener('click', function() {
            alert(formBuilder.actions.getData('xml'));
        });
        document.getElementById('getJSON').addEventListener('click', function() {
            alert(formBuilder.actions.getData('json', true));
        });
        document.getElementById('getJS').addEventListener('click', function() {
            alert('check console');
            console.log(formBuilder.actions.getData());
        });
    });

    document.getElementById('edit-form').onclick = function() {
        toggleEdit();
    };
});

