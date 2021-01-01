$(function () {

    //Make iCheck
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
    });

    //Listener for LiveWire to refresh datatables and reset modal form.
    window.addEventListener('formSaved', event => {
        let tables = $.fn.dataTable.tables();
        $(tables).DataTable().draw();
        $('#' + event.detail).modal('hide').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
            $(this).find('.help-block').hide();
        });
    });

    //Listen for flash message from LiveWire.
    window.addEventListener('flashMessage', event => {
        let message = event.detail.message != null ? event.detail.message : 'Success saved';
        let severity = event.detail.severity != null ? event.detail.severity : 'success';

        $.toast({
            text: message,
            heading: 'Success',
            icon: severity,
            showHideTransition: 'plain', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
            textAlign: 'left',  // Text alignment i.e. left, right or center
            loader: true,  // Whether to show loader or not. True by default
            loaderBg: '#00a65a',  // Background color of the toast loader
        });
    });


});
