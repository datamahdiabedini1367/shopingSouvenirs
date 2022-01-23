$(document).ready(function () {
    $(".tst1").on("click", function () {
        $.toast({
            heading: 'به سیستم مدیریت خوش آمدید',
            text: 'از آنهایی که از پیش تعیین شده استفاده می کنند, یا یک شیء موقعیت سفارشی را مشخص کنید.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3000,
            stack: 6
        });

    });

    $(".tst2").on("click", function () {
        $.toast({
            heading: 'به سیستم مدیریت خوش آمدید',
            text: 'از آنهایی که از پیش تعیین شده استفاده می کنند, یا یک شیء موقعیت سفارشی را مشخص کنید.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        });

    });
    $(".tst3").on("click", function () {
        $.toast({
            heading: 'به سیستم مدیریت خوش آمدید',
            text: 'از آنهایی که از پیش تعیین شده استفاده می کنند, یا یک شیء موقعیت سفارشی را مشخص کنید.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        });

    });

    $(".tst4").on("click", function () {
        $.toast({
            heading: 'به سیستم مدیریت خوش آمدید',
            text: 'از آنهایی که از پیش تعیین شده استفاده می کنند, یا یک شیء موقعیت سفارشی را مشخص کنید.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 3500

        });

    });


});
