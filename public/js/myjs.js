function Mynotify(message ='',type,delay=2500){
    $.growl({
        title: 'Thông báo :',
        message: message+" ",
        url: ''
    },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                    from: 'top',
                    align: 'center'
            },
            offset: {
                x: 20,
                y: 85
            },
            spacing: 10,
            z_index: 1031,
            delay: delay,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                    enter: 'animated bounceInLeft',
                    exit: 'animated bounceOutLeft',
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert" style = "color:black;height:100px;line-height:100px;font-size:17px">' +
                            '<button type="button" class="close" data-growl="dismiss">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '<span class="sr-only">Close</span>' +
                            '</button>' +
                            '<span data-growl="icon"></span>' +
                            '<span data-growl="title"></span>' +
                            '<span data-growl="message"></span>' +
                            '<a href="#" data-growl="url"></a>' +
                        '</div>'
    });
};
